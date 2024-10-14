<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\QualityController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/imprimir', [App\Http\Controllers\GenerateController::class, 'imprimir'])->name('imprimir');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/labels', LabelController::class)->middleware('auth');
Route::resource('/artists', ArtistController::class)->middleware('auth');
Route::resource('/genres', GenreController::class)->middleware('auth');
Route::resource('/qualities', QualityController::class)->middleware('auth');
Route::resource('/albums', AlbumController::class)->middleware('auth');
