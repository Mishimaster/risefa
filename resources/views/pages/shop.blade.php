@extends('layouts.rise')

@section('content')
<main class="flex-1 w-full px-6 pt-36 pb-16">
  <div class="mx-auto max-w-[1400px]">
    <div class="mb-10 rounded-[2.5rem] border border-cyan-300/20 bg-black/40 p-8 sm:p-10 backdrop-blur shadow-[0_0_50px_rgba(51,153,255,0.18)]">
      <h1 class="font-pricedown text-5xl sm:text-6xl md:text-7xl bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">Shop</h1>
      <p class="mt-3 max-w-2xl text-lg text-slate-300">
        @if ($tebexConfigured)
          Boutique officielle Rise — paiement sécurisé via Tebex.
        @else
          Configurez <code class="text-cyan-300/80">TEBEX_PUBLIC_TOKEN</code> dans le fichier <code class="text-cyan-300/80">.env</code>.
        @endif
      </p>
    </div>

    @include('partials.player-status', [
      'playerWallet' => $wallet ?? null,
      'playerOnlineExpiresIn' => $onlineExpiresIn ?? 0,
    ])

    @if ($tebexConfigured && ! empty($tebexCategories))
      @foreach ($tebexCategories as $category)
        @php
          $packages = $category['packages'] ?? [];
        @endphp
        @if (empty($packages))
          @continue
        @endif

        <section class="mb-10 rounded-2xl border border-cyan-400/30 bg-black/50 p-6 sm:p-8 backdrop-blur">
          <h2 class="font-pricedown text-3xl text-cyan-200 mb-1">{{ $category['name'] ?? 'Boutique' }}</h2>
          @if (! empty($category['description']))
            <p class="mb-6 text-sm text-slate-400">{!! strip_tags($category['description']) !!}</p>
          @else
            <div class="mb-6"></div>
          @endif

          <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
            @foreach ($packages as $package)
              @php
                $price = (float) ($package['total_price'] ?? $package['base_price'] ?? $package['price'] ?? 0);
                $currency = $package['currency'] ?? 'EUR';
              @endphp
              <article class="flex flex-col rounded-2xl border border-cyan-400/40 bg-black/45 p-6 backdrop-blur shadow-[0_0_24px_rgba(34,211,238,0.12)]">
                @if (! empty($package['image']))
                  <img src="{{ $package['image'] }}" alt="" class="mb-4 h-36 w-full rounded-xl object-cover" loading="lazy" />
                @endif
                <h3 class="font-pricedown text-2xl text-cyan-100">{{ $package['name'] ?? 'Pack' }}</h3>
                @if (! empty($package['description']))
                  <div class="mt-2 flex-1 text-sm text-slate-300 line-clamp-5 prose-invert">{!! strip_tags($package['description']) !!}</div>
                @else
                  <div class="flex-1"></div>
                @endif
                <p class="mt-4 text-2xl font-bold text-white">
                  {{ number_format($price, 2, ',', ' ') }}&nbsp;{{ $currency }}
                </p>
                <form method="POST" action="{{ route('shop.checkout') }}" class="mt-4">
                  @csrf
                  <input type="hidden" name="package_id" value="{{ $package['id'] }}" />
                  @if ($canPurchase ?? false)
                    <button type="submit" class="w-full rounded-xl border border-cyan-400/50 bg-cyan-500/25 px-4 py-2.5 text-sm font-semibold text-cyan-100 transition hover:bg-cyan-500/35 hover:shadow-[0_0_20px_rgba(34,211,238,0.25)]">
                      Acheter
                    </button>
                    <p class="mt-2 text-center text-xs text-slate-500">Auth Cfx via Tebex au paiement si nécessaire</p>
                  @else
                    <button type="button" disabled class="w-full cursor-not-allowed rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm font-semibold text-white/40">
                      Connexion requise
                    </button>
                  @endif
                </form>
              </article>
            @endforeach
          </div>
        </section>
      @endforeach
    @elseif ($tebexConfigured)
      <div class="rounded-2xl border border-amber-400/30 bg-amber-500/10 p-8 text-center">
        <p class="text-amber-100">Tebex est configuré mais aucun pack n'a été trouvé. Vérifiez votre store Tebex.</p>
      </div>
    @else
      <div class="rounded-2xl border border-white/10 bg-black/40 p-8 text-center text-slate-400">
        Boutique indisponible — token Tebex manquant.
      </div>
    @endif
  </div>
</main>
@endsection

@push('scripts')
@if (isset($player) && $player->isLoggedIn() && ($canPurchase ?? false))
<script>
(function () {
  const pingUrl = @json(route('api.game.ping'));
  const csrf = document.querySelector('meta[name="csrf-token"]')?.content;
  let expiresIn = {{ (int) ($onlineExpiresIn ?? 0) }};
  const countdownEl = document.getElementById("online-countdown");

  setInterval(() => {
    if (expiresIn <= 0) return;
    expiresIn--;
    if (countdownEl) countdownEl.textContent = Math.max(1, Math.ceil(expiresIn / 60)) + " min";
  }, 1000);

  if (csrf) {
    setInterval(async () => {
      try {
        const res = await fetch(pingUrl, {
          method: "POST",
          headers: { "X-CSRF-TOKEN": csrf, "Accept": "application/json" },
        });
        if (res.ok) {
          const data = await res.json();
          if (typeof data.expires_in === "number") expiresIn = data.expires_in;
        }
      } catch (_) {}
    }, 120000);
  }
})();
</script>
@endif
@endpush
