<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', [App\Http\Controllers\InvestmentController::class, 'show'])->name('investment.show');

    Route::get('/create', [App\Http\Controllers\InvestmentController::class, 'create'])->name('investment.create');

    Route::post('/create', [App\Http\Controllers\InvestmentController::class, 'store']);

    Route::get('/{id}/edit', [App\Http\Controllers\InvestmentController::class, 'edit'])->name('investment.update');

    Route::post('/{id}/edit', [App\Http\Controllers\InvestmentController::class, 'update']);

    Route::get('/{id}/delete', [App\Http\Controllers\InvestmentController::class, 'destroy'])->name('investment.delete');

    Route::get('currency/update', [App\Http\Controllers\CurrencyController::class, 'update'])->name('currency.update');

});

