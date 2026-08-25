<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="robots" content="noindex, nofollow" />
  <title>@yield('title', 'Admin') — Rise FA</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" />
</head>
<body class="min-h-screen bg-[#0a0a0a] text-white antialiased">
  <div class="min-h-screen flex">
    <aside class="hidden w-64 shrink-0 border-r border-white/10 bg-black/60 p-6 md:block">
      <a href="{{ route('admin.dashboard') }}" class="block font-semibold tracking-wide text-cyan-200">Rise Admin</a>
      <nav class="mt-8 space-y-1 text-sm">
        <a href="{{ route('admin.dashboard') }}" class="block rounded-lg px-3 py-2 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">Tableau de bord</a>
        <a href="{{ route('admin.jobs.index') }}" class="block rounded-lg px-3 py-2 {{ request()->routeIs('admin.jobs.*') ? 'bg-emerald-500/15 text-emerald-100' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">Métiers légaux</a>
        <a href="{{ route('admin.organizations.index') }}" class="block rounded-lg px-3 py-2 {{ request()->routeIs('admin.organizations.*') ? 'bg-rose-500/15 text-rose-100' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">Organisations</a>
        <a href="{{ route('admin.faq.index') }}" class="block rounded-lg px-3 py-2 {{ request()->routeIs('admin.faq.*') ? 'bg-purple-500/15 text-purple-100' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">FAQ / Chatbot</a>
        <a href="{{ route('home') }}" target="_blank" class="block rounded-lg px-3 py-2 text-slate-400 hover:bg-white/5 hover:text-white">Voir le site</a>
      </nav>
      <form method="POST" action="{{ route('admin.logout') }}" class="mt-10">
        @csrf
        <button type="submit" class="w-full rounded-lg border border-white/10 px-3 py-2 text-left text-sm text-slate-400 hover:bg-white/5 hover:text-white">Déconnexion</button>
      </form>
    </aside>

    <div class="flex-1">
      <header class="flex items-center justify-between border-b border-white/10 px-4 py-4 md:px-8">
        <div>
          <p class="text-xs uppercase tracking-widest text-slate-500">Administration</p>
          <h1 class="text-xl font-semibold">@yield('heading', 'Admin')</h1>
        </div>
        <div class="flex items-center gap-3 md:hidden">
          <a href="{{ route('admin.jobs.index') }}" class="text-sm text-emerald-300">Métiers</a>
          <a href="{{ route('admin.organizations.index') }}" class="text-sm text-rose-300">Orgs</a>
          <a href="{{ route('admin.faq.index') }}" class="text-sm text-purple-300">FAQ</a>
        </div>
      </header>

      <main class="px-4 py-8 md:px-8">
        @if (session('success'))
          <div class="mb-6 rounded-xl border border-emerald-400/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-100">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
          <div class="mb-6 rounded-xl border border-rose-400/30 bg-rose-500/10 px-4 py-3 text-sm text-rose-100">
            <ul class="list-disc pl-5">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        @yield('content')
      </main>
    </div>
  </div>
</body>
</html>
