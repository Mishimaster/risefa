@extends('layouts.rise')

@section('content')
<main class="flex-1 w-full px-6 pt-36 pb-16">
  <div class="mx-auto max-w-[1400px]">
    <div class="mb-10 rounded-[2.5rem] border border-cyan-300/20 bg-black/40 p-8 sm:p-10 backdrop-blur shadow-[0_0_50px_rgba(51,153,255,0.18)]">
      <h1 class="font-pricedown text-5xl sm:text-6xl md:text-7xl bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">Mon compte</h1>
      <p class="mt-3 max-w-2xl text-lg text-slate-300">Wallet et profil liés à votre personnage ESX.</p>
    </div>

    @if (!$player->isLoggedIn())
      <div class="rounded-2xl border border-amber-400/30 bg-amber-500/10 p-8 text-center">
        <p class="text-lg text-amber-100">Connectez-vous depuis le serveur avec la commande <strong class="font-mono">/site</strong> pour lier votre compte.</p>
        <p class="mt-2 text-sm text-slate-400">Vous devez être en jeu sur Rise FA.</p>
      </div>
    @else
      @if ($player->isOnlineVerified())
        <div class="mb-6 rounded-xl border border-emerald-400/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-100">
          Session en ligne active — expire dans {{ (int) floor(($onlineExpiresIn ?? 0) / 60) }} min
        </div>
      @else
        <div class="mb-6 rounded-xl border border-amber-400/30 bg-amber-500/10 px-4 py-3 text-sm text-amber-100">
          Session expirée. Relancez <strong class="font-mono">/site</strong> en jeu pour rafraîchir.
        </div>
      @endif

      <div class="grid gap-6 lg:grid-cols-2">
        <section class="rounded-2xl border border-cyan-300/20 bg-black/50 p-6 backdrop-blur">
          <h2 class="font-pricedown text-3xl text-cyan-200">Identité</h2>
          <dl class="mt-4 space-y-3 text-slate-300">
            <div class="flex justify-between gap-4 border-b border-white/10 pb-2">
              <dt class="text-slate-400">Personnage</dt>
              <dd class="font-semibold text-white">{{ $esxUser?->full_name ?? '—' }}</dd>
            </div>
            <div class="flex justify-between gap-4 border-b border-white/10 pb-2">
              <dt class="text-slate-400">Métier</dt>
              <dd class="font-semibold text-white">{{ $esxUser?->job ?? '—' }}</dd>
            </div>
            <div class="flex justify-between gap-4 border-b border-white/10 pb-2">
              <dt class="text-slate-400">Compte Cfx</dt>
              <dd class="font-semibold text-white">{{ $player->username() ?? '—' }}</dd>
            </div>
          </dl>
        </section>

        <section class="rounded-2xl border border-emerald-300/20 bg-black/50 p-6 backdrop-blur">
          <h2 class="font-pricedown text-3xl text-emerald-200">Wallet RP</h2>
          @if ($wallet)
            <dl class="mt-4 space-y-3 text-slate-300">
              <div class="flex justify-between gap-4 border-b border-white/10 pb-2">
                <dt class="text-slate-400">Liquide</dt>
                <dd class="font-semibold text-white">${{ number_format($wallet['money'], 0, ',', ' ') }}</dd>
              </div>
              <div class="flex justify-between gap-4 border-b border-white/10 pb-2">
                <dt class="text-slate-400">Banque</dt>
                <dd class="font-semibold text-white">${{ number_format($wallet['bank'], 0, ',', ' ') }}</dd>
              </div>
              <div class="flex justify-between gap-4 pb-2">
                <dt class="text-slate-400">Argent sale</dt>
                <dd class="font-semibold text-white">${{ number_format($wallet['black_money'], 0, ',', ' ') }}</dd>
              </div>
            </dl>
          @else
            <p class="mt-4 text-slate-400">Impossible de lire le wallet (base ESX inaccessible ou personnage introuvable).</p>
          @endif
        </section>
      </div>

      <div class="mt-8 flex flex-col items-center gap-3 sm:flex-row sm:justify-center">
        @if ($player->isOnlineVerified())
          <a href="{{ route('shop.index') }}" class="rounded-xl border border-cyan-400/50 bg-cyan-500/25 px-6 py-2.5 text-sm font-semibold text-cyan-100 transition hover:bg-cyan-500/35">Aller à la boutique</a>
        @endif
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="rounded-xl border border-white/15 bg-white/5 px-6 py-2.5 text-sm font-semibold text-white/80 hover:bg-white/10 transition">Se déconnecter</button>
        </form>
      </div>
    @endif
  </div>
</main>
@endsection
