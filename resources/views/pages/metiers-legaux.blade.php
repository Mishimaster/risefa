@extends('layouts.rise')

@section('content')
<main class="flex-1 w-full px-6 pt-36 pb-16">

    <section class="mx-auto max-w-[1400px]">
      <div class="pointer-events-none absolute left-[12%] top-[45%] h-64 w-64 rounded-full bg-emerald-300/15 blur-[85px] smoke"></div>
      <div class="w-full rounded-[2.5rem] border border-emerald-300/20 bg-black/40 p-8 sm:p-10 backdrop-blur shadow-[0_0_50px_rgba(16,185,129,0.2)]">
        <h1 class="font-pricedown text-5xl sm:text-6xl md:text-7xl bg-gradient-to-r from-emerald-300 to-white bg-clip-text text-transparent">Métiers</h1>
        <p class="mt-3 text-lg sm:text-xl text-slate-300 text-center rounded-xl border border-emerald-300/30 bg-emerald-400/10 p-4"><strong class="text-white">Pour rejoindre le Discord d'un métier légal</strong>, cliquez sur la carte du métier qui vous intéresse ci-dessous.</p>
      </div>
    </section>

    <section class="mx-auto mt-8 max-w-[1400px] grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @forelse ($jobs as $job)
        <a href="{{ $job->discord_url ?: '#' }}" @if ($job->discord_url) target="_blank" rel="noopener" @endif class="rounded-2xl border border-emerald-300/20 bg-black/40 p-6 backdrop-blur text-center hover:scale-[1.02] hover:border-emerald-300 transition">
          <img src="{{ $job->imageUrl() }}" alt="{{ $job->name }}" class="mx-auto mb-4 h-28 w-auto object-contain" />
          <h2 class="font-pricedown text-3xl text-emerald-300">{{ $job->name }}</h2>
          <p class="mt-2 text-slate-300">{{ $job->description }}</p>
        </a>
      @empty
        <p class="col-span-full rounded-2xl border border-white/10 bg-black/40 p-8 text-center text-slate-400">Aucun métier n'est publié pour le moment.</p>
      @endforelse
    </section>

    <section id="creer-groupe" class="mx-auto mt-10 max-w-[1400px]">
      <div class="rounded-[2.5rem] border border-emerald-300/25 bg-black/40 p-8 sm:p-10 backdrop-blur shadow-[0_0_45px_rgba(16,185,129,0.18)]">
        <h2 class="font-pricedown text-5xl text-center mb-3 bg-gradient-to-r from-emerald-300 to-white bg-clip-text text-transparent">Créer votre entreprise</h2>
        <p class="mx-auto mb-10 max-w-2xl text-center text-slate-400">Trois conditions pour ouvrir votre activité légale sur Rise FA et rejoindre l'économie du serveur.</p>

        <div class="grid gap-5 md:grid-cols-3">
          <article class="group rounded-2xl border border-white/10 bg-black/45 p-6 backdrop-blur transition duration-300 hover:border-emerald-400/40 hover:bg-black/60 hover:shadow-[0_0_28px_rgba(16,185,129,0.12)]">
            <div class="mb-4 flex items-center gap-3">
              <span class="flex h-9 w-9 items-center justify-center rounded-lg border border-emerald-400/30 bg-emerald-500/10 font-pricedown text-lg text-emerald-300">01</span>
              <div class="h-px flex-1 bg-gradient-to-r from-emerald-400/40 to-transparent"></div>
            </div>
            <h3 class="font-pricedown text-2xl text-emerald-100">Dossier complet</h3>
            <p class="mt-3 text-slate-300 leading-relaxed">Business plan détaillé : concept, emplacement, tarifs, objectifs et organisation de votre équipe.</p>
          </article>

          <article class="group rounded-2xl border border-white/10 bg-black/45 p-6 backdrop-blur transition duration-300 hover:border-emerald-400/40 hover:bg-black/60 hover:shadow-[0_0_28px_rgba(16,185,129,0.12)]">
            <div class="mb-4 flex items-center gap-3">
              <span class="flex h-9 w-9 items-center justify-center rounded-lg border border-emerald-400/30 bg-emerald-500/10 font-pricedown text-lg text-emerald-300">02</span>
              <div class="h-px flex-1 bg-gradient-to-r from-emerald-400/40 to-transparent"></div>
            </div>
            <h3 class="font-pricedown text-2xl text-emerald-100">Capital requis</h3>
            <p class="mt-3 text-slate-300 leading-relaxed">Un capital initial est nécessaire pour lancer l'activité — le montant varie selon le type d'entreprise.</p>
          </article>

          <article class="group rounded-2xl border border-white/10 bg-black/45 p-6 backdrop-blur transition duration-300 hover:border-emerald-400/40 hover:bg-black/60 hover:shadow-[0_0_28px_rgba(16,185,129,0.12)]">
            <div class="mb-4 flex items-center gap-3">
              <span class="flex h-9 w-9 items-center justify-center rounded-lg border border-emerald-400/30 bg-emerald-500/10 font-pricedown text-lg text-emerald-300">03</span>
              <div class="h-px flex-1 bg-gradient-to-r from-emerald-400/40 to-transparent"></div>
            </div>
            <h3 class="font-pricedown text-2xl text-emerald-100">Expérience RP</h3>
            <p class="mt-3 text-slate-300 leading-relaxed">Une implication RP cohérente et sérieuse est attendue pour une bonne intégration sur le serveur.</p>
          </article>
        </div>

        <div class="mt-10 text-center">
          <a href="https://discord.gg/yG2dkSvCuS" target="_blank" class="inline-flex items-center justify-center rounded-xl border border-emerald-400/40 bg-emerald-500/20 px-10 py-3.5 text-base font-semibold text-emerald-50 shadow-[0_0_24px_rgba(16,185,129,0.2)] transition hover:bg-emerald-500/30 hover:border-emerald-300/60 hover:scale-[1.02]">
            Déposer le dossier
          </a>
        </div>
      </div>
    </section>

</main>
@endsection
