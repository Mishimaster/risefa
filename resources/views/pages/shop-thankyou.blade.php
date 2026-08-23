@extends('layouts.rise')

@section('content')
<main class="flex-1 w-full px-6 pt-36 pb-16">
  <div class="mx-auto max-w-2xl text-center">
    <div class="rounded-[2.5rem] border border-cyan-300/20 bg-black/40 p-10 backdrop-blur shadow-[0_0_50px_rgba(51,153,255,0.18)]">
      <div class="text-5xl mb-4">✅</div>
      <h1 class="font-pricedown text-4xl sm:text-5xl bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">Merci pour votre achat !</h1>
      <p class="mt-4 text-lg text-slate-300">Votre paiement Tebex est en cours de traitement. Le pack sera livré sur le serveur si vous êtes connecté.</p>
      <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:justify-center">
        <a href="{{ route('shop.index') }}" class="rounded-xl border border-cyan-400/50 bg-cyan-500/25 px-6 py-3 font-semibold text-cyan-100 transition hover:bg-cyan-500/35">Retour à la boutique</a>
        <a href="{{ route('account.show') }}" class="rounded-xl border border-white/15 bg-white/10 px-6 py-3 font-semibold text-white transition hover:bg-white/15">Mon compte</a>
      </div>
    </div>
  </div>
</main>
@endsection
