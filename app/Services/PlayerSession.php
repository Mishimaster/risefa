<?php

namespace App\Services;

use App\Models\EsxUser;
use Illuminate\Support\Facades\Session;

class PlayerSession
{
    public const SESSION_KEY = 'rise_player';

    public function isLoggedIn(): bool
    {
        return Session::has(self::SESSION_KEY.'.license');
    }

    public function license(): ?string
    {
        return Session::get(self::SESSION_KEY.'.license');
    }

    public function username(): ?string
    {
        return Session::get(self::SESSION_KEY.'.username');
    }

    public function onlineVerifiedAt(): ?int
    {
        $value = Session::get(self::SESSION_KEY.'.online_at');

        return is_numeric($value) ? (int) $value : null;
    }

    public function isOnlineVerified(): bool
    {
        if (! $this->isLoggedIn()) {
            return false;
        }

        $onlineAt = $this->onlineVerifiedAt();

        if ($onlineAt === null) {
            return false;
        }

        return (time() - $onlineAt) <= (int) config('rise.game_auth.token_ttl', 300);
    }

    public function onlineExpiresInSeconds(): int
    {
        $onlineAt = $this->onlineVerifiedAt();

        if ($onlineAt === null) {
            return 0;
        }

        $remaining = ($onlineAt + (int) config('rise.game_auth.token_ttl', 300)) - time();

        return max(0, $remaining);
    }

    public function login(string $license, ?string $username = null): void
    {
        Session::put(self::SESSION_KEY, [
            'license' => $license,
            'username' => $username,
            'online_at' => time(),
        ]);
    }

    public function refreshOnlineStatus(): void
    {
        if (! $this->isLoggedIn()) {
            return;
        }

        Session::put(self::SESSION_KEY.'.online_at', time());
    }

    public function logout(): void
    {
        Session::forget(self::SESSION_KEY);
    }

    public function esxUser(): ?EsxUser
    {
        $license = $this->license();

        if ($license === null) {
            return null;
        }

        try {
            return EsxUser::query()->find($license);
        } catch (\Throwable) {
            return null;
        }
    }

    public function wallet(): ?array
    {
        return $this->esxUser()?->wallet();
    }
}
