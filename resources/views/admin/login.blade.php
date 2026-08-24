<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Connexion admin — Rise FA</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" />
</head>
<body class="min-h-screen bg-[#0a0a0a] text-white flex items-center justify-center px-4">
  <div class="w-full max-w-md rounded-2xl border border-white/10 bg-black/50 p-8 backdrop-blur">
    <h1 class="text-2xl font-semibold text-cyan-100">Admin Rise FA</h1>
    <p class="mt-2 text-sm text-slate-400">Connectez-vous pour gérer les métiers et organisations.</p>

    @if ($errors->any())
      <div class="mt-4 rounded-xl border border-rose-400/30 bg-rose-500/10 px-4 py-3 text-sm text-rose-100">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}" class="mt-6 space-y-4">
      @csrf
      <div>
        <label for="username" class="block text-sm text-slate-300">Identifiant</label>
        <input id="username" name="username" value="{{ old('username') }}" required autofocus
          class="mt-1 w-full rounded-xl border border-white/15 bg-black/40 px-4 py-2.5 text-white outline-none focus:border-cyan-400/50" />
      </div>
      <div>
        <label for="password" class="block text-sm text-slate-300">Mot de passe</label>
        <input id="password" type="password" name="password" required
          class="mt-1 w-full rounded-xl border border-white/15 bg-black/40 px-4 py-2.5 text-white outline-none focus:border-cyan-400/50" />
      </div>
      <label class="flex items-center gap-2 text-sm text-slate-400">
        <input type="checkbox" name="remember" class="rounded border-white/20 bg-black/40" />
        Se souvenir de moi
      </label>
      <button type="submit" class="w-full rounded-xl border border-cyan-400/40 bg-cyan-500/20 px-4 py-2.5 font-semibold text-cyan-50 hover:bg-cyan-500/30">
        Connexion
      </button>
    </form>
  </div>
</body>
</html>
