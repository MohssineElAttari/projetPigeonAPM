<?php

use App\Http\Controllers\ConcourController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembreController;
use Illuminate\Support\Facades\App;
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

Route::middleware(['CheckActive','auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home'); 
    Route::get('/dashboard/membre',[MembreController::class,'index'])->name('membre');
    Route::get('/dashboard/concour',[ConcourController::class,'index'])->name('concour');
});

Route::get('/', function () {
    return view('home');
});
