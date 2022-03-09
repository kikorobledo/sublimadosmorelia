<?php

use App\Http\Livewire\Admin\Sizes;
use App\Http\Livewire\Admin\Users;
use App\Http\Livewire\Admin\Colors;
use App\Http\Livewire\Admin\Designs;
use App\Http\Livewire\Admin\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
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

    Route::get('products', Sizes::class)->name('sizes');

    Route::get('colors', Colors::class)->name('colors');

    Route::get('designs', Designs::class)->name('designs');

    Route::resource('orders', OrderController::class)->only(['index', 'create', 'edit'])->names('orders');

});


