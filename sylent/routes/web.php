<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Route formulaire
Route::get('/form', [FormController::class, 'formulaire'])->name('formulaire');
Route::post('/form', [FormController::class, 'submitForm'])->name('submit-form');
Route::get('/accueil', [FormController::class, 'ShowHome'])->name('accueil');
Route::get('/admin', [FormController::class, 'showAdminPage'])->name('admin');
Route::post('/generate-url', [FormController::class, 'generateUrl'])->name('generate-url');
Route::view('/confirmation', 'form/confirmation')->name('confirmation');