<?php

namespace App\Console\Commands;

use App\Models\EsxUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestEsxConnection extends Command
{
    protected $signature = 'esx:test {identifier? : Identifier license à lire (sans modifier)}';

    protected $description = 'Teste la connexion ESX en lecture seule (users)';

    public function handle(): int
    {
        $config = config('database.connections.esx');

        $this->info('Connexion ESX : '.$config['host'].':'.$config['port'].'/'.$config['database']);

        try {
            DB::connection('esx')->getPdo();
            $count = DB::connection('esx')->table('users')->count();
            $this->info("OK — {$count} joueur(s) dans users.");

            $identifier = $this->argument('identifier');

            if (is_string($identifier) && $identifier !== '') {
                $user = EsxUser::query()->find($identifier);

                if ($user === null) {
                    $this->warn("Aucun users.identifier = {$identifier}");

                    return self::FAILURE;
                }

                $wallet = $user->wallet();
                $this->info('Lecture OK : '.$user->full_name);
                $this->line('  money='.$wallet['money'].' bank='.$wallet['bank'].' black_money='.$wallet['black_money']);
            }

            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error('Échec : '.$e->getMessage());
            $this->line('Vérifiez ESX_DB_* dans .env (et la whitelist IP du MySQL OVH, port 34982).');
            $this->line('Le dump indiquait parfois rise_database — le nom exact doit matcher le serveur.');

            return self::FAILURE;
        }
    }
}
