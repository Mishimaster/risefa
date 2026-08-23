@extends('layouts.rise')

@section('content')
<main class="flex-1 w-full">

    <section class="relative min-h-screen px-6 pt-32 pb-14 flex items-center">
      <div class="mx-auto w-full max-w-[1400px]">
        <div class="rounded-[3rem] border border-white/15 bg-black/40 p-10 sm:p-14 md:p-16 min-h-[460px] md:min-h-[520px] flex flex-col justify-center backdrop-blur shadow-[0_0_55px_rgba(51,153,255,0.18)]">
          <div class="inline-flex items-center gap-3 text-lg sm:text-2xl tracking-widest text-white/80 font-semibold">
            <span class="h-2 w-2 rounded-full bg-cyan-400"></span>
            GTA RP • Los Santos • Roleplay immersif
          </div>
          <h1 class="mt-5 font-pricedown text-[4.6rem] sm:text-[6.2rem] md:text-[8.8rem] leading-[0.88] text-white drop-shadow-[0_0_24px_rgba(51,153,255,0.45)]">Rise</h1>
          <p class="mt-5 max-w-3xl text-xl sm:text-3xl md:text-[2.45rem] text-slate-200">Vivez une expérience roleplay immersive et unique à Los Santos</p>
        </div>
      </div>
    </section>

    <section id="features" class="reveal px-6 py-20">
      <div class="mx-auto max-w-[1400px]">
        <h2 class="font-pricedown text-5xl text-center mb-10 bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">Pourquoi Rise ?</h2>
        <div class="rounded-3xl border border-white/15 bg-black/40 p-8 sm:p-10 backdrop-blur">
          <h3 class="text-3xl font-pricedown text-white mb-5">🔥Tu recherches un serveur GTA RP innovant, sérieux et immersif ?</h3>
          <div class="space-y-4 text-slate-300 text-lg leading-relaxed">
            <h4 class="text-cyan-200 font-bold">🚀Rise est fait pour toi !</h4>
            <p>🦹Notre équipe de 6 passionnés travail sans relâche pour créer un univers RP réaliste et captivant. Nous voulons offrir aux joueurs une expérience unique, où chaque choix compte et où l'histoire de ton personnage évolue selon tes actions.</p>
            <h4 class="text-cyan-200 font-bold">🎯Ce que nous proposons :</h4>
            <p>🌍Un monde ouvert riche et immersif. Une ville vivante avec des quartiers dynamiques et une véritable hiérarchie sociale.</p>
            <p>🏢Des opportunités de carrière variées. Deviens policier, médecin, avocat, entrepreneur, criminel ou même maire de la ville !</p>
            <p>🚗Un système économique réaliste. Gère ton business, investis, et fais fortune ou tombe dans l'illégalité.</p>
            <p>🔫Des interactions et actions poussées. Système de drogues, braquages, gestion de gangs, forces de l'ordre bien organisées.</p>
            <p>⚒️Un staff actif et à l'écoute. Nous sommes là pour assurer une expérience RP fluide et équilibrée.</p>
            <p>👥Une communauté soudée et respectueuse. Ici, le fair-play et le RP de qualité sont au centre de tout.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="Discord" class="reveal px-6 py-20">
      <div class="mx-auto max-w-[1400px]">
        <h2 class="font-pricedown text-5xl text-center mb-10 bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">Discord</h2>
        <div class="grid gap-8 md:grid-cols-3">
          <a href="https://discord.gg/dS8XJqWPd3" target="_blank" class="rounded-3xl border border-white/15 bg-black/40 backdrop-blur p-8 text-center origin-center hover:scale-[1.03] hover:border-2 hover:border-[#5865F2] transition-all duration-300">
            <div class="mb-5 flex h-16 items-center justify-center">
              <svg viewBox="0 0 24 24" aria-label="Discord bleu" role="img" class="h-14 w-14 text-[#5865F2]">
                <path fill="currentColor" d="M20.317 4.369a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.211.375-.444.864-.608 1.249a18.27 18.27 0 0 0-5.487 0a12.3 12.3 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037a19.736 19.736 0 0 0-4.885 1.516a.07.07 0 0 0-.032.027C.533 9.045-.32 13.58.099 18.061a.082.082 0 0 0 .031.056a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.027c.461-.63.873-1.295 1.226-1.994a.076.076 0 0 0-.041-.103a13.097 13.097 0 0 1-1.872-.892a.077.077 0 0 1-.008-.127c.125-.094.25-.192.37-.291a.074.074 0 0 1 .077-.01c3.928 1.81 8.18 1.81 12.062 0a.074.074 0 0 1 .078.009c.12.099.245.198.37.292a.077.077 0 0 1-.007.127c-.579.337-1.21.642-1.873.891a.076.076 0 0 0-.04.104c.36.698.772 1.362 1.225 1.993a.078.078 0 0 0 .084.028a19.876 19.876 0 0 0 5.994-3.03a.078.078 0 0 0 .031-.055c.5-5.177-.838-9.673-3.549-13.666a.061.061 0 0 0-.032-.028zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.42c0-1.334.956-2.419 2.157-2.419c1.21 0 2.175 1.095 2.157 2.419c0 1.335-.956 2.42-2.157 2.42zm7.974 0c-1.183 0-2.157-1.085-2.157-2.42c0-1.334.955-2.419 2.157-2.419c1.21 0 2.175 1.095 2.157 2.419c0 1.335-.947 2.42-2.157 2.42z"/>
              </svg>
            </div>
            <h3 class="font-pricedown text-3xl mb-3">Principal</h3>
            <p class="text-slate-300">Rejoignez le Discord principal pour rester informé, participer à la vie du serveur et ne manquer aucune annonce.</p>
          </a>
          <a href="{{ route('metiers-legaux') }}" class="rounded-3xl border border-white/15 bg-black/40 backdrop-blur p-8 text-center origin-center hover:scale-[1.03] hover:border-2 hover:border-[#22c55e] transition-all duration-300">
            <div class="mb-5 flex h-16 items-center justify-center">
              <svg viewBox="0 0 24 24" aria-label="Discord vert" role="img" class="h-14 w-14 text-[#22c55e]">
                <path fill="currentColor" d="M20.317 4.369a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.211.375-.444.864-.608 1.249a18.27 18.27 0 0 0-5.487 0a12.3 12.3 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037a19.736 19.736 0 0 0-4.885 1.516a.07.07 0 0 0-.032.027C.533 9.045-.32 13.58.099 18.061a.082.082 0 0 0 .031.056a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.027c.461-.63.873-1.295 1.226-1.994a.076.076 0 0 0-.041-.103a13.097 13.097 0 0 1-1.872-.892a.077.077 0 0 1-.008-.127c.125-.094.25-.192.37-.291a.074.074 0 0 1 .077-.01c3.928 1.81 8.18 1.81 12.062 0a.074.074 0 0 1 .078.009c.12.099.245.198.37.292a.077.077 0 0 1-.007.127c-.579.337-1.21.642-1.873.891a.076.076 0 0 0-.04.104c.36.698.772 1.362 1.225 1.993a.078.078 0 0 0 .084.028a19.876 19.876 0 0 0 5.994-3.03a.078.078 0 0 0 .031-.055c.5-5.177-.838-9.673-3.549-13.666a.061.061 0 0 0-.032-.028zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.42c0-1.334.956-2.419 2.157-2.419c1.21 0 2.175 1.095 2.157 2.419c0 1.335-.956 2.42-2.157 2.42zm7.974 0c-1.183 0-2.157-1.085-2.157-2.42c0-1.334.955-2.419 2.157-2.419c1.21 0 2.175 1.095 2.157 2.419c0 1.335-.947 2.42-2.157 2.42z"/>
              </svg>
            </div>
            <h3 class="font-pricedown text-3xl mb-3 text-riseCyan">Légal</h3>
            <p class="text-slate-300">Accédez à la liste de tous les Discord officiels pour découvrir et consulter la présentation de chaque entreprise.</p>
          </a>
          <a href="{{ route('organisations-criminelles') }}" class="rounded-3xl border border-white/15 bg-black/40 backdrop-blur p-8 text-center origin-center hover:scale-[1.03] hover:border-2 hover:border-[#ef4444] transition-all duration-300">
            <div class="mb-5 flex h-16 items-center justify-center">
              <svg viewBox="0 0 24 24" aria-label="Discord rouge" role="img" class="h-14 w-14 text-[#ef4444]">
                <path fill="currentColor" d="M20.317 4.369a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.211.375-.444.864-.608 1.249a18.27 18.27 0 0 0-5.487 0a12.3 12.3 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037a19.736 19.736 0 0 0-4.885 1.516a.07.07 0 0 0-.032.027C.533 9.045-.32 13.58.099 18.061a.082.082 0 0 0 .031.056a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.027c.461-.63.873-1.295 1.226-1.994a.076.076 0 0 0-.041-.103a13.097 13.097 0 0 1-1.872-.892a.077.077 0 0 1-.008-.127c.125-.094.25-.192.37-.291a.074.074 0 0 1 .077-.01c3.928 1.81 8.18 1.81 12.062 0a.074.074 0 0 1 .078.009c.12.099.245.198.37.292a.077.077 0 0 1-.007.127c-.579.337-1.21.642-1.873.891a.076.076 0 0 0-.04.104c.36.698.772 1.362 1.225 1.993a.078.078 0 0 0 .084.028a19.876 19.876 0 0 0 5.994-3.03a.078.078 0 0 0 .031-.055c.5-5.177-.838-9.673-3.549-13.666a.061.061 0 0 0-.032-.028zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.42c0-1.334.956-2.419 2.157-2.419c1.21 0 2.175 1.095 2.157 2.419c0 1.335-.956 2.42-2.157 2.42zm7.974 0c-1.183 0-2.157-1.085-2.157-2.42c0-1.334.955-2.419 2.157-2.419c1.21 0 2.175 1.095 2.157 2.419c0 1.335-.947 2.42-2.157 2.42z"/>
              </svg>
            </div>
            <h3 class="font-pricedown text-3xl mb-3 text-riseRose">Illégal</h3>
            <p class="text-slate-300">Accédez à la liste de tous les Discord officiels pour découvrir et consulter les organisations criminelles.</p>
          </a>
        </div>
      </div>
    </section>

    <section id="regles" class="reveal px-6 py-20">
      <div class="mx-auto max-w-[1400px]">
        <h2 class="font-pricedown text-5xl text-center mb-10 bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">Règles du serveur</h2>
        <div class="grid gap-8 md:grid-cols-3">
          <a href="https://docs.google.com/document/d/1WnLW0XmfFpyMMH4nV_Vj25cpkmhkNtXLwZY_D4cstR4/edit?usp=sharing" target="_blank" class="group relative overflow-hidden rounded-3xl border border-white/15 bg-black/40 min-h-[340px] origin-center hover:scale-[1.03] hover:border-2 hover:border-cyan-300 transition-all duration-300">
            <img src="{{ asset('images/logorisefa.png') }}" alt="Règles générales" class="absolute inset-0 h-full w-full object-cover opacity-80 group-hover:scale-105 transition duration-500" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-black/15"></div>
            <div class="relative z-10 flex h-full flex-col justify-end p-7 text-center">
              <h3 class="font-pricedown text-3xl mb-2 text-white drop-shadow">Générales</h3>
              <p class="text-slate-200">Les règles de base du serveur à respecter par tous les joueurs</p>
            </div>
          </a>
          <a href="https://docs.google.com/document/d/1FO2Z9yD_r13P6si73UbiNMbCsoXDKeHlrXueSy7fDtc/edit?usp=sharing" target="_blank" class="group relative overflow-hidden rounded-3xl border border-white/15 bg-black/40 min-h-[340px] origin-center hover:scale-[1.03] hover:border-2 hover:border-emerald-300 transition-all duration-300">
            <img src="{{ asset('images/logodiscordlegal.png') }}" alt="Règles légales" class="absolute inset-0 h-full w-full object-cover opacity-80 group-hover:scale-105 transition duration-500" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-black/15"></div>
            <div class="relative z-10 flex h-full flex-col justify-end p-7 text-center">
              <h3 class="font-pricedown text-3xl mb-2 text-white drop-shadow">Légales</h3>
              <p class="text-slate-200">Les règles pour les métiers légaux : police, EMS, justice, etc.</p>
            </div>
          </a>
          <a href="https://docs.google.com/document/d/1t4_gLV1_5zQSKdwp5zQ4S48TYTXlncU3A-WyYoiRod4/edit?usp=sharing" target="_blank" class="group relative overflow-hidden rounded-3xl border border-white/15 bg-black/40 min-h-[340px] origin-center hover:scale-[1.03] hover:border-2 hover:border-rose-300 transition-all duration-300">
            <img src="{{ asset('images/logodiscordillegal.png') }}" alt="Règles illégales" class="absolute inset-0 h-full w-full object-cover opacity-80 group-hover:scale-105 transition duration-500" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-black/15"></div>
            <div class="relative z-10 flex h-full flex-col justify-end p-7 text-center">
              <h3 class="font-pricedown text-3xl mb-2 text-white drop-shadow">Illégales</h3>
              <p class="text-slate-200">Les règles pour les activités criminelles et organisations</p>
            </div>
          </a>
        </div>
      </div>
    </section>

    <section class="reveal px-6 py-20">
      <div class="mx-auto max-w-[1400px]">
        <h2 class="font-pricedown text-5xl text-center mb-10 bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">Système économique réaliste</h2>
        <div class="mx-auto max-w-4xl rounded-3xl border border-white/15 bg-black/40 p-10 backdrop-blur text-center">
          <div class="text-6xl mb-4">💰</div>
          <p class="text-slate-300 text-lg leading-relaxed">
            Notre économie est soigneusement équilibrée pour offrir une progression naturelle et gratifiante.
            Commencez avec des petits boulots, épargnez, investissez et développez votre empire. Chaque dollar compte
            et chaque décision a son importance. Les prix sont ajustés régulièrement pour maintenir un équilibre parfait
            entre les différentes activités légales et illégales.
          </p>
        </div>
      </div>
    </section>

    <section id="rejoindre" class="reveal px-6 py-20">
      <div class="mx-auto max-w-[1400px]">
        <h2 class="font-pricedown text-5xl text-center mb-10 bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">Prêt à commencer ?</h2>
        <div class="mx-auto max-w-3xl rounded-3xl border border-white/15 bg-black/40 p-10 backdrop-blur text-center">
          <h3 class="font-pricedown text-3xl mb-4">Connectez-vous et commencez votre histoire !</h3>
          <p class="text-slate-300">Cliquez sur le bouton ci-dessous pour copier l'IP, puis collez-la dans la console FiveM.</p>
          <button id="server-ip" data-connect="{{ config('rise.server.connect') }}" class="mt-4 inline-flex items-center gap-2 rounded-xl border-2 border-cyan-300/70 bg-cyan-300/15 px-6 py-3 text-cyan-100 text-lg font-bold shadow-[0_0_20px_rgba(103,232,249,0.2)] hover:scale-[1.03] hover:bg-cyan-300/25 hover:border-cyan-200 hover:shadow-[0_0_30px_rgba(103,232,249,0.35)] transition-all duration-200">
            📋 Copier l'IP : {{ config('rise.server.connect') }}
          </button>
        </div>
      </div>
    </section>

    <section class="reveal px-6 py-16 border-t border-white/15 bg-white/5">
      <div class="mx-auto max-w-[1400px] grid gap-8 md:grid-cols-3 text-center">
        <div><h2 class="font-pricedown text-6xl bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">{{ config('rise.server.slots') }}</h2><p class="mt-2 text-slate-300 uppercase tracking-widest text-xs">Slots disponibles</p></div>
        <div><h2 class="font-pricedown text-6xl bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">24/7</h2><p class="mt-2 text-slate-300 uppercase tracking-widest text-xs">Support en ligne</p></div>
        <div><h2 class="font-pricedown text-6xl bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">100%</h2><p class="mt-2 text-slate-300 uppercase tracking-widest text-xs">Roleplay immersif</p></div>
      </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
  document.getElementById("server-ip")?.addEventListener("click", () => {
    const val = document.getElementById("server-ip")?.dataset.connect ?? "";
    navigator.clipboard.writeText(val).then(() => {
      const el = document.getElementById("server-ip");
      if (!el) return;
      const prev = el.textContent;
      el.textContent = "Copié !";
      setTimeout(() => { el.textContent = prev; }, 1500);
    });
  });

  const reveals = document.querySelectorAll(".reveal");
  reveals.forEach((el) => {
    el.style.opacity = "0";
    el.style.transform = "translateY(28px)";
    el.style.transition = "opacity 650ms ease, transform 650ms ease";
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      entry.target.style.opacity = "1";
      entry.target.style.transform = "translateY(0)";
      observer.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: "0px 0px -80px 0px" });

  reveals.forEach((el) => observer.observe(el));
</script>
@endpush
