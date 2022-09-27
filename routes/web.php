<?php


use App\Http\Livewire\UserOrders;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\OrderManagement;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SetPasswordController;

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

Route::get('setpassword', [SetPasswordController::class, 'create'])->name('setpassword');
Route::post('setpassword', [SetPasswordController::class, 'store'])->name('setpassword.store');

Route::get('/', HomeController::class)->name('home');

Route::get('catalogo', CatalogoController::class)->name('catalogo');

Route::get('categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('design/{slug}', [DesignController::class, 'show'])->name('designs.show');

Route::get('search', SearchController::class)->name('search');

Route::get('invitation/{user}', [UserController::class, 'invitation'])->name('invitation');

Route::get('preguntas_frecuentes', [FooterController::class, 'preguntas_frecuentes'])->name('preguntas_frecuentes');

Route::get('aviso_de_privacidad', [FooterController::class, 'aviso_de_privacidad'])->name('aviso_de_privacidad');

Route::get('terminos_y_condiciones', [FooterController::class, 'terminos_y_condiciones'])->name('terminos_y_condiciones');

Route::group(['middleware' => ['is.active', 'auth']], function (){

    Route::get('order_management', OrderManagement::class)->middleware('auth')->name('order_management');

    Route::get('user_orders', UserOrders::class)->middleware('auth')->name('user_orders');

});

Route::get('auth/facebook', [SocialiteController::class, 'redirectToProvider'])->name('facebook');
Route::get('auth/facebook/callback', [SocialiteController::class, 'handleProviderCallback'])->name('facebook_callback');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
