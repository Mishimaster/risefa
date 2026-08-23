@extends('layouts.rise')

@section('content')
<main class="flex-1 w-full px-6 pt-36 pb-16">

    <section class="mx-auto max-w-[1400px]">
      <div class="pointer-events-none absolute left-[12%] top-[45%] h-64 w-64 rounded-full bg-rose-300/15 blur-[85px] smoke"></div>
      <div class="w-full rounded-[2.5rem] border border-rose-300/20 bg-black/40 p-8 sm:p-10 backdrop-blur shadow-[0_0_50px_rgba(251,113,133,0.2)]">
        <h1 class="font-pricedown text-5xl sm:text-6xl md:text-7xl bg-gradient-to-r from-rose-300 to-white bg-clip-text text-transparent">Organisations criminelles</h1>
        <p class="mt-3 text-lg sm:text-xl text-slate-300 text-center rounded-xl border border-rose-300/30 bg-rose-400/10 p-4">🔴 <strong class="text-white">Pour rejoindre le Discord d'une organisation criminelle</strong>, cliquez sur la carte de l'organisation qui vous intéresse ci-dessous.</p>
      </div>
    </section>

    <section id="gang" class="mx-auto mt-8 max-w-[1400px]">
      <div class="rounded-[2.2rem] border border-rose-300/20 bg-black/40 p-8 backdrop-blur">
        <h1 class="font-pricedown text-5xl text-center mb-8 bg-gradient-to-r from-rose-300 to-white bg-clip-text text-transparent">GANG</h1>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 text-center">
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXballas" target="_blank"><div class="text-4xl mb-2">🟣</div><h3 class="font-pricedown text-3xl text-rose-300">Ballas</h3><p class="mt-2 text-slate-300">Gang de Los Santos specialise dans le trafic de drogue et le controle territorial. Rivalite historique avec les Families.</p></a>
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXf4l" target="_blank"><div class="text-4xl mb-2">👊</div><h3 class="font-pricedown text-3xl text-rose-300">F4L</h3><p class="mt-2 text-slate-300">Gang de rue axee sur la loyaute familiale, le racket et la protection de leur territoire.</p></a>
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXXlosvagos" target="_blank"><div class="text-4xl mb-2">🟡</div><h3 class="font-pricedown text-3xl text-rose-300">Los Vagos</h3><p class="mt-2 text-slate-300">Gang hispanique controlant le trafic de drogue dans l'est de Los Santos. Experts en street art et deals de rue.</p></a>
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXXmarabunta" target="_blank"><div class="text-4xl mb-2">🔵</div><h3 class="font-pricedown text-3xl text-rose-300">Marabunta</h3><p class="mt-2 text-slate-300">Gang latino violent specialise dans les braquages, extorsions et controle des quartiers par la force.</p></a>
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXXbloods" target="_blank"><div class="text-4xl mb-2">🔴</div><h3 class="font-pricedown text-3xl text-rose-300">Bloods</h3><p class="mt-2 text-slate-300">Gang legendaire de la cote Ouest. Trafic d'armes, drogue et controle territorial avec structure hierarchique stricte.</p></a>
        </div>
      </div>
    </section>

    <section id="mafia" class="mx-auto mt-8 max-w-[1400px]">
      <div class="rounded-[2.2rem] border border-rose-300/20 bg-black/40 p-8 backdrop-blur">
        <h1 class="font-pricedown text-5xl text-center mb-8 bg-gradient-to-r from-rose-300 to-white bg-clip-text text-transparent">FAMILLES MAFIA</h1>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 text-center">
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXXyakuza" target="_blank"><div class="text-4xl mb-2">🐉</div><h3 class="font-pricedown text-3xl text-rose-300">Les Yakuza</h3><p class="mt-2 text-slate-300">Mafia criminelle japonaise traditionnelle. Jeux d'argent, protection, trafic et code d'honneur strict.</p></a>
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXXndrangheta" target="_blank"><div class="text-4xl mb-2">🤝</div><h3 class="font-pricedown text-3xl text-rose-300">La Ndrangheta</h3><p class="mt-2 text-slate-300">Mafia calabraise puissante, specialisee dans le trafic international de cocaine et le blanchiment d'argent.</p></a>
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXXbratva" target="_blank"><div class="text-4xl mb-2">🐻</div><h3 class="font-pricedown text-3xl text-rose-300">Mafia Bratva</h3><p class="mt-2 text-slate-300">Mafia criminelle russe. Trafic d'armes, cybercriminalite, extorsion et reseaux internationaux.</p></a>
        </div>
      </div>
    </section>

    <section id="organisation" class="mx-auto mt-8 max-w-[1400px]">
      <div class="rounded-[2.2rem] border border-rose-300/20 bg-black/40 p-8 backdrop-blur">
        <h1 class="font-pricedown text-5xl text-center mb-8 bg-gradient-to-r from-rose-300 to-white bg-clip-text text-transparent">ORGANISATION</h1>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 text-center">
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXXoneils" target="_blank"><div class="text-4xl mb-2">🌾</div><h3 class="font-pricedown text-3xl text-rose-300">O'neils</h3><p class="mt-2 text-slate-300">Famille rurale impliquee dans la production de methamphetamine et la culture de cannabis en zone isolee.</p></a>
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXXlosaztecas" target="_blank"><div class="text-4xl mb-2">🦅</div><h3 class="font-pricedown text-3xl text-rose-300">Los Aztecas</h3><p class="mt-2 text-slate-300">Organisation criminelle mexicaine specialisee dans le trafic transfrontalier, la contrebande d'armes et le controle des routes.</p></a>
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXXaffranchis" target="_blank"><div class="text-4xl mb-2">💼</div><h3 class="font-pricedown text-3xl text-rose-300">Affranchis</h3><p class="mt-2 text-slate-300">Organisation mafieuse italo-americaine. Racket, blanchiment via entreprises legitimes et corruption politique.</p></a>
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXXgrimbastards" target="_blank"><div class="text-4xl mb-2">☠️</div><h3 class="font-pricedown text-3xl text-rose-300">Grim Bastards MC</h3><p class="mt-2 text-slate-300">Club de motards outlaws. Trafic de drogue, vols de vehicules, ateliers mecaniques clandestins et runs illegaux.</p></a>
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXXsonsofanarchy" target="_blank"><div class="text-4xl mb-2">🏍️</div><h3 class="font-pricedown text-3xl text-rose-300">Sons Of Anarchy MC</h3><p class="mt-2 text-slate-300">Motorcycle Club legendaire. Contrebande d'armes, protection de territoire et fraternite au-dessus de tout.</p></a>
        </div>
      </div>
    </section>

    <section id="cartels" class="mx-auto mt-8 max-w-[1400px]">
      <div class="rounded-[2.2rem] border border-rose-300/20 bg-black/40 p-8 backdrop-blur">
        <h1 class="font-pricedown text-5xl text-center mb-8 bg-gradient-to-r from-rose-300 to-white bg-clip-text text-transparent">CARTELS</h1>
        <div class="grid gap-6 sm:grid-cols-2 text-center">
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXXmadrazo" target="_blank"><div class="text-4xl mb-2">💰</div><h3 class="font-pricedown text-3xl text-rose-300">Cartel Madrazo</h3><p class="mt-2 text-slate-300">Cartel mexicain puissant dirige par Martin Madrazo. Empire criminel avec influence politique et economique.</p></a>
          <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] transition" href="https://discord.gg/XXXXjalisco" target="_blank"><div class="text-4xl mb-2">🌵</div><h3 class="font-pricedown text-3xl text-rose-300">Cartel Jalisco</h3><p class="mt-2 text-slate-300">Cartel Nueva Generacion impitoyable. Production massive de drogue, violence extreme et expansion territoriale.</p></a>
        </div>
      </div>
    </section>

    <section id="creer-org" class="mx-auto mt-8 max-w-[1400px]">
      <div class="rounded-[2.5rem] border border-rose-300/25 bg-black/40 p-8 sm:p-10 backdrop-blur shadow-[0_0_45px_rgba(251,113,133,0.18)]">
        <h2 class="font-pricedown text-5xl text-center mb-10 bg-gradient-to-r from-rose-300 to-white bg-clip-text text-transparent">Créer votre organisation</h2>
        <div class="grid gap-6 md:grid-cols-3 text-center">
          <div class="rounded-2xl border border-rose-300/20 bg-black/40 p-6"><div class="text-4xl mb-3">📝</div><h3 class="font-pricedown text-3xl mb-2">Dossier d'organisation</h3><p class="text-slate-300">Concept, objectifs, territoire, finances, effectif, tenue, vehicules, alliances/rivalites.</p></div>
          <div class="rounded-2xl border border-rose-300/20 bg-black/40 p-6"><div class="text-4xl mb-3">📚</div><h3 class="font-pricedown text-3xl mb-2">Trame RP & regles illegales</h3><p class="text-slate-300">Respect strict des regles (powergaming, fearRP, armes, otages, escalades, etc.).</p></div>
          <div class="rounded-2xl border border-rose-300/20 bg-black/40 p-6"><div class="text-4xl mb-3">🧬</div><h3 class="font-pricedown text-3xl mb-2">Equipe & hierarchie</h3><p class="text-slate-300">Leadership clair, roles definis, plan de recrutement et progression interne.</p></div>
        </div>
        <div class="mt-8 text-center">
          <a href="https://discord.gg/deposer-dossier" target="_blank" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-rose-500 to-red-500 px-10 py-4 text-lg font-bold text-white shadow-[0_10px_25px_rgba(251,113,133,0.35)] hover:scale-[1.02] transition">📥 Deposer le dossier</a>
        </div>
      </div>
    </section>
  
</main>
@endsection
