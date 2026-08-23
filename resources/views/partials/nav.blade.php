@php
  $navLink = fn (string $routeName) => request()->routeIs($routeName)
    ? 'text-white pointer-events-none'
    : 'text-white/60 hover:text-white transition';
  $navLinkMobile = fn (string $routeName) => request()->routeIs($routeName)
    ? 'block rounded-lg px-3 py-2 text-white bg-white/10 pointer-events-none'
    : 'block rounded-lg px-3 py-2 text-white/70 hover:bg-white/10';
  $enJeuActive = request()->routeIs('metiers-legaux', 'organisations-criminelles');
@endphp

<header class="fixed top-0 left-0 right-0 z-50 border-b border-cyan-300/20 bg-black/70 backdrop-blur px-[5%] py-4">
  <nav class="mx-auto flex max-w-[1400px] items-center justify-between gap-4">
    <a href="{{ route('home') }}" class="flex items-center">
      <img src="{{ asset('images/' . ($theme['logo'] ?? 'logorisefa.png')) }}" alt="{{ $theme['logo_alt'] ?? 'Rise' }}" class="{{ $theme['logo_glow'] ?? 'nav-logo-glow-cyan' }} h-20 w-auto object-contain" />
    </a>

    <div class="flex items-center gap-3 ml-auto">
      <div class="server-status-montserrat group relative hidden md:block">
        <button
          type="button"
          class="relative flex cursor-help items-center justify-center rounded-full border border-emerald-400/25 bg-emerald-500/10 p-2 shadow-[0_0_20px_rgba(16,185,129,0.15)] focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400/60"
          aria-label="État du serveur"
        >
          <span class="relative flex h-3.5 w-3.5 shrink-0" aria-hidden="true">
            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-40"></span>
            <span class="relative inline-flex h-3.5 w-3.5 rounded-full bg-gradient-to-b from-emerald-300 to-emerald-600 shadow-[0_0_12px_rgba(52,211,153,0.95)] ring-2 ring-emerald-400/50"></span>
          </span>
        </button>
        <span role="tooltip" class="pointer-events-none absolute left-1/2 top-full z-[60] mt-2 -translate-x-1/2 whitespace-nowrap rounded-lg border border-emerald-400/25 bg-black/95 px-3 py-1.5 text-xs font-semibold tracking-wide text-emerald-100 shadow-[0_0_24px_rgba(16,185,129,0.35)] backdrop-blur opacity-0 transition-opacity duration-200 group-hover:opacity-100 group-focus-within:opacity-100">
          Serveur {{ config('rise.server.name') }}
        </span>
      </div>

      @if (isset($player) && $player->isLoggedIn())
        <a href="{{ route('account.show') }}" class="server-status-montserrat hidden md:flex items-center gap-2 rounded-full border border-cyan-400/25 bg-cyan-500/10 px-3 py-1.5 text-xs font-semibold text-cyan-100 hover:bg-cyan-500/15 transition">
          @if (isset($playerWallet) && $playerWallet)
            <span class="text-slate-400">$</span>{{ number_format($playerWallet['money'] + $playerWallet['bank'], 0, ',', ' ') }}
          @else
            Mon compte
          @endif
        </a>
      @endif

      <ul class="hidden md:flex items-center gap-8 text-[1.125rem] font-medium font-pricedown">
        <li><a href="{{ route('home') }}" @if(request()->routeIs('home')) aria-current="page" @endif class="{{ $navLink('home') }}">Accueil</a></li>
        <li><a href="{{ route('faq') }}" @if(request()->routeIs('faq')) aria-current="page" @endif class="{{ $navLink('faq') }}">FAQ</a></li>
        <li class="relative group">
          <button type="button" class="{{ $enJeuActive ? 'text-white' : 'text-white/60 hover:text-white transition' }}">En jeu</button>
          <div class="absolute right-0 top-full hidden pt-2 group-hover:block group-focus-within:block">
            <div class="min-w-64 rounded-xl border border-white/10 bg-black/80 p-2 shadow-[0_0_35px_rgba(51,153,255,0.18)] backdrop-blur">
              <a href="{{ route('metiers-legaux') }}" class="block rounded-lg px-3 py-2 text-riseCyan {{ request()->routeIs('metiers-legaux') ? 'bg-white/10 pointer-events-none' : 'hover:bg-white/5' }}">Métiers légaux</a>
              <a href="{{ route('organisations-criminelles') }}" class="mt-1 block rounded-lg px-3 py-2 text-riseRose {{ request()->routeIs('organisations-criminelles') ? 'bg-white/10 pointer-events-none' : 'hover:bg-white/5' }}">Organisations criminelles</a>
            </div>
          </div>
        </li>
        <li><a href="{{ route('shop.index') }}" @if(request()->routeIs('shop.*')) aria-current="page" @endif class="{{ request()->routeIs('shop.*') ? 'text-white pointer-events-none' : 'text-white/60 hover:text-white transition' }}">Shop</a></li>
        @if (isset($player) && $player->isLoggedIn())
          <li><a href="{{ route('account.show') }}" class="{{ $navLink('account.show') }}">Compte</a></li>
        @endif
      </ul>

      <button id="menu-button" type="button" class="rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-[1.125rem] font-pricedown text-white/90 md:hidden">Menu</button>
    </div>
  </nav>

  <div id="mobile-menu" class="hidden md:hidden mt-3 border-t border-white/10 pt-3">
    @if (isset($player) && $player->isLoggedIn() && isset($playerWallet) && $playerWallet)
      <a href="{{ route('account.show') }}" class="mb-3 block rounded-lg border border-cyan-400/25 bg-cyan-500/10 px-3 py-2 text-center text-sm font-semibold text-cyan-100">
        Wallet : ${{ number_format($playerWallet['money'] + $playerWallet['bank'], 0, ',', ' ') }}
      </a>
    @endif
    <ul class="flex flex-col gap-2 text-[1.125rem] font-medium font-pricedown">
      <li><a href="{{ route('home') }}" class="{{ $navLinkMobile('home') }}">Accueil</a></li>
      <li><a href="{{ route('faq') }}" class="{{ $navLinkMobile('faq') }}">FAQ</a></li>
      <li class="rounded-lg border border-white/10 bg-black/60 p-2">
        <p class="px-2 pb-2 text-white/70">En jeu</p>
        <a href="{{ route('metiers-legaux') }}" class="block rounded-lg px-3 py-2 text-riseCyan {{ request()->routeIs('metiers-legaux') ? 'bg-white/10 pointer-events-none' : 'hover:bg-white/5' }}">Métiers légaux</a>
        <a href="{{ route('organisations-criminelles') }}" class="mt-1 block rounded-lg px-3 py-2 text-riseRose {{ request()->routeIs('organisations-criminelles') ? 'bg-white/10 pointer-events-none' : 'hover:bg-white/5' }}">Organisations criminelles</a>
      </li>
      <li><a href="{{ route('shop.index') }}" class="{{ $navLinkMobile('shop.index') }}">Shop</a></li>
      @if (isset($player) && $player->isLoggedIn())
        <li><a href="{{ route('account.show') }}" class="{{ $navLinkMobile('account.show') }}">Compte</a></li>
      @endif
    </ul>
  </div>
</header>
