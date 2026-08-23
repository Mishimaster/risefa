<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\PlayerSession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GameAuthController extends Controller
{
    public function __construct(
        private readonly PlayerSession $playerSession,
    ) {}

    public function callback(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'token' => ['required', 'string'],
        ]);

        $payload = $this->parseToken($validated['token']);

        if ($payload === null) {
            return redirect()->route('home')->with('error', 'Lien de connexion invalide ou expiré.');
        }

        $this->playerSession->login(
            $payload['license'],
            $payload['username'] ?? null,
        );

        return redirect()->intended(route('account.show'))
            ->with('success', 'Connecté en tant que '.($payload['username'] ?? 'joueur').'.');
    }

    public function pingOnline(): \Illuminate\Http\JsonResponse
    {
        if (! $this->playerSession->isLoggedIn()) {
            return response()->json(['message' => 'Non connecté.'], 401);
        }

        $this->playerSession->refreshOnlineStatus();

        return response()->json([
            'ok' => true,
            'expires_in' => $this->playerSession->onlineExpiresInSeconds(),
        ]);
    }

    public function issueFromServer(Request $request): \Illuminate\Http\JsonResponse
    {
        if ($request->header('X-Rise-Secret') !== config('rise.game_auth.secret')) {
            return response()->json(['message' => 'Non autorisé.'], 403);
        }

        $validated = $request->validate([
            'license' => ['required', 'string', 'max:64'],
            'username' => ['nullable', 'string', 'max:64'],
        ]);

        $token = $this->buildToken($validated['license'], $validated['username'] ?? null);

        if ($token === null) {
            return response()->json(['message' => 'Secret site non configuré.'], 503);
        }

        return response()->json([
            'url' => route('auth.game', ['token' => $token]),
        ]);
    }

    public function logout(): RedirectResponse
    {
        $this->playerSession->logout();

        return redirect()->route('home');
    }

    /**
     * @return array{license: string, username?: string, exp: int}|null
     */
    private function parseToken(string $token): ?array
    {
        $secret = config('rise.game_auth.secret');

        if (empty($secret)) {
            return null;
        }

        $parts = explode('.', $token, 2);

        if (count($parts) !== 2) {
            return null;
        }

        [$payloadB64, $signature] = $parts;

        $expected = hash_hmac('sha256', $payloadB64, $secret);

        if (! hash_equals($expected, $signature)) {
            return null;
        }

        $json = base64_decode(strtr($payloadB64, '-_', '+/'), true);

        if ($json === false) {
            return null;
        }

        /** @var array{license?: string, username?: string, exp?: int}|null $data */
        $data = json_decode($json, true);

        if (! is_array($data) || empty($data['license']) || empty($data['exp'])) {
            return null;
        }

        if ($data['exp'] < time()) {
            return null;
        }

        return [
            'license' => $data['license'],
            'username' => $data['username'] ?? null,
            'exp' => (int) $data['exp'],
        ];
    }

    private function buildToken(string $license, ?string $username): ?string
    {
        $secret = config('rise.game_auth.secret');

        if (empty($secret)) {
            return null;
        }

        $payload = json_encode([
            'license' => $license,
            'username' => $username,
            'exp' => time() + (int) config('rise.game_auth.token_ttl', 300),
        ], JSON_THROW_ON_ERROR);

        $payloadB64 = rtrim(strtr(base64_encode($payload), '+/', '-_'), '=');
        $signature = hash_hmac('sha256', $payloadB64, $secret);

        return $payloadB64.'.'.$signature;
    }
}
