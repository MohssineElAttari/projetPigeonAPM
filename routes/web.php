<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ConcourController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IpmortMembreController;
use App\Http\Controllers\MembreController;
use Illuminate\Support\Facades\App;
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

Route::middleware(['CheckActive', 'auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //route membre
    Route::get('/dashboard/membre', [MembreController::class, 'index'])->name('membre');
    Route::post('/dashboard/membre', [MembreController::class, 'store'])->name('membre.store');
    Route::post('/dashboard/membre/delete/{id}', [MembreController::class, 'destroy'])->name('membre.delete');
    Route::post('/dashboard/membre/update/{id}', [MembreController::class, 'update'])->name('membre.update');

    //route import
    Route::get('/import-membre', [IpmortMembreController::class, 'showdata'])->name('membre-mmport');
    Route::post('file-import', [IpmortMembreController::class, 'fileImport'])->name('file-import');
    Route::get('file-import', [IpmortMembreController::class, 'showdata']);
    Route::post('/import-membre/analise_data', [IpmortMembreController::class, 'analise_data'])->name('analise_data');
    Route::post('/import-membre/update_data', [IpmortMembreController::class, 'update_data'])->name('membre.update_data');
    Route::post('/import-membre/delete_data', [IpmortMembreController::class, 'delete_data'])->name('membre.delete_data');
    Route::post('/import-membre/insert_data', [IpmortMembreController::class, 'insert_data'])->name('membre.insert_data');

    //route export
    Route::get('file-import-export', [MembreController::class, 'fileImportExport']);
    Route::get('file-export', [MembreController::class, 'fileExport'])->name('file-export');

    //route concour
    Route::get('/dashboard/concour', [ConcourController::class, 'index'])->name('concour');
    Route::post('/dashboard/concour', [ConcourController::class, 'store'])->name('concour.store');
    Route::post('/dashboard/concour_membre', [ConcourController::class, 'store'])->name('concour_membre');
    Route::post('/dashboard/concour_resultat', [ConcourController::class, 'store'])->name('concour_resultat');
    Route::post('/dashboard/concour/delete/{id}', [ConcourController::class, 'destroy'])->name('concour.delete');
    Route::post('/dashboard/concour/update/{id}', [ConcourController::class, 'update'])->name('concour.update');


    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout.perform');
});

Route::get('/', function () {
    return view('home');
});
