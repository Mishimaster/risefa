@extends('layouts.rise')

@section('content')
<main class="flex-1 w-full px-6 pt-36 pb-16">

    <section class="mx-auto max-w-[1400px]">
      <div class="pointer-events-none absolute left-[12%] top-[45%] h-64 w-64 rounded-full bg-emerald-300/15 blur-[85px] smoke"></div>
      <div class="w-full rounded-[2.5rem] border border-emerald-300/20 bg-black/40 p-8 sm:p-10 backdrop-blur shadow-[0_0_50px_rgba(16,185,129,0.2)]">
        <h1 class="font-pricedown text-5xl sm:text-6xl md:text-7xl bg-gradient-to-r from-emerald-300 to-white bg-clip-text text-transparent">Métiers</h1>
        <p class="mt-3 text-lg sm:text-xl text-slate-300 text-center rounded-xl border border-emerald-300/30 bg-emerald-400/10 p-4">💼 <strong class="text-white">Pour rejoindre le Discord d'un métier légal</strong>, cliquez sur la carte du métier qui vous intéresse ci-dessous.</p>
      </div>
    </section>

    <section class="mx-auto mt-8 max-w-[1400px] grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      <a href="https://discord.gg/4TvdY4smkT" target="_blank" class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6 backdrop-blur text-center hover:scale-[1.02] hover:border-emerald-300 transition">
        <img src="{{ asset('images/LSPD.png') }}" alt="LSPD" class="mx-auto mb-4 h-28 w-auto object-contain" /><h2 class="font-pricedown text-3xl text-emerald-300">LSPD</h2><p class="mt-2 text-slate-300">Service de police de San Andreas. Maintenez l'ordre, effectuez des patrouilles et protégez les citoyens.</p>
      </a>
      <a href="https://discord.gg/ay9RSd3cwC" target="_blank" class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6 backdrop-blur text-center hover:scale-[1.02] hover:border-emerald-300 transition">
        <img src="{{ asset('images/ems.png') }}" alt="EMS" class="mx-auto mb-4 h-28 w-auto object-contain" /><h2 class="font-pricedown text-3xl text-emerald-300">EMS</h2><p class="mt-2 text-slate-300">Services médicaux d'urgence. Sauvez des vies, soignez les blessés et gérez les situations critiques.</p>
      </a>
      <a href="https://discord.gg/HJt8AdQr" target="_blank" class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6 backdrop-blur text-center hover:scale-[1.02] hover:border-emerald-300 transition">
        <img src="{{ asset('images/vice-car-dealer.png') }}" alt="Vice Car Dealer" class="mx-auto mb-4 h-28 w-auto object-contain" /><h2 class="font-pricedown text-3xl text-emerald-300">Vice Car Dealer</h2><p class="mt-2 text-slate-300">Vendez les véhicules les plus prestigieux de Los Santos. Négociations, essais routiers et service client.</p>
      </a>
      <a href="https://discord.gg/4fmAHP3mGD" target="_blank" class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6 backdrop-blur text-center hover:scale-[1.02] hover:border-emerald-300 transition">
        <img src="{{ asset('images/dynasty8.png') }}" alt="Dynasty8" class="mx-auto mb-4 h-28 w-auto object-contain" /><h2 class="font-pricedown text-3xl text-emerald-300">Dynasty8</h2><p class="mt-2 text-slate-300">Agence immobilière de luxe. Vendez maisons, appartements et locaux commerciaux à travers la ville.</p>
      </a>
      <a href="https://discord.gg/hcqWr4K9zs" target="_blank" class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6 backdrop-blur text-center hover:scale-[1.02] hover:border-emerald-300 transition">
        <img src="{{ asset('images/burger-shot.png') }}" alt="Burger Shot" class="mx-auto mb-4 h-28 w-auto object-contain" /><h2 class="font-pricedown text-3xl text-emerald-300">Burger Shot</h2><p class="mt-2 text-slate-300">Chaîne de restauration rapide. Préparez des burgers, servez les clients et gérez votre équipe.</p>
      </a>
      <a href="https://discord.gg/AMVNqXPF6V" target="_blank" class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6 backdrop-blur text-center hover:scale-[1.02] hover:border-emerald-300 transition">
        <img src="{{ asset('images/gouvernement.png') }}" alt="Gouvernement" class="mx-auto mb-4 h-28 w-auto object-contain" /><h2 class="font-pricedown text-3xl text-emerald-300">Gouvernement</h2><p class="mt-2 text-slate-300">Profession juridique. Défendez vos clients au tribunal, conseillez et plaidez pour la justice.</p>
      </a>
      <a href="https://discord.gg/Jxs5U4qxnu" target="_blank" class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6 backdrop-blur text-center hover:scale-[1.02] hover:border-emerald-300 transition">
        <img src="{{ asset('images/taxi.png') }}" alt="Taxi" class="mx-auto mb-4 h-28 w-auto object-contain" /><h2 class="font-pricedown text-3xl text-emerald-300">Taxi</h2><p class="mt-2 text-slate-300">Service de transport urbain. Conduisez les citoyens à destination avec ponctualité et professionnalisme.</p>
      </a>
      <a href="https://discord.gg/6SAsQ5tUR6" target="_blank" class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6 backdrop-blur text-center hover:scale-[1.02] hover:border-emerald-300 transition">
        <img src="{{ asset('images/moore-club.png') }}" alt="Moore Club" class="mx-auto mb-4 h-28 w-auto object-contain" /><h2 class="font-pricedown text-3xl text-emerald-300">Moore Club</h2><p class="mt-2 text-slate-300">Club de divertissement pour adultes. Gérez les spectacles, le bar et assurez une ambiance festive.</p>
      </a>
      <a href="https://discord.gg/CgeJDsEQkX" target="_blank" class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6 backdrop-blur text-center hover:scale-[1.02] hover:border-emerald-300 transition">
        <img src="{{ asset('images/bennys.png') }}" alt="Benny's" class="mx-auto mb-4 h-28 w-auto object-contain" /><h2 class="font-pricedown text-3xl text-emerald-300">Benny's</h2><p class="mt-2 text-slate-300">Garage de customisation réputé. Réparez, tunez et transformez les véhicules de vos clients.</p>
      </a>
      <a href="https://discord.gg/ac58zkgM" target="_blank" class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6 backdrop-blur text-center hover:scale-[1.02] hover:border-emerald-300 transition">
        <img src="{{ asset('images/LTD.webp') }}" alt="LTD" class="mx-auto mb-4 h-28 w-auto object-contain" /><h2 class="font-pricedown text-3xl text-emerald-300">LTD</h2><p class="mt-2 text-slate-300">Le LTD fournit aux habitants du quartier tout ce dont ils ont besoin au quotidien nourriture, boissons et articles essentiels.</p>
      </a>
    </section>

    <section id="creer-groupe" class="mx-auto mt-10 max-w-[1400px]">
      <div class="rounded-[2.5rem] border border-emerald-300/25 bg-black/40 p-8 sm:p-10 backdrop-blur shadow-[0_0_45px_rgba(16,185,129,0.18)]">
        <h2 class="font-pricedown text-5xl text-center mb-10 bg-gradient-to-r from-emerald-300 to-white bg-clip-text text-transparent">Créer votre entreprise</h2>
        <div class="grid gap-6 md:grid-cols-3 text-center">
          <div class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6"><div class="text-4xl mb-3">📝</div><h3 class="font-pricedown text-3xl mb-2">Dossier complet</h3><p class="text-slate-300">Préparez un business plan détaillé : concept, emplacement, tarifs, objectifs et organisation.</p></div>
          <div class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6"><div class="text-4xl mb-3">💰</div><h3 class="font-pricedown text-3xl mb-2">Capital requis</h3><p class="text-slate-300">Un capital initial est nécessaire pour créer votre entreprise (variable selon l'activité).</p></div>
          <div class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6"><div class="text-4xl mb-3">🎭</div><h3 class="font-pricedown text-3xl mb-2">Expérience RP</h3><p class="text-slate-300">Une implication RP cohérente et sérieuse est demandée pour une bonne intégration.</p></div>
        </div>
        <div class="mt-8 text-center">
          <a href="https://discord.gg/yG2dkSvCuS" target="_blank" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-emerald-600 to-emerald-500 px-10 py-4 text-lg font-bold text-white shadow-[0_10px_25px_rgba(16,185,129,0.35)] hover:scale-[1.02] transition">📥 Déposer le dossier</a>
        </div>
      </div>
    </section>
  
</main>
@endsection
