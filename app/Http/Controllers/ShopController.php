<?php

namespace App\Http\Controllers;

use App\Services\PlayerSession;
use App\Services\TebexHeadlessService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends RisePageController
{
    private const CHECKOUT_SESSION = 'rise_checkout';

    public function __construct(
        private readonly PlayerSession $playerSession,
        private readonly TebexHeadlessService $tebex,
    ) {}

    public function index(): View
    {
        $canPurchase = $this->playerSession->isOnlineVerified();

        return $this->risePage('shop', 'pages.shop', [
            'player' => $this->playerSession,
            'canPurchase' => $canPurchase,
            'onlineExpiresIn' => $this->playerSession->onlineExpiresInSeconds(),
            'wallet' => $this->playerSession->wallet(),
            'tebexConfigured' => $this->tebex->isConfigured(),
            'tebexCategories' => $this->tebex->categoriesWithPackages(),
        ]);
    }

    public function checkout(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'package_id' => ['required', 'integer', 'min:1'],
        ]);

        $packageId = (int) $validated['package_id'];
        $username = $this->playerSession->username();

        $basket = $this->tebex->createBasket(
            $request->ip() ?? '127.0.0.1',
            route('shop.thankyou'),
            route('shop.index'),
            $username,
        );

        if ($basket === null) {
            return redirect()->route('shop.index')
                ->with('error', 'Impossible de créer le panier Tebex.');
        }

        $ident = $basket['ident'] ?? null;

        if (! is_string($ident)) {
            return redirect()->route('shop.index')->with('error', 'Réponse Tebex invalide.');
        }

        session([self::CHECKOUT_SESSION => [
            'package_id' => $packageId,
            'basket_ident' => $ident,
        ]]);

        if ($this->tebex->basketNeedsAuth($basket)) {
            $authUrl = $this->tebex->getFivemAuthUrl($ident, route('shop.checkout.return'));

            if ($authUrl === null) {
                return redirect()->route('shop.index')
                    ->with('error', 'Authentification Tebex/Cfx indisponible pour ce panier.');
            }

            return redirect()->away($authUrl);
        }

        return $this->finalizeCheckout($ident, $packageId);
    }

    public function checkoutReturn(Request $request): RedirectResponse
    {
        /** @var array{package_id?: int, basket_ident?: string}|null $checkout */
        $checkout = session(self::CHECKOUT_SESSION);

        if (! is_array($checkout) || empty($checkout['basket_ident']) || empty($checkout['package_id'])) {
            return redirect()->route('shop.index')
                ->with('error', 'Session de paiement expirée. Réessayez depuis le shop.');
        }

        $basket = $this->tebex->getBasket($checkout['basket_ident']);

        if ($this->tebex->basketNeedsAuth($basket)) {
            return redirect()->route('shop.index')
                ->with('error', 'Compte Cfx non lié au panier. Relancez l\'achat.');
        }

        return $this->finalizeCheckout(
            $checkout['basket_ident'],
            (int) $checkout['package_id'],
        );
    }

    public function thankyou(): View
    {
        session()->forget(self::CHECKOUT_SESSION);

        return $this->risePage('shop', 'pages.shop-thankyou');
    }

    private function finalizeCheckout(string $basketIdent, int $packageId): RedirectResponse
    {
        $updated = $this->tebex->addPackageToBasket($basketIdent, $packageId);

        if ($updated === null) {
            return redirect()->route('shop.index')
                ->with('error', 'Impossible d\'ajouter le pack au panier Tebex.');
        }

        $checkoutUrl = $this->tebex->checkoutUrl($updated);

        if ($checkoutUrl === null) {
            $basket = $this->tebex->getBasket($basketIdent);
            $checkoutUrl = $basket ? $this->tebex->checkoutUrl($basket) : null;
        }

        if ($checkoutUrl === null) {
            return redirect()->route('shop.index')
                ->with('error', 'URL de paiement Tebex introuvable.');
        }

        session()->forget(self::CHECKOUT_SESSION);

        return redirect()->away($checkoutUrl);
    }
}
