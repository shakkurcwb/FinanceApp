<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

# Home
Route::view('/home', 'home.index');

# Accounts
Route::get('/accounts', [App\Http\Controllers\AccountController::class, 'index']);
Route::get('/accounts/create', [App\Http\Controllers\AccountController::class, 'create']);
Route::post('/accounts', [App\Http\Controllers\AccountController::class, 'store']);
Route::get('/accounts/{account}', [App\Http\Controllers\AccountController::class, 'show']);
Route::get('/accounts/{account}/edit', [App\Http\Controllers\AccountController::class, 'edit']);
Route::put('/accounts/{account}', [App\Http\Controllers\AccountController::class, 'update']);
Route::delete('/accounts/{account}', [App\Http\Controllers\AccountController::class, 'destroy']);

# Transactions
Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index']);
Route::get('/transactions/create', [App\Http\Controllers\TransactionController::class, 'create']);
Route::post('/transactions', [App\Http\Controllers\TransactionController::class, 'store']);
Route::get('/transactions/{transaction}', [App\Http\Controllers\TransactionController::class, 'show']);
Route::get('/transactions/{transaction}/edit', [App\Http\Controllers\TransactionController::class, 'edit']);
Route::put('/transactions/{transaction}', [App\Http\Controllers\TransactionController::class, 'update']);
Route::delete('/transactions/{transaction}', [App\Http\Controllers\TransactionController::class, 'destroy']);