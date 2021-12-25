<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ConcourController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportController;
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

Route::middleware(['CheckActive', 'auth'])->group(function () {
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard/membre', [MembreController::class, 'index'])->name('membre');
    Route::post('/dashboard/membre', [MembreController::class, 'store'])->name('membre.store');
    Route::post('/dashboard/membre/delete/{id}', [MembreController::class, 'destroy'])->name('membre.delete');
    Route::post('/dashboard/membre/update/{id}', [MembreController::class, 'update'])->name('membre.update');

    Route::get('/import-membre', [ImportController::class, 'index'])->name('membre-mmport');
    Route::get('/import-membre/fetch_data', [ImportController::class, 'fetch_data']);
    Route::post('/import-membre/add_data', [ImportController::class, 'add_data'])->name('membre.add_data');
    Route::post('/import-membre/update_data', [ImportController::class, 'update_data'])->name('membre.update_data');
    Route::post('/import-membre/delete_data', [ImportController::class, 'delete_data'])->name('membre.delete_data');
    Route::get('file-import-export', [MembreController::class, 'fileImportExport']);
    Route::post('file-import', [MembreController::class, 'fileImport'])->name('file-import');
    Route::get('file-export', [MembreController::class, 'fileExport'])->name('file-export');


    Route::get('/dashboard/concour', [ConcourController::class, 'index'])->name('concour');
    Route::post('/dashboard/concour', [ConcourController::class, 'store'])->name('concour.store');
    Route::post('/dashboard/concour/delete/{id}', [ConcourController::class, 'destroy'])->name('concour.delete');
    Route::post('/dashboard/concour/update/{id}', [ConcourController::class, 'update'])->name('concour.update');


    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout.perform');

});

Route::get('/', function () {
    return view('home');
});
