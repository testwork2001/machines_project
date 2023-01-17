<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SpecController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\helpController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';
Route::middleware(['auth', 'adminverified'])->group(function () {
    Route::get('/', HomeController::class)->name('admin');
    Route::resource('products', ProductController::class)->except('show');
    Route::resource('specs', SpecController::class)->except('show');
    Route::resource('inquiries', InquiryController::class)->except('show', 'store', 'create', 'edit', 'update');
    Route::resource('clients', ClientController::class)->except('show', 'store', 'create');
    Route::resource('admins', AdminController::class)->except('show', 'destroy');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('profile/update/{admin}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('help/index', [HelpController::class, 'index'])->name('help.index');
    Route::delete('help/delete/{help}', [HelpController::class, 'destory'])->name('help.destory');
});
