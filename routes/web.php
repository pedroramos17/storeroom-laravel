<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('produtos', [ProductController::class, 'index'])->name('product.index');
    Route::get('produtos/criar', [ProductController::class, 'create'])->name('product.create');
    Route::post('produtos', [ProductController::class, 'store'])->name('product.store');
    Route::get('produtos/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::put('produtos/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('produtos/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('pesquisa', [SearchController::class, 'index'])->name('search.index');
});
