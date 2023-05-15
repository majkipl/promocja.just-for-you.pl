<?php

use App\Http\Controllers\FormApplicationController;
use App\Http\Controllers\FormOpinionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Panel\ApplicationController;
use App\Http\Controllers\Panel\OpinionController;
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ThxApplicationController;
use App\Http\Controllers\ThxOpinionController;
use App\Http\Middleware\VerifyCsrfTokenForFormSave;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produkty', [ProductController::class, 'index'])->name('products');
Route::get('/dodaj-zgloszenie', [FormApplicationController::class, 'index'])->name('form.app');
Route::post('/dodaj-zgloszenie/zapisz', [FormApplicationController::class, 'save'])->middleware(VerifyCsrfTokenForFormSave::class)->name('form.app.save');
Route::get('/dodaj-zgloszenie/dziekujemy/{id}', [ThxApplicationController::class, 'index'])->name('thx.app');
Route::get('/dodaj-opinie', [FormOpinionController::class, 'index'])->name('form.opinion');
Route::post('/dodaj-opinie/zapisz', [FormOpinionController::class, 'save'])->middleware(VerifyCsrfTokenForFormSave::class)->name('form.opinion.save');
Route::get('/dodaj-opinie/dziekujemy', [ThxOpinionController::class, 'index'])->name('thx.opinion');

Auth::routes();

Route::middleware(['auth', 'verified'])->group( function () {
    Route::get('/panel', [PanelController::class, 'index'])->name('panel');

    // isAdmin // \App\Providers\AuthServiceProvider
    Route::middleware(['can:isAdmin'])->group( function () {
        Route::get('/panel/zgloszenia', [ApplicationController::class, 'index'])->name('panel.apps');
        Route::get('/panel/zgloszenie/{id}', [ApplicationController::class, 'show'])->name('panel.app.show');
        Route::get('/panel/opinie', [OpinionController::class, 'index'])->name('panel.opinion');
        Route::get('/panel/opinia/{id}', [OpinionController::class, 'show'])->name('panel.opinion.show');
    });
});
