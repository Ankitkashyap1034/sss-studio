<?php
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');

Route::get('employer/register', [LoginController::class, 'register'])->name('register.employer');

Route::post('/login', [LoginController::class, 'loginCheck'])->name('login.check');
Route::post('/register', [LoginController::class, 'store'])->name('register.store');
Route::post('/register/admin/customer', [LoginController::class, 'storeCustomerEmployer'])->name('register.store.employer');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register/employee-customer', [LoginController::class, 'sendInvitation'])->name('register.customer.employee');

Route::get('/verify-email/{user_id}/{code}', [LoginController::class, 'verifyEmail'])->name('verify.email');
Route::get('/accept/invitation/{employer_id}/{invited_id}', [LoginController::class, 'acceptInvitation'])->name('accept/invitation');