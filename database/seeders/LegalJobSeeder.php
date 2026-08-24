<?php

namespace Database\Seeders;

use App\Models\LegalJob;
use Illuminate\Database\Seeder;

class LegalJobSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [
            [
                'name' => 'LSPD',
                'description' => "Service de police de San Andreas. Maintenez l'ordre, effectuez des patrouilles et protégez les citoyens.",
                'image' => 'images/LSPD.png',
                'discord_url' => 'https://discord.gg/4TvdY4smkT',
                'sort_order' => 1,
            ],
            [
                'name' => 'EMS',
                'description' => 'Services médicaux d\'urgence. Sauvez des vies, soignez les blessés et gérez les situations critiques.',
                'image' => 'images/ems.png',
                'discord_url' => 'https://discord.gg/ay9RSd3cwC',
                'sort_order' => 2,
            ],
            [
                'name' => 'Vice Car Dealer',
                'description' => 'Vendez les véhicules les plus prestigieux de Los Santos. Négociations, essais routiers et service client.',
                'image' => 'images/vice-car-dealer.png',
                'discord_url' => 'https://discord.gg/HJt8AdQr',
                'sort_order' => 3,
            ],
            [
                'name' => 'Dynasty8',
                'description' => 'Agence immobilière de luxe. Vendez maisons, appartements et locaux commerciaux à travers la ville.',
                'image' => 'images/dynasty8.png',
                'discord_url' => 'https://discord.gg/4fmAHP3mGD',
                'sort_order' => 4,
            ],
            [
                'name' => 'Burger Shot',
                'description' => 'Chaîne de restauration rapide. Préparez des burgers, servez les clients et gérez votre équipe.',
                'image' => 'images/burger-shot.png',
                'discord_url' => 'https://discord.gg/hcqWr4K9zs',
                'sort_order' => 5,
            ],
            [
                'name' => 'Gouvernement',
                'description' => 'Profession juridique. Défendez vos clients au tribunal, conseillez et plaidez pour la justice.',
                'image' => 'images/gouvernement.png',
                'discord_url' => 'https://discord.gg/AMVNqXPF6V',
                'sort_order' => 6,
            ],
            [
                'name' => 'Taxi',
                'description' => 'Service de transport urbain. Conduisez les citoyens à destination avec ponctualité et professionnalisme.',
                'image' => 'images/taxi.png',
                'discord_url' => 'https://discord.gg/Jxs5U4qxnu',
                'sort_order' => 7,
            ],
            [
                'name' => 'Moore Club',
                'description' => 'Club de divertissement pour adultes. Gérez les spectacles, le bar et assurez une ambiance festive.',
                'image' => 'images/moore-club.png',
                'discord_url' => 'https://discord.gg/6SAsQ5tUR6',
                'sort_order' => 8,
            ],
            [
                'name' => "Benny's",
                'description' => 'Garage de customisation réputé. Réparez, tunez et transformez les véhicules de vos clients.',
                'image' => 'images/bennys.png',
                'discord_url' => 'https://discord.gg/CgeJDsEQkX',
                'sort_order' => 9,
            ],
            [
                'name' => 'LTD',
                'description' => 'Le LTD fournit aux habitants du quartier tout ce dont ils ont besoin au quotidien nourriture, boissons et articles essentiels.',
                'image' => 'images/LTD.webp',
                'discord_url' => 'https://discord.gg/ac58zkgM',
                'sort_order' => 10,
            ],
        ];

        foreach ($jobs as $job) {
            LegalJob::query()->updateOrCreate(
                ['name' => $job['name']],
                $job,
            );
        }
    }
}
