@extends('layouts.rise')

@section('content')
<main class="flex-1 w-full">

    <section class="relative min-h-screen px-6 pt-32 pb-14 flex items-center">
      <div class="mx-auto w-full max-w-[1400px]">
        <div class="rounded-[3rem] border border-white/15 bg-black/40 p-10 sm:p-14 md:p-16 min-h-[460px] md:min-h-[520px] flex flex-col justify-center backdrop-blur shadow-[0_0_55px_rgba(51,153,255,0.18)]">
          <p class="sr-only">Serveur GTA RP Los Santos — roleplay immersif FiveM</p>
          <h1 class="font-pricedown text-[6rem] sm:text-[8rem] md:text-[11rem] leading-[0.85] text-white drop-shadow-[0_0_24px_rgba(51,153,255,0.45)]">Rise</h1>
          <p class="mt-12 sm:mt-14 md:mt-16 max-w-3xl text-xl sm:text-3xl md:text-[2.45rem] text-slate-200">Vivez une expérience roleplay immersive et unique à Los Santos</p>
        </div>
      </div>
    </section>

    <section id="features" class="reveal px-6 py-20">
      <div class="mx-auto max-w-[1400px]">
        <h2 class="font-pricedown text-5xl text-center mb-4 bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">Pourquoi Rise ?</h2>
        <p class="mx-auto mb-12 max-w-2xl text-center text-lg text-slate-400">Un serveur GTA RP pensé pour l'immersion, la progression et une communauté exigeante.</p>

        <div class="mb-12 rounded-3xl border border-cyan-300/20 bg-gradient-to-br from-black/50 via-black/40 to-cyan-950/20 p-8 sm:p-10 backdrop-blur shadow-[0_0_40px_rgba(51,153,255,0.08)]">
          <p class="text-xl sm:text-2xl font-semibold text-white leading-snug">Tu recherches un serveur GTA RP innovant, sérieux et immersif ?</p>
          <p class="mt-4 text-slate-300 text-lg leading-relaxed">Rise est fait pour toi. Notre équipe de passionnés travaille sans relâche pour créer un univers RP réaliste et captivant, où chaque choix compte et où l'histoire de ton personnage évolue selon tes actions.</p>
        </div>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
          <article class="group rounded-2xl border border-white/10 bg-black/40 p-6 backdrop-blur transition duration-300 hover:border-cyan-400/35 hover:bg-black/55 hover:shadow-[0_0_28px_rgba(34,211,238,0.12)]">
            <div class="mb-4 h-1 w-10 rounded-full bg-gradient-to-r from-cyan-400 to-cyan-200/40 transition-all duration-300 group-hover:w-16"></div>
            <h3 class="font-pricedown text-2xl text-cyan-100">Monde ouvert</h3>
            <p class="mt-3 text-slate-300 leading-relaxed">Une ville vivante avec des quartiers dynamiques, une hiérarchie sociale crédible et des scènes RP qui prennent vie au fil des journées.</p>
          </article>
          <article class="group rounded-2xl border border-white/10 bg-black/40 p-6 backdrop-blur transition duration-300 hover:border-emerald-400/35 hover:bg-black/55 hover:shadow-[0_0_28px_rgba(52,211,153,0.12)]">
            <div class="mb-4 h-1 w-10 rounded-full bg-gradient-to-r from-emerald-400 to-emerald-200/40 transition-all duration-300 group-hover:w-16"></div>
            <h3 class="font-pricedown text-2xl text-emerald-100">Carrières variées</h3>
            <p class="mt-3 text-slate-300 leading-relaxed">Policier, médecin, avocat, entrepreneur, criminel ou figure publique — construis le parcours qui correspond à ton personnage.</p>
          </article>
          <article class="group rounded-2xl border border-white/10 bg-black/40 p-6 backdrop-blur transition duration-300 hover:border-amber-400/35 hover:bg-black/55 hover:shadow-[0_0_28px_rgba(251,191,36,0.12)]">
            <div class="mb-4 h-1 w-10 rounded-full bg-gradient-to-r from-amber-400 to-amber-200/40 transition-all duration-300 group-hover:w-16"></div>
            <h3 class="font-pricedown text-2xl text-amber-100">Économie vivante</h3>
            <p class="mt-3 text-slate-300 leading-relaxed">Gère ton business, investis, fais fortune ou bascule dans l'illégalité — chaque dollar et chaque décision comptent.</p>
          </article>
          <article class="group rounded-2xl border border-white/10 bg-black/40 p-6 backdrop-blur transition duration-300 hover:border-rose-400/35 hover:bg-black/55 hover:shadow-[0_0_28px_rgba(244,63,94,0.12)]">
            <div class="mb-4 h-1 w-10 rounded-full bg-gradient-to-r from-rose-400 to-rose-200/40 transition-all duration-300 group-hover:w-16"></div>
            <h3 class="font-pricedown text-2xl text-rose-100">Actions poussées</h3>
            <p class="mt-3 text-slate-300 leading-relaxed">Drogues, braquages, gangs, forces de l'ordre structurées — des systèmes pensés pour des scènes intenses et cohérentes.</p>
          </article>
          <article class="group rounded-2xl border border-white/10 bg-black/40 p-6 backdrop-blur transition duration-300 hover:border-violet-400/35 hover:bg-black/55 hover:shadow-[0_0_28px_rgba(167,139,250,0.12)]">
            <div class="mb-4 h-1 w-10 rounded-full bg-gradient-to-r from-violet-400 to-violet-200/40 transition-all duration-300 group-hover:w-16"></div>
            <h3 class="font-pricedown text-2xl text-violet-100">Staff à l'écoute</h3>
            <p class="mt-3 text-slate-300 leading-relaxed">Une équipe active pour garantir un roleplay fluide, équilibré et respectueux des règles du serveur.</p>
          </article>
          <article class="group rounded-2xl border border-white/10 bg-black/40 p-6 backdrop-blur transition duration-300 hover:border-cyan-400/35 hover:bg-black/55 hover:shadow-[0_0_28px_rgba(34,211,238,0.12)]">
            <div class="mb-4 h-1 w-10 rounded-full bg-gradient-to-r from-cyan-400 to-cyan-200/40 transition-all duration-300 group-hover:w-16"></div>
            <h3 class="font-pricedown text-2xl text-cyan-100">Communauté soudée</h3>
            <p class="mt-3 text-slate-300 leading-relaxed">Fair-play, qualité de RP et respect mutuel — le cœur de l'expérience Rise FA.</p>
          </article>
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
        <h2 class="font-pricedown text-5xl text-center mb-4 bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">Système économique réaliste</h2>
        <p class="mx-auto mb-12 max-w-2xl text-center text-lg text-slate-400">Une progression naturelle, un équilibre constant entre légal et illégal.</p>

        <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
          <div class="rounded-3xl border border-white/15 bg-black/40 p-8 sm:p-10 backdrop-blur">
            <p class="text-slate-300 text-lg leading-relaxed">
              Notre économie est soigneusement équilibrée pour offrir une progression naturelle et gratifiante.
              Commencez avec des petits boulots, épargnez, investissez et développez votre empire. Chaque dollar compte
              et chaque décision a son importance.
            </p>
            <p class="mt-5 text-slate-400 leading-relaxed">
              Les prix sont ajustés régulièrement pour maintenir un équilibre parfait entre les activités légales et illégales,
              afin que chaque parcours — honnête ou criminel — reste viable et stimulant.
            </p>
          </div>

          <div class="grid gap-4 sm:grid-cols-3 lg:grid-cols-1">
            <div class="rounded-2xl border border-cyan-400/20 bg-cyan-500/5 px-6 py-5 backdrop-blur">
              <p class="text-xs uppercase tracking-[0.2em] text-cyan-300/80">Progression</p>
              <p class="mt-2 font-pricedown text-3xl text-white">Du débutant au patron</p>
            </div>
            <div class="rounded-2xl border border-emerald-400/20 bg-emerald-500/5 px-6 py-5 backdrop-blur">
              <p class="text-xs uppercase tracking-[0.2em] text-emerald-300/80">Équilibre</p>
              <p class="mt-2 font-pricedown text-3xl text-white">Légal & illégal</p>
            </div>
            <div class="rounded-2xl border border-amber-400/20 bg-amber-500/5 px-6 py-5 backdrop-blur sm:col-span-3 lg:col-span-1">
              <p class="text-xs uppercase tracking-[0.2em] text-amber-300/80">Impact</p>
              <p class="mt-2 font-pricedown text-3xl text-white">Chaque décision</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="rejoindre" class="reveal px-6 py-20">
      <div class="mx-auto max-w-[1400px]">
        <h2 class="font-pricedown text-5xl text-center mb-10 bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">Prêt à commencer ?</h2>
        <div class="mx-auto max-w-3xl rounded-3xl border border-white/15 bg-black/40 p-10 backdrop-blur text-center">
          <h3 class="font-pricedown text-3xl mb-4">Connectez-vous et commencez votre histoire !</h3>
          <p class="text-slate-300">Cliquez sur le bouton ci-dessous pour rejoindre Rise FA directement via FiveM.</p>
          <a href="{{ config('rise.server.join_url') }}" target="_blank" rel="noopener" class="mt-4 inline-flex items-center gap-2 rounded-xl border-2 border-cyan-300/70 bg-cyan-300/15 px-6 py-3 text-cyan-100 text-lg font-bold shadow-[0_0_20px_rgba(103,232,249,0.2)] hover:scale-[1.03] hover:bg-cyan-300/25 hover:border-cyan-200 hover:shadow-[0_0_30px_rgba(103,232,249,0.35)] transition-all duration-200">
            Se connecter au serveur
          </a>
        </div>
      </div>
    </section>

    <section class="reveal px-6 py-16 border-t border-white/15 bg-white/5">
      <div class="mx-auto max-w-[1400px] grid gap-8 md:grid-cols-3 text-center">
        <div><h2 class="font-pricedown text-6xl bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">2046</h2><p class="mt-2 text-slate-300 uppercase tracking-widest text-xs">Slots disponibles</p></div>
        <div><h2 class="font-pricedown text-6xl bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">24/7</h2><p class="mt-2 text-slate-300 uppercase tracking-widest text-xs">Support en ligne</p></div>
        <div><h2 class="font-pricedown text-6xl bg-gradient-to-r from-cyan-300 to-white bg-clip-text text-transparent">100%</h2><p class="mt-2 text-slate-300 uppercase tracking-widest text-xs">Roleplay immersif</p></div>
      </div>
    </section>
  
</main>
@endsection
