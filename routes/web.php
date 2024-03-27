<?php

use App\Http\Controllers\frontendController;
use App\Http\Controllers\productController;
use App\Http\Controllers\settingsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/generate-storage-link', function () {
    $publicPath = public_path('storage');
    $storagePath = storage_path('app/public');

    if (!file_exists($publicPath)) {
        symlink($storagePath, $publicPath);
    }

    return 'Storage link created successfully!';
})->name('generate.storage.link');



Route::get('/menu', [frontendController::class, 'index'])->name('menu');




Route::middleware(['auth'])->prefix('admin')->group(function () {



    Route::get('/product', [productController::class, 'index'])->name("product.index");
    Route::get('/product/create', [productController::class, 'create'])->name('product.create');
    Route::get('/product/data', [productController::class, 'data'])->name('product.data');
    Route::get('/product/edit/{id?}', [productController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id?}', [productController::class, 'update'])->name('product.update');
    Route::delete('/product/delete/{id?}', [productController::class, 'destroy'])->name('product.delete');
    Route::post('/product/store', [productController::class, 'store'])->name('product.store');




    //////////////////////  settings

    Route::get('/settings', [settingsController::class, 'index'])->name("settings.index");
    Route::post('/settings/store', [settingsController::class, 'store'])->name("settings.store");
});
require __DIR__ . '/auth.php';

Route::get('/{locale?}', [frontendController::class, 'dashborad'])->name('frontend.index');
