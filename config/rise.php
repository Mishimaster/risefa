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

    'pages' => [
        'home' => [
            'title' => 'Rise - Accueil',
            'logo' => 'logorisefa.png',
            'logo_alt' => 'Rise FA Logo',
            'logo_glow' => 'nav-logo-glow-cyan',
            'gradient' => 'from-[#0a0a0a] via-[#12162a] to-[#0a0a0a]',
            'stars' => '',
        ],
        'faq' => [
            'title' => 'Rise - FAQ',
            'logo' => 'logofaq.png',
            'logo_alt' => 'Rise FAQ',
            'logo_glow' => 'nav-logo-glow-faq',
            'gradient' => 'from-[#0a0a0a] via-[#1a1225] to-[#0a0a0a]',
            'stars' => 'page-stars-purple',
        ],
        'shop' => [
            'title' => 'Rise - Shop',
            'logo' => 'logoshop.png',
            'logo_alt' => 'Rise Shop',
            'logo_glow' => 'nav-logo-glow-shop',
            'gradient' => 'from-[#050a0c] via-[#0a2228] to-[#050d12]',
            'stars' => 'page-stars-teal',
        ],
        'metiers-legaux' => [
            'title' => 'Rise - Métiers légaux',
            'logo' => 'logodiscordlegal.png',
            'logo_alt' => 'Rise FA Logo',
            'logo_glow' => 'nav-logo-glow-emerald',
            'gradient' => 'from-[#0a0a0a] via-[#102018] to-[#0a0a0a]',
            'stars' => 'page-stars-emerald',
        ],
        'organisations-criminelles' => [
            'title' => 'Rise - Organisations criminelles',
            'logo' => 'logodiscordillegal.png',
            'logo_alt' => 'Rise FA Logo',
            'logo_glow' => 'nav-logo-glow-rose',
            'gradient' => 'from-[#0a0a0a] via-[#241111] to-[#0a0a0a]',
            'stars' => 'page-stars-rose',
        ],
        'account' => [
            'title' => 'Rise - Mon compte',
            'logo' => 'logorisefa.png',
            'logo_alt' => 'Rise FA Logo',
            'logo_glow' => 'nav-logo-glow-cyan',
            'gradient' => 'from-[#0a0a0a] via-[#12162a] to-[#0a0a0a]',
            'stars' => '',
        ],
    ],

];
