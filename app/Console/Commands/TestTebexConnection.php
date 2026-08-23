<?php

namespace App\Console\Commands;

use App\Services\TebexHeadlessService;
use Illuminate\Console\Command;

class TestTebexConnection extends Command
{
    protected $signature = 'rise:test-tebex';

    protected $description = 'Teste la connexion Tebex Headless (catégories / packs)';

    public function handle(TebexHeadlessService $tebex): int
    {
        if (! $tebex->isConfigured()) {
            $this->error('TEBEX_PUBLIC_TOKEN manquant dans .env');

            return self::FAILURE;
        }

        $categories = $tebex->categoriesWithPackages();
        $this->info('Catégories Tebex : '.count($categories));

        $totalPackages = 0;
        foreach ($categories as $category) {
            $packages = $category['packages'] ?? [];
            $count = count($packages);
            $totalPackages += $count;
            $this->line('  - '.($category['name'] ?? 'Sans nom')." : {$count} pack(s)");
        }

        $this->info("Total packs : {$totalPackages}");

        return $totalPackages > 0 ? self::SUCCESS : self::FAILURE;
    }
}
