<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TintaController;
use App\Http\Controllers\KertasController;
use App\Http\Controllers\ChemicalController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\BahanPenolongController;
use App\Http\Controllers\BahanTambahanController;
use App\Http\Controllers\CorrugatedController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/index', [PostController::class, 'index']);
// Route::get('/tinta', [TintaController::class, 'index'])->name('tinta');
// Route::post('/tinta', [TintaController::class, 'store'])->name('tinta.store');
// Route::delete('/tinta/{id}', [TintaController::class, 'destroy'])
//     ->name('tinta.destroy');
Route::resource('tinta', TintaController::class)
    ->parameters([
        'tinta' => 'tinta'
    ]);
Route::resource('kertas', KertasController::class);
Route::resource('chemical', ChemicalController::class);
Route::resource('box', BoxController::class);
Route::resource('bahan-penolong', BahanPenolongController::class);
Route::resource('bahan-tambahan', BahanTambahanController::class);
Route::resource('corrugated', CorrugatedController::class);
Route::post('/corrugated/import', [CorrugatedController::class, 'import'])
    ->name('corrugated.import');
Route::post('/kertas/import', [KertasController::class, 'import'])
    ->name('kertas.import');


