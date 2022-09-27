<?php

use App\Http\Livewire\Admin\Tags;
use App\Http\Livewire\Admin\Sizes;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Admin\Colors;
use App\Http\Livewire\Admin\Images;
use App\Http\Livewire\Admin\Videos;
use App\Http\Livewire\Admin\Designs;
use App\Http\Livewire\Admin\Entries;
use App\Http\Livewire\Admin\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\CuponAdmin;
use App\Http\Livewire\Admin\CategoryDesigns;
use App\Http\Livewire\Admin\CategoryProducts;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Livewire\Admin\SubCategoryDesigns;



Route::name('admin.')->group(function () {

    Route::get('/', Dashboard::class)->name('index');

    Route::get('users', Users::class)->name('users');

    Route::get('category_products', CategoryProducts::class)->name('category_products');

    Route::get('category_designs', CategoryDesigns::class)->name('category_designs');

    Route::get('sub_category_designs', SubCategoryDesigns::class)->name('sub_category_designs');

    Route::get('products', Products::class)->name('products');

    Route::get('sizes', Sizes::class)->name('sizes');

    Route::get('colors', Colors::class)->name('colors');

    Route::get('designs', Designs::class)->name('designs');

    Route::resource('orders', OrderController::class)->only(['index', 'create', 'edit'])->names('orders');

    Route::get('cupons', CuponAdmin::class)->name('cupons');

    Route::get('entries', Entries::class)->name('entries');

    Route::get('images', Images::class)->name('images');

    Route::get('videos', Videos::class)->name('videos');

    Route::get('tags', Tags::class)->name('tags');

});


