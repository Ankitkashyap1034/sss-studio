<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\CardTypeController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PaymentPlatformsController;

Route::middleware(['auth','admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::get('/bank', [BankController::class, 'index'])->name('create.bank');
        Route::post('/bank', [BankController::class, 'store'])->name('store.bank');
        Route::post('/bank-update', [BankController::class, 'update'])->name('update.bank');
        Route::post('/bank-delete', [BankController::class, 'destroy'])->name('delete.bank');


        // create offers
        Route::get('/create-offer', [OfferController::class, 'index'])->name('create.offer');
        Route::post('/create-offer', [OfferController::class, 'store'])->name('store.offer');
        Route::post('/update-offer', [OfferController::class, 'update'])->name('update.offer');
        Route::post('/update-delete', [OfferController::class, 'destroy'])->name('delete.offer');

        // 
        Route::get('/payments-platform', [PaymentPlatformsController::class, 'index'])->name('create.payment.platform');
        Route::post('/payments-platform', [PaymentPlatformsController::class, 'store'])->name('store.payment.platform');
        Route::post('/payments-platform-update', [PaymentPlatformsController::class, 'update'])->name('update.payment.platform');
        Route::post('/payments-delete', [PaymentPlatformsController::class, 'destroy'])->name('delete.platform');

        // create CARD TYPE
        Route::get('/create/card-type', [CardTypeController::class, 'index'])->name('create.card.type');
        Route::post('/create/card-type', [CardTypeController::class, 'store'])->name('store.credit.card.type');
        Route::post('/update-card', [CardTypeController::class, 'update'])->name('update.card');
        Route::post('/delete-card', [CardTypeController::class, 'destroy'])->name('delete.card');        
      });
}); 