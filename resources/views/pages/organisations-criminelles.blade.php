@extends('layouts.rise')

@section('content')
<main class="flex-1 w-full px-6 pt-36 pb-16">

    <section class="mx-auto max-w-[1400px]">
      <div class="pointer-events-none absolute left-[12%] top-[45%] h-64 w-64 rounded-full bg-rose-300/15 blur-[85px] smoke"></div>
      <div class="w-full rounded-[2.5rem] border border-rose-300/20 bg-black/40 p-8 sm:p-10 backdrop-blur shadow-[0_0_50px_rgba(251,113,133,0.2)]">
        <h1 class="font-pricedown text-5xl sm:text-6xl md:text-7xl bg-gradient-to-r from-rose-300 to-white bg-clip-text text-transparent">Organisations criminelles</h1>
        <p class="mt-3 text-lg sm:text-xl text-slate-300 text-center rounded-xl border border-rose-300/30 bg-rose-400/10 p-4"><strong class="text-white">Pour rejoindre le Discord d'une organisation criminelle</strong>, cliquez sur la carte de l'organisation qui vous intéresse ci-dessous.</p>
      </div>
    </section>

    @forelse ($categories as $category)
      <section id="{{ $category->slug }}" class="mx-auto mt-8 max-w-[1400px]">
        <div class="rounded-[2.2rem] border border-rose-300/20 bg-black/40 p-8 backdrop-blur">
          <h2 class="font-pricedown text-5xl text-center mb-8 bg-gradient-to-r from-rose-300 to-white bg-clip-text text-transparent">{{ $category->name }}</h2>
          <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 text-center">
            @forelse ($category->organizations as $organization)
              <a class="rounded-2xl border border-rose-300/20 bg-black/40 p-6 hover:scale-[1.02] hover:border-rose-300 transition" href="{{ $organization->discord_url ?: '#' }}" @if ($organization->discord_url) target="_blank" rel="noopener" @endif>
                <img src="{{ $organization->imageUrl() }}" alt="{{ $organization->name }}" class="mx-auto mb-4 h-28 w-auto object-contain" />
                <h3 class="font-pricedown text-3xl text-rose-300">{{ $organization->name }}</h3>
                <p class="mt-2 text-slate-300">{{ $organization->description }}</p>
              </a>
            @empty
              <p class="col-span-full text-slate-400">Aucune organisation dans cette section.</p>
            @endforelse
          </div>
        </div>
      </section>
    @empty
      <p class="mx-auto mt-8 max-w-[1400px] rounded-2xl border border-white/10 bg-black/40 p-8 text-center text-slate-400">Aucune organisation n'est publiée pour le moment.</p>
    @endforelse

    <section id="creer-org" class="mx-auto mt-8 max-w-[1400px]">
      <div class="rounded-[2.5rem] border border-rose-300/25 bg-black/40 p-8 sm:p-10 backdrop-blur shadow-[0_0_45px_rgba(251,113,133,0.18)]">
        <h2 class="font-pricedown text-5xl text-center mb-3 bg-gradient-to-r from-rose-300 to-white bg-clip-text text-transparent">Créer votre organisation</h2>
        <p class="mx-auto mb-10 max-w-2xl text-center text-slate-400">Trois conditions pour fonder votre organisation criminelle et intégrer le RP illégal sur Rise FA.</p>

        <div class="grid gap-5 md:grid-cols-3">
          <article class="group rounded-2xl border border-white/10 bg-black/45 p-6 backdrop-blur transition duration-300 hover:border-rose-400/40 hover:bg-black/60 hover:shadow-[0_0_28px_rgba(251,113,133,0.12)]">
            <div class="mb-4 flex items-center gap-3">
              <span class="flex h-9 w-9 items-center justify-center rounded-lg border border-rose-400/30 bg-rose-500/10 font-pricedown text-lg text-rose-300">01</span>
              <div class="h-px flex-1 bg-gradient-to-r from-rose-400/40 to-transparent"></div>
            </div>
            <h3 class="font-pricedown text-2xl text-rose-100">Dossier d'organisation</h3>
            <p class="mt-3 text-slate-300 leading-relaxed">Concept, objectifs, territoire, finances, effectif, tenue, véhicules, alliances et rivalités.</p>
          </article>

          <article class="group rounded-2xl border border-white/10 bg-black/45 p-6 backdrop-blur transition duration-300 hover:border-rose-400/40 hover:bg-black/60 hover:shadow-[0_0_28px_rgba(251,113,133,0.12)]">
            <div class="mb-4 flex items-center gap-3">
              <span class="flex h-9 w-9 items-center justify-center rounded-lg border border-rose-400/30 bg-rose-500/10 font-pricedown text-lg text-rose-300">02</span>
              <div class="h-px flex-1 bg-gradient-to-r from-rose-400/40 to-transparent"></div>
            </div>
            <h3 class="font-pricedown text-2xl text-rose-100">Trame RP & règles</h3>
            <p class="mt-3 text-slate-300 leading-relaxed">Respect strict des règles illégales : powergaming, fearRP, armes, otages, escalades, etc.</p>
          </article>

          <article class="group rounded-2xl border border-white/10 bg-black/45 p-6 backdrop-blur transition duration-300 hover:border-rose-400/40 hover:bg-black/60 hover:shadow-[0_0_28px_rgba(251,113,133,0.12)]">
            <div class="mb-4 flex items-center gap-3">
              <span class="flex h-9 w-9 items-center justify-center rounded-lg border border-rose-400/30 bg-rose-500/10 font-pricedown text-lg text-rose-300">03</span>
              <div class="h-px flex-1 bg-gradient-to-r from-rose-400/40 to-transparent"></div>
            </div>
            <h3 class="font-pricedown text-2xl text-rose-100">Équipe & hiérarchie</h3>
            <p class="mt-3 text-slate-300 leading-relaxed">Leadership clair, rôles définis, plan de recrutement et progression interne.</p>
          </article>
        </div>

        <div class="mt-10 text-center">
          <a href="https://discord.gg/deposer-dossier" target="_blank" class="inline-flex items-center justify-center rounded-xl border border-rose-400/40 bg-rose-500/20 px-10 py-3.5 text-base font-semibold text-rose-50 shadow-[0_0_24px_rgba(251,113,133,0.2)] transition hover:bg-rose-500/30 hover:border-rose-300/60 hover:scale-[1.02]">
            Déposer le dossier
          </a>
        </div>
      </div>
    </section>

</main>
@endsection
