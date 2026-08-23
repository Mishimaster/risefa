@extends('layouts.rise')

@section('content')
<main class="flex-1 w-full px-6 pt-36 pb-16">

    <section class="mx-auto max-w-[1400px]">
      <div class="pointer-events-none absolute left-[12%] top-[44%] h-64 w-64 rounded-full bg-purple-300/15 blur-[85px] smoke"></div>
      <div class="pointer-events-none absolute left-[20%] top-[46%] h-72 w-72 rounded-full bg-fuchsia-300/15 blur-[95px] smoke [animation-delay:2s]"></div>
      <div class="w-full rounded-[2.5rem] border border-purple-300/20 bg-black/40 p-8 sm:p-10 backdrop-blur shadow-[0_0_50px_rgba(168,85,247,0.2)]">
        <h1 class="font-pricedown text-5xl sm:text-6xl md:text-7xl bg-gradient-to-r from-purple-300 to-white bg-clip-text text-transparent">FAQ</h1>
        <p class="mt-3 text-lg sm:text-xl text-slate-300">Questions fréquentes - Trouvez toutes les réponses à vos questions.</p>
      </div>
    </section>

    <section class="mx-auto mt-6 max-w-[1400px]">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
        <button data-filter="all" class="faq-filter rounded-2xl border border-purple-300/30 bg-purple-400/20 px-4 py-3 text-base font-semibold">Toutes</button>
        <button data-filter="general" class="faq-filter rounded-2xl border border-white/15 bg-white/5 px-4 py-3 text-base font-semibold text-white/80 hover:bg-white/10">Général</button>
        <button data-filter="technique" class="faq-filter rounded-2xl border border-white/15 bg-white/5 px-4 py-3 text-base font-semibold text-white/80 hover:bg-white/10">Technique</button>
        <button data-filter="gameplay" class="faq-filter rounded-2xl border border-white/15 bg-white/5 px-4 py-3 text-base font-semibold text-white/80 hover:bg-white/10">Gameplay</button>
      </div>
    </section>

    <section class="mx-auto mt-6 max-w-[1400px] space-y-4" id="faq-list">
      <details class="faq-item rounded-2xl border border-purple-300/20 bg-black/40 backdrop-blur p-5" data-category="general">
        <summary class="cursor-pointer font-semibold text-lg">Comment rejoindre le serveur ?</summary>
        <p class="mt-3 text-slate-300">Rejoignez le Discord principal puis suivez le guide de whitelist.</p>
      </details>
      <details class="faq-item rounded-2xl border border-purple-300/20 bg-black/40 backdrop-blur p-5" data-category="technique">
        <summary class="cursor-pointer font-semibold text-lg">Quels prérequis techniques ?</summary>
        <p class="mt-3 text-slate-300">FiveM à jour, GTA V original, micro recommandé et connexion stable.</p>
      </details>
      <details class="faq-item rounded-2xl border border-purple-300/20 bg-black/40 backdrop-blur p-5" data-category="gameplay">
        <summary class="cursor-pointer font-semibold text-lg">Le serveur est-il sérieux RP ?</summary>
        <p class="mt-3 text-slate-300">Oui, priorité à l'immersion, au respect des scènes et à la cohérence RP.</p>
      </details>
      <details class="faq-item rounded-2xl border border-purple-300/20 bg-black/40 backdrop-blur p-5" data-category="general">
        <summary class="cursor-pointer font-semibold text-lg">Y a-t-il des métiers légaux et illégaux ?</summary>
        <p class="mt-3 text-slate-300">Oui, consultez les pages dédiées depuis le menu En jeu.</p>
      </details>
    </section>
  
</main>
@endsection

@push('scripts')
<script>
  const filters = document.querySelectorAll(".faq-filter");
  const items = document.querySelectorAll(".faq-item");
  const activeClasses = ["border-purple-300/30", "bg-purple-400/20", "text-white"];
  const inactiveClasses = ["border-white/15", "bg-white/5", "text-white/80"];

  filters.forEach((btn) => {
    btn.addEventListener("click", () => {
      filters.forEach((b) => {
        b.classList.remove(...activeClasses);
        b.classList.add(...inactiveClasses);
      });
      btn.classList.remove(...inactiveClasses);
      btn.classList.add(...activeClasses);

      const category = btn.dataset.filter;
      items.forEach((item) => {
        const show = category === "all" || item.dataset.category === category;
        item.classList.toggle("hidden", !show);
      });
    });
  });
</script>
@endpush
