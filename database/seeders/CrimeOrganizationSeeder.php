<?php

namespace Database\Seeders;

use App\Models\CrimeCategory;
use App\Models\CrimeOrganization;
use Illuminate\Database\Seeder;

class CrimeOrganizationSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'GANG', 'slug' => 'gang', 'sort_order' => 1],
            ['name' => 'FAMILLES MAFIA', 'slug' => 'mafia', 'sort_order' => 2],
            ['name' => 'ORGANISATION', 'slug' => 'organisation', 'sort_order' => 3],
            ['name' => 'CARTELS', 'slug' => 'cartels', 'sort_order' => 4],
        ];

        foreach ($categories as $category) {
            CrimeCategory::query()->updateOrCreate(
                ['slug' => $category['slug']],
                $category,
            );
        }

        $organizations = [
            'gang' => [
                [
                    'name' => 'Ballas',
                    'description' => 'Gang de Los Santos spécialisé dans le trafic de drogue et le contrôle territorial. Rivalité historique avec les Families.',
                    'discord_url' => 'https://discord.gg/XXXballas',
                    'sort_order' => 1,
                ],
                [
                    'name' => 'F4L',
                    'description' => 'Gang de rue axé sur la loyauté familiale, le racket et la protection de leur territoire.',
                    'discord_url' => 'https://discord.gg/XXXf4l',
                    'sort_order' => 2,
                ],
                [
                    'name' => 'Los Vagos',
                    'description' => "Gang hispanique contrôlant le trafic de drogue dans l'est de Los Santos. Experts en street art et deals de rue.",
                    'discord_url' => 'https://discord.gg/XXXXlosvagos',
                    'sort_order' => 3,
                ],
                [
                    'name' => 'Marabunta',
                    'description' => 'Gang latino violent spécialisé dans les braquages, extorsions et contrôle des quartiers par la force.',
                    'discord_url' => 'https://discord.gg/XXXXmarabunta',
                    'sort_order' => 4,
                ],
                [
                    'name' => 'Bloods',
                    'description' => 'Gang légendaire de la côte Ouest. Trafic d\'armes, drogue et contrôle territorial avec structure hiérarchique stricte.',
                    'discord_url' => 'https://discord.gg/XXXXbloods',
                    'sort_order' => 5,
                ],
            ],
            'mafia' => [
                [
                    'name' => 'Les Yakuza',
                    'description' => "Mafia criminelle japonaise traditionnelle. Jeux d'argent, protection, trafic et code d'honneur strict.",
                    'discord_url' => 'https://discord.gg/XXXXyakuza',
                    'sort_order' => 1,
                ],
                [
                    'name' => 'La Ndrangheta',
                    'description' => 'Mafia calabraise puissante, spécialisée dans le trafic international de cocaïne et le blanchiment d\'argent.',
                    'discord_url' => 'https://discord.gg/XXXXndrangheta',
                    'sort_order' => 2,
                ],
                [
                    'name' => 'Mafia Bratva',
                    'description' => 'Mafia criminelle russe. Trafic d\'armes, cybercriminalité, extorsion et réseaux internationaux.',
                    'discord_url' => 'https://discord.gg/XXXXbratva',
                    'sort_order' => 3,
                ],
            ],
            'organisation' => [
                [
                    'name' => "O'neils",
                    'description' => 'Famille rurale impliquée dans la production de méthamphétamine et la culture de cannabis en zone isolée.',
                    'discord_url' => 'https://discord.gg/XXXXoneils',
                    'sort_order' => 1,
                ],
                [
                    'name' => 'Los Aztecas',
                    'description' => "Organisation criminelle mexicaine spécialisée dans le trafic transfrontalier, la contrebande d'armes et le contrôle des routes.",
                    'discord_url' => 'https://discord.gg/XXXXlosaztecas',
                    'sort_order' => 2,
                ],
                [
                    'name' => 'Affranchis',
                    'description' => 'Organisation mafieuse italo-américaine. Racket, blanchiment via entreprises légitimes et corruption politique.',
                    'discord_url' => 'https://discord.gg/XXXXaffranchis',
                    'sort_order' => 3,
                ],
                [
                    'name' => 'Grim Bastards MC',
                    'description' => 'Club de motards outlaws. Trafic de drogue, vols de véhicules, ateliers mécaniques clandestins et runs illégaux.',
                    'discord_url' => 'https://discord.gg/XXXXgrimbastards',
                    'sort_order' => 4,
                ],
                [
                    'name' => 'Sons Of Anarchy MC',
                    'description' => "Motorcycle Club légendaire. Contrebande d'armes, protection de territoire et fraternité au-dessus de tout.",
                    'discord_url' => 'https://discord.gg/XXXXsonsofanarchy',
                    'sort_order' => 5,
                ],
            ],
            'cartels' => [
                [
                    'name' => 'Cartel Madrazo',
                    'description' => 'Cartel mexicain puissant dirigé par Martin Madrazo. Empire criminel avec influence politique et économique.',
                    'discord_url' => 'https://discord.gg/XXXXmadrazo',
                    'sort_order' => 1,
                ],
                [
                    'name' => 'Cartel Jalisco',
                    'description' => 'Cartel Nueva Generación impitoyable. Production massive de drogue, violence extrême et expansion territoriale.',
                    'discord_url' => 'https://discord.gg/XXXXjalisco',
                    'sort_order' => 2,
                ],
            ],
        ];

        foreach ($organizations as $slug => $items) {
            $category = CrimeCategory::query()->where('slug', $slug)->firstOrFail();

            foreach ($items as $item) {
                CrimeOrganization::query()->updateOrCreate(
                    [
                        'crime_category_id' => $category->id,
                        'name' => $item['name'],
                    ],
                    [
                        'description' => $item['description'],
                        'discord_url' => $item['discord_url'],
                        'image' => null,
                        'sort_order' => $item['sort_order'],
                    ],
                );
            }
        }
    }
}
