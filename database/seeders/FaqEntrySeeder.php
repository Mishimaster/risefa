<?php

namespace Database\Seeders;

use App\Models\FaqEntry;
use Illuminate\Database\Seeder;

class FaqEntrySeeder extends Seeder
{
    public function run(): void
    {
        $entries = [
            // --- Rejoindre / connexion (plusieurs formulations) ---
            [
                'question' => 'Comment rejoindre le serveur Rise FA ?',
                'answer' => 'Rejoins le Discord principal Rise FA, puis suis le guide de whitelist. Une fois accepté, connecte-toi via FiveM avec l\'IP du serveur.',
                'category' => 'general',
                'sort_order' => 10,
            ],
            [
                'question' => 'Comment se connecter au serveur FiveM ?',
                'answer' => 'Ouvre FiveM, colle l\'IP du serveur (bouton « Copier l\'IP » sur le site) dans la console F8, ou cherche Rise FA dans la liste des serveurs après ta whitelist.',
                'category' => 'technique',
                'sort_order' => 11,
            ],
            [
                'question' => 'Comment faire la whitelist ?',
                'answer' => 'Rejoins le Discord principal et suis le channel / guide dédié à la whitelist. Sans whitelist validée, tu ne pourras pas jouer sur Rise FA.',
                'category' => 'general',
                'sort_order' => 12,
            ],

            // --- Technique / prérequis ---
            [
                'question' => 'Quels prérequis pour jouer sur Rise ?',
                'answer' => 'Il te faut GTA V original (Steam, Epic ou Rockstar), FiveM à jour, un micro recommandé et une connexion internet stable.',
                'category' => 'technique',
                'sort_order' => 20,
            ],
            [
                'question' => 'Faut-il GTA V et FiveM pour jouer ?',
                'answer' => 'Oui : GTA V légal + le client FiveM installé et à jour. Sans ça, impossible de rejoindre le serveur.',
                'category' => 'technique',
                'sort_order' => 21,
            ],
            [
                'question' => 'Le serveur lag ou crash, que faire ?',
                'answer' => 'Vérifie ta connexion, mets FiveM et tes drivers à jour, ferme les apps en arrière-plan. Si le problème continue, signale-le au staff sur Discord avec un screenshot.',
                'category' => 'technique',
                'sort_order' => 22,
            ],

            // --- RP / gameplay ---
            [
                'question' => 'Le serveur est-il sérieux RP ?',
                'answer' => 'Oui. Rise FA mise sur l\'immersion, le respect des scènes et un roleplay cohérent. Le free loot / le non-RP sont sanctionnés.',
                'category' => 'gameplay',
                'sort_order' => 30,
            ],
            [
                'question' => 'Quelles sont les règles du serveur ?',
                'answer' => 'Les règles générales, légales et illégales sont disponibles depuis la page d\'accueil (section Règles). Lis-les avant de jouer.',
                'category' => 'gameplay',
                'sort_order' => 31,
            ],
            [
                'question' => 'Y a-t-il un âge minimum pour jouer ?',
                'answer' => 'Oui, le serveur s\'adresse à un public mature. Vérifie les conditions indiquées sur le Discord / dans le règlement whitelist.',
                'category' => 'general',
                'sort_order' => 32,
            ],

            // --- Métiers / orgs ---
            [
                'question' => 'Y a-t-il des métiers légaux et illégaux ?',
                'answer' => 'Oui. Les métiers légaux (LSPD, EMS, entreprises…) et les organisations criminelles sont listés dans le menu « En jeu » du site.',
                'category' => 'gameplay',
                'sort_order' => 40,
            ],
            [
                'question' => 'Comment rejoindre la police ou les EMS ?',
                'answer' => 'Va sur la page Métiers légaux du site, clique sur LSPD ou EMS pour rejoindre leur Discord, puis suis leur procédure de recrutement.',
                'category' => 'gameplay',
                'sort_order' => 41,
            ],
            [
                'question' => 'Comment rejoindre un gang ou une organisation ?',
                'answer' => 'Consulte la page Organisations criminelles, choisis une organisation et rejoins son Discord via la carte. Chaque groupe a ses propres conditions.',
                'category' => 'gameplay',
                'sort_order' => 42,
            ],
            [
                'question' => 'Comment créer mon entreprise ou mon organisation ?',
                'answer' => 'Sur les pages Métiers légaux ou Organisations criminelles, utilise le bouton « Déposer le dossier » et suis les conditions indiquées (dossier, capital / hiérarchie, expérience RP).',
                'category' => 'gameplay',
                'sort_order' => 43,
            ],

            // --- Site / compte / boutique ---
            [
                'question' => 'Comment se connecter au site web ?',
                'answer' => 'Connecte-toi en jeu sur Rise FA, puis utilise le bouton boutique / site (ou la commande /site) pour ouvrir le navigateur déjà connecté à ton personnage.',
                'category' => 'general',
                'sort_order' => 50,
            ],
            [
                'question' => 'Comment acheter sur la boutique ?',
                'answer' => 'Connecte-toi depuis le jeu via le site, va dans Boutique, choisis un pack et paie via Tebex. Tu dois être considéré en ligne pour valider un achat.',
                'category' => 'general',
                'sort_order' => 51,
            ],
            [
                'question' => 'Où voir mon argent RP et mon compte ?',
                'answer' => 'Une fois connecté depuis le jeu, ouvre la page Compte : tu y vois ton personnage, ton métier et ton wallet (liquide / banque).',
                'category' => 'general',
                'sort_order' => 52,
            ],

            // --- Discord / staff ---
            [
                'question' => 'Où trouver le Discord Rise FA ?',
                'answer' => 'Le Discord principal est accessible depuis la page d\'accueil (section Discord). Les Discords métiers / organisations sont sur leurs pages dédiées.',
                'category' => 'general',
                'sort_order' => 60,
            ],
            [
                'question' => 'Comment contacter le staff ?',
                'answer' => 'Passe par le Discord principal (tickets / salon staff selon l\'organisation du serveur). Évite le MP aléatoire hors procédure.',
                'category' => 'general',
                'sort_order' => 61,
            ],
        ];

        foreach ($entries as $entry) {
            FaqEntry::query()->updateOrCreate(
                ['question' => $entry['question']],
                [
                    'answer' => $entry['answer'],
                    'category' => $entry['category'],
                    'sort_order' => $entry['sort_order'],
                    'is_active' => true,
                ],
            );
        }
    }
}
