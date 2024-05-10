<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OfferController;
use App\Http\Controllers\Admin\CardTypeController;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/offer',[HomeController::class,'offer'])->name('view.offer');

Route::post('/offer',[OfferController::class,'search'])->name('search.offer')->middleware('auth');
Route::get('admin/get/cards/{bankId}', [CardTypeController::class, 'getCards'])->name('get.card.type')->middleware('auth');