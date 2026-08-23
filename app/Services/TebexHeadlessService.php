<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TebexHeadlessService
{
    private string $publicToken;

    public function __construct()
    {
        $this->publicToken = (string) config('rise.tebex.public_token');
    }

    public function isConfigured(): bool
    {
        return $this->publicToken !== '';
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function categoriesWithPackages(): array
    {
        if (! $this->isConfigured()) {
            return [];
        }

        $categories = $this->fetchCategories();

        $hasPackages = collect($categories)->contains(
            fn (array $category) => ! empty($category['packages'])
        );

        if ($hasPackages) {
            return $categories;
        }

        $packages = $this->allPackages();

        if ($packages === []) {
            return $categories;
        }

        return [[
            'id' => 0,
            'name' => 'Boutique Rise',
            'description' => '',
            'packages' => $packages,
        ]];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function fetchCategories(): array
    {
        try {
            $response = Http::timeout(15)
                ->get("https://headless.tebex.io/api/accounts/{$this->publicToken}/categories", [
                    'includePackages' => 1,
                ]);

            if (! $response->successful()) {
                Log::warning('Tebex categories fetch failed', ['status' => $response->status()]);

                return [];
            }

            return $response->json('data') ?? [];
        } catch (\Throwable $e) {
            Log::error('Tebex categories exception', ['message' => $e->getMessage()]);

            return [];
        }
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function allPackages(): array
    {
        if (! $this->isConfigured()) {
            return [];
        }

        try {
            $response = Http::timeout(15)
                ->get("https://headless.tebex.io/api/accounts/{$this->publicToken}/packages");

            if (! $response->successful()) {
                return [];
            }

            return $response->json('data') ?? [];
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * @return array<string, mixed>|null
     */
    public function createBasket(string $ip, string $completeUrl, string $cancelUrl, ?string $username = null): ?array
    {
        if (! $this->isConfigured()) {
            return null;
        }

        $payload = [
            'complete_url' => $completeUrl,
            'cancel_url' => $cancelUrl,
            'complete_auto_redirect' => true,
            'ip_address' => $ip,
        ];

        if ($username !== null && $username !== '') {
            $payload['username'] = $username;
        }

        try {
            $response = Http::timeout(15)
                ->post("https://headless.tebex.io/api/accounts/{$this->publicToken}/baskets", $payload);

            if (! $response->successful()) {
                Log::warning('Tebex basket creation failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return null;
            }

            return $response->json('data');
        } catch (\Throwable $e) {
            Log::error('Tebex basket exception', ['message' => $e->getMessage()]);

            return null;
        }
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getBasket(string $basketIdent): ?array
    {
        if (! $this->isConfigured()) {
            return null;
        }

        try {
            $response = Http::timeout(15)
                ->get("https://headless.tebex.io/api/accounts/{$this->publicToken}/baskets/{$basketIdent}");

            if (! $response->successful()) {
                return null;
            }

            return $response->json('data');
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getBasketAuthProviders(string $basketIdent, string $returnUrl): array
    {
        if (! $this->isConfigured()) {
            return [];
        }

        try {
            $response = Http::timeout(15)
                ->get("https://headless.tebex.io/api/accounts/{$this->publicToken}/baskets/{$basketIdent}/auth", [
                    'returnUrl' => $returnUrl,
                ]);

            if (! $response->successful()) {
                Log::warning('Tebex basket auth failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return [];
            }

            $data = $response->json();

            return is_array($data) ? $data : [];
        } catch (\Throwable $e) {
            Log::error('Tebex basket auth exception', ['message' => $e->getMessage()]);

            return [];
        }
    }

    public function getFivemAuthUrl(string $basketIdent, string $returnUrl): ?string
    {
        $providers = $this->getBasketAuthProviders($basketIdent, $returnUrl);

        foreach ($providers as $provider) {
            if (! is_array($provider)) {
                continue;
            }

            $name = (string) ($provider['name'] ?? '');

            if (stripos($name, 'FiveM') !== false || stripos($name, 'Cfx') !== false) {
                return $provider['url'] ?? null;
            }
        }

        return $providers[0]['url'] ?? null;
    }

    public function basketNeedsAuth(?array $basket): bool
    {
        if ($basket === null) {
            return true;
        }

        return empty($basket['username']);
    }

    /**
     * @return array<string, mixed>|null
     */
    public function addPackageToBasket(string $basketIdent, int $packageId, int $quantity = 1): ?array
    {
        if (! $this->isConfigured()) {
            return null;
        }

        try {
            $response = Http::timeout(15)
                ->post("https://headless.tebex.io/api/accounts/{$this->publicToken}/baskets/{$basketIdent}/packages", [
                    'package_id' => $packageId,
                    'quantity' => $quantity,
                ]);

            if (! $response->successful()) {
                Log::warning('Tebex add package failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'package_id' => $packageId,
                ]);

                return null;
            }

            return $response->json('data');
        } catch (\Throwable $e) {
            Log::error('Tebex add package exception', ['message' => $e->getMessage()]);

            return null;
        }
    }

    /**
     * @param  array<string, mixed>  $package
     */
    public function packagePrice(array $package): float
    {
        if (isset($package['total_price'])) {
            return (float) $package['total_price'];
        }

        if (isset($package['base_price'])) {
            return (float) $package['base_price'];
        }

        return (float) ($package['price'] ?? 0);
    }

    /**
     * @param  array<string, mixed>  $basket
     */
    public function checkoutUrl(array $basket): ?string
    {
        $url = $basket['links']['checkout'] ?? null;

        return is_string($url) ? $url : null;
    }
}
