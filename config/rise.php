<?php

return [

    'app_url' => env('APP_URL', 'https://risefa.fr'),

    'server' => [
        'name' => env('RISE_SERVER_NAME', 'risefa'),
        'connect' => env('RISE_SERVER_CONNECT', 'connect 217.182.207.101:37825'),
        'slots' => (int) env('RISE_SERVER_SLOTS', 128),
    ],

    'game_auth' => [
        'secret' => env('RISE_GAME_AUTH_SECRET'),
        'token_ttl' => (int) env('RISE_GAME_AUTH_TTL', 300),
    ],

    'tebex' => [
        'public_token' => env('TEBEX_PUBLIC_TOKEN'),
        'private_key' => env('TEBEX_PRIVATE_KEY'),
    ],

    'seo' => [
        'site_name' => 'Rise FA',
        'keywords' => 'Rise FA, risefa, serveur RP, roleplay GTA 5, GTA V RP, FiveM, serveur français, GTA RP, Los Santos RP',
        'default_description' => 'Rise FA — serveur roleplay GTA 5 sur FiveM. Rejoignez une communauté immersive, découvrez nos métiers, organisations et la boutique officielle.',
        'og_image' => 'images/logorisefa.png',
    ],

    'pages' => [
        'home' => [
            'title' => 'Rise FA | Serveur RP GTA 5 FiveM — Accueil',
            'description' => 'Serveur roleplay GTA 5 FiveM francophone. Rejoignez Rise FA : immersion, économie RP, métiers légaux, organisations et une communauté active sur Los Santos.',
            'logo' => 'logorisefa.png',
            'logo_alt' => 'Rise FA Logo',
            'logo_glow' => 'nav-logo-glow-cyan',
            'gradient' => 'from-[#0a0a0a] via-[#12162a] to-[#0a0a0a]',
            'stars' => '',
        ],
        'faq' => [
            'title' => 'FAQ | Rise FA — Serveur RP GTA 5 FiveM',
            'description' => 'Questions fréquentes sur Rise FA : règles, installation FiveM, connexion au serveur, roleplay GTA 5 et informations pour les nouveaux joueurs.',
            'logo' => 'logofaq.png',
            'logo_alt' => 'Rise FAQ',
            'logo_glow' => 'nav-logo-glow-faq',
            'gradient' => 'from-[#0a0a0a] via-[#1a1225] to-[#0a0a0a]',
            'stars' => 'page-stars-purple',
        ],
        'shop' => [
            'title' => 'Boutique | Rise FA — Serveur RP GTA 5 FiveM',
            'description' => 'Boutique officielle Rise FA. Achetez vos packs sur le serveur roleplay GTA 5 FiveM via Tebex — paiement sécurisé, livraison en jeu.',
            'logo' => 'logoshop.png',
            'logo_alt' => 'Rise Boutique',
            'logo_glow' => 'nav-logo-glow-shop',
            'gradient' => 'from-[#050a0c] via-[#0a2228] to-[#050d12]',
            'stars' => 'page-stars-teal',
        ],
        'metiers-legaux' => [
            'title' => 'Métiers légaux | Rise FA — Serveur RP GTA 5',
            'description' => 'Découvrez les métiers légaux sur Rise FA : EMS, LSPD, entreprises et jobs civils sur notre serveur roleplay GTA 5 FiveM.',
            'logo' => 'logodiscordlegal.png',
            'logo_alt' => 'Rise FA Logo',
            'logo_glow' => 'nav-logo-glow-emerald',
            'gradient' => 'from-[#0a0a0a] via-[#102018] to-[#0a0a0a]',
            'stars' => 'page-stars-emerald',
        ],
        'organisations-criminelles' => [
            'title' => 'Organisations criminelles | Rise FA — GTA 5 RP',
            'description' => 'Organisations criminelles et illégales sur Rise FA : gangs, trafics et scènes RP sur notre serveur GTA 5 FiveM francophone.',
            'logo' => 'logodiscordillegal.png',
            'logo_alt' => 'Rise FA Logo',
            'logo_glow' => 'nav-logo-glow-rose',
            'gradient' => 'from-[#0a0a0a] via-[#241111] to-[#0a0a0a]',
            'stars' => 'page-stars-rose',
        ],
        'account' => [
            'title' => 'Mon compte | Rise FA — Serveur RP GTA 5',
            'description' => 'Espace joueur Rise FA : consultez votre wallet RP, votre personnage ESX et votre session connectée au serveur roleplay GTA 5 FiveM.',
            'logo' => 'logorisefa.png',
            'logo_alt' => 'Rise FA Logo',
            'logo_glow' => 'nav-logo-glow-cyan',
            'gradient' => 'from-[#0a0a0a] via-[#12162a] to-[#0a0a0a]',
            'stars' => '',
        ],
    ],

];
