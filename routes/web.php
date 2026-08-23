<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\GameAuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/metiers-legaux', [PageController::class, 'metiersLegaux'])->name('metiers-legaux');
Route::get('/organisations-criminelles', [PageController::class, 'organisationsCriminelles'])->name('organisations-criminelles');

Route::permanentRedirect('/index.html', '/');
Route::permanentRedirect('/faq.html', '/faq');
Route::permanentRedirect('/shop.html', '/shop');
Route::permanentRedirect('/metiers-legaux.html', '/metiers-legaux');
Route::permanentRedirect('/organisations-criminelles.html', '/organisations-criminelles');

Route::get('/auth/game', [GameAuthController::class, 'callback'])->name('auth.game');
Route::post('/api/game/session', [GameAuthController::class, 'issueFromServer'])->name('api.game.session');
Route::post('/api/game/ping', [GameAuthController::class, 'pingOnline'])->name('api.game.ping');
Route::post('/logout', [GameAuthController::class, 'logout'])->name('logout');

Route::get('/compte', [AccountController::class, 'show'])->name('account.show');

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::post('/shop/checkout', [ShopController::class, 'checkout'])
    ->middleware('player.online')
    ->name('shop.checkout');
Route::get('/shop/checkout/retour', [ShopController::class, 'checkoutReturn'])
    ->middleware('player.online')
    ->name('shop.checkout.return');
Route::get('/shop/merci', [ShopController::class, 'thankyou'])->name('shop.thankyou');
