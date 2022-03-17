<?php


use App\Http\Livewire\UserOrders;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\OrderManagement;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', HomeController::class)->name('home');

Route::get('catalogo', CatalogoController::class)->name('catalogo');

Route::get('categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('design/{slug}', [DesignController::class, 'show'])->name('designs.show');

Route::get('search', SearchController::class)->name('search');

Route::get('order_management', OrderManagement::class)->middleware('auth')->name('order_management');

Route::get('user_orders', UserOrders::class)->middleware('auth')->name('user_orders');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
