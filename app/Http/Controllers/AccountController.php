<?php

namespace App\Http\Controllers;

use App\Services\PlayerSession;
use Illuminate\View\View;

class AccountController extends RisePageController
{
    public function __construct(
        private readonly PlayerSession $playerSession,
    ) {}

    public function show(): View
    {
        $esxUser = $this->playerSession->esxUser();

        return $this->risePage('account', 'pages.account', [
            'player' => $this->playerSession,
            'esxUser' => $esxUser,
            'wallet' => $this->playerSession->wallet(),
            'onlineExpiresIn' => $this->playerSession->onlineExpiresInSeconds(),
        ]);
    }
}
