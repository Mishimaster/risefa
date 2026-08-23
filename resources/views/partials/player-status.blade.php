@if (isset($player) && $player->isLoggedIn())
  <div class="mb-8 rounded-2xl border p-5 backdrop-blur {{ ($canPurchase ?? $player->isOnlineVerified()) ? 'border-emerald-400/30 bg-emerald-500/10' : 'border-amber-400/30 bg-amber-500/10' }}">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
      <div>
        @if ($canPurchase ?? $player->isOnlineVerified())
          <p class="font-semibold text-emerald-100">Connecté en jeu — achats autorisés</p>
          <p class="mt-1 text-sm text-slate-300">
            {{ $player->username() ?? 'Joueur' }}
            @if (isset($playerEsx) && $playerEsx)
              · {{ $playerEsx->full_name }}
            @endif
            @if (isset($playerOnlineExpiresIn) && $playerOnlineExpiresIn > 0)
              · session <span id="online-countdown">{{ (int) floor($playerOnlineExpiresIn / 60) }} min</span>
            @endif
          </p>
        @else
          <p class="font-semibold text-amber-100">Session expirée ou hors ligne</p>
          <p class="mt-1 text-sm text-slate-300">Reconnectez-vous depuis le serveur Rise FA pour acheter.</p>
        @endif
      </div>
      @if (isset($playerWallet) && $playerWallet)
        <div class="flex gap-4 text-sm">
          <div class="rounded-xl border border-white/10 bg-black/40 px-4 py-2 text-center">
            <p class="text-slate-400 text-xs uppercase">Liquide</p>
            <p class="font-bold text-white">${{ number_format($playerWallet['money'], 0, ',', ' ') }}</p>
          </div>
          <div class="rounded-xl border border-white/10 bg-black/40 px-4 py-2 text-center">
            <p class="text-slate-400 text-xs uppercase">Banque</p>
            <p class="font-bold text-white">${{ number_format($playerWallet['bank'], 0, ',', ' ') }}</p>
          </div>
        </div>
      @endif
    </div>
  </div>
@else
  <div class="mb-8 rounded-2xl border border-amber-400/30 bg-amber-500/10 p-5 backdrop-blur">
    <p class="font-semibold text-amber-100">Connexion requise pour acheter</p>
    <p class="mt-1 text-sm text-slate-300">Connectez-vous depuis le serveur Rise FA pour accéder à la boutique.</p>
  </div>
@endif
