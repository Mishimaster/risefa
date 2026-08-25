<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  @php
    $seoTitle = $theme['title'] ?? config('rise.seo.site_name').' | Serveur RP GTA 5 FiveM';
    $seoDescription = $theme['description'] ?? config('rise.seo.default_description');
    $seoKeywords = config('rise.seo.keywords');
    $seoSiteName = config('rise.seo.site_name');
    $seoCanonical = url()->current();
    $seoOgImage = asset(config('rise.seo.og_image'));
  @endphp
  <title>{{ $seoTitle }}</title>
  <meta name="description" content="{{ $seoDescription }}" />
  <meta name="keywords" content="{{ $seoKeywords }}" />
  <meta name="author" content="{{ $seoSiteName }}" />
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="{{ $seoCanonical }}" />
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" sizes="any" />
  <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="{{ $seoSiteName }}" />
  <meta property="og:locale" content="fr_FR" />
  <meta property="og:title" content="{{ $seoTitle }}" />
  <meta property="og:description" content="{{ $seoDescription }}" />
  <meta property="og:url" content="{{ $seoCanonical }}" />
  <meta property="og:image" content="{{ $seoOgImage }}" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:title" content="{{ $seoTitle }}" />
  <meta name="twitter:description" content="{{ $seoDescription }}" />
  <meta name="twitter:image" content="{{ $seoOgImage }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <script>
    window.tailwind = window.tailwind || {};
    window.tailwind.config = {
      theme: {
        extend: {
          colors: {
            riseBlue: "#3399ff",
            riseCyan: "#67e8f9",
            riseRose: "#fda4af",
            risePurple: "#a855f7"
          },
          fontFamily: {
            sans: ["Montserrat", "sans-serif"],
            pricedown: ["Pricedown Bl", "Montserrat", "sans-serif"]
          }
        }
      }
    };
  </script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('styles/styles.css') }}" />
  @stack('head')
</head>
<body class="min-h-screen flex flex-col bg-[#0a0a0a] text-white font-sans overflow-x-hidden">
  <div class="fixed inset-0 -z-10 bg-gradient-to-br {{ $theme['gradient'] ?? 'from-[#0a0a0a] via-[#12162a] to-[#0a0a0a]' }}" aria-hidden="true"></div>
  <div class="index-stars-bg fixed inset-0 -z-10 pointer-events-none {{ $theme['stars'] ?? '' }}" aria-hidden="true"></div>
  <div class="index-smoke-bg fixed inset-0 -z-10 pointer-events-none opacity-[0.15]" aria-hidden="true"></div>

  @include('partials.nav')

  @if (session('error'))
    <div class="fixed top-24 left-1/2 z-[70] -translate-x-1/2 max-w-lg rounded-xl border border-rose-400/40 bg-rose-950/90 px-4 py-3 text-sm text-rose-100 shadow-lg backdrop-blur">
      {{ session('error') }}
    </div>
  @endif

  @if (session('success'))
    <div class="fixed top-24 left-1/2 z-[70] -translate-x-1/2 max-w-lg rounded-xl border border-emerald-400/40 bg-emerald-950/90 px-4 py-3 text-sm text-emerald-100 shadow-lg backdrop-blur">
      {{ session('success') }}
    </div>
  @endif

  @yield('content')

  <footer class="mt-auto flex-shrink-0 px-6 py-10 border-t border-white/15 bg-white/5">
    <div class="mx-auto max-w-[1400px] text-center text-slate-300">&copy; {{ date('Y') }} Rise - Tous droits réservés</div>
  </footer>

  <livewire:faq-chat />

  <script>
    document.getElementById("menu-button")?.addEventListener("click", () => {
      document.getElementById("mobile-menu")?.classList.toggle("hidden");
    });
  </script>
  @stack('scripts')
</body>
</html>
