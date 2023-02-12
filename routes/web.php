<?php

use App\Http\Controllers\ConcessionairesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
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

Route::get('/', [SalesController::class, 'dashboard'])->name('sales.dashboard');

Route::get('sales/create', [SalesController::class, 'create'])->name('sales.create');
Route::post('sales/store', [SalesController::class, 'store'])->name('sales.store');
Route::get('sales/show/{id}', [SalesController::class, 'show'])->name('sales.show');
Route::get('sales/pdf', [SalesController::class, 'pdfSales'])->name('sales.pdf');

Route::get('concessionaires/create', [ConcessionairesController::class, 'create'])->name('concessionaires.create');
Route::post('concessionaires/store', [ConcessionairesController::class, 'store'])->name('concessionaires.store');

Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('products/store', [ProductsController::class, 'store'])->name('products.store');