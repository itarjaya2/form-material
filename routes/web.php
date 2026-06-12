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
Route::post('/tinta/import', [TintaController::class, 'import'])
    ->name('tinta.import');

Route::resource('kertas', KertasController::class);
Route::post('/kertas/import', [KertasController::class, 'import'])
    ->name('kertas.import');

Route::resource('chemical', ChemicalController::class);
Route::post('/chemical/import', [ChemicalController::class, 'import'])
    ->name('chemical.import');

Route::resource('box', BoxController::class);
Route::post('/box/import', [BoxController::class, 'import'])
    ->name('box.import');

Route::resource('bahan-penolong', BahanPenolongController::class);
Route::post('/bahan-penolong/import', [BahanPenolongController::class, 'import'])
    ->name('bahan-penolong.import');

Route::resource('bahan-tambahan', BahanTambahanController::class);
Route::post('/bahan-tambahan/import', [BahanTambahanController::class, 'import'])
    ->name('bahan-tambahan.import');

Route::resource('corrugated', CorrugatedController::class);
// route import
Route::post('/corrugated/import', [CorrugatedController::class, 'import'])
    ->name('corrugated.import');




