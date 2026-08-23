<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\App\Services\PlayerSession::class);
        $this->app->singleton(\App\Services\TebexHeadlessService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $player = app(\App\Services\PlayerSession::class);

            if (! $view->offsetExists('player')) {
                $view->with('player', $player);
            }

            if ($player->isLoggedIn()) {
                $view->with('playerWallet', $player->wallet());
                $view->with('playerEsx', $player->esxUser());
                $view->with('playerOnlineExpiresIn', $player->onlineExpiresInSeconds());
            }
        });
    }
}
