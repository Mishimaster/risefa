<?php

namespace App\Http\Middleware;

use App\Services\PlayerSession;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePlayerOnline
{
    public function __construct(
        private readonly PlayerSession $playerSession,
    ) {}

    public function handle(Request $request, Closure $next): Response
    {
        if (! $this->playerSession->isLoggedIn()) {
            return redirect()->route('shop.index')
                ->with('error', 'Connectez-vous depuis le serveur avec la commande /site.');
        }

        if (! $this->playerSession->isOnlineVerified()) {
            return redirect()->route('shop.index')
                ->with('error', 'Session expirée ou vous n\'êtes plus considéré en ligne. Relancez /site en jeu.');
        }

        return $next($request);
    }
}
