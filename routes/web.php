<?php

use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\ContactusController;
use App\Http\Controllers\Web\HelpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\InquiryController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ServiceController;

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
Route::get('products/show/{slug}/', [ProductController::class, 'show'])->name('products');
Route::get('products/details/{id}/', [ProductController::class, 'details'])->name('details');
Route::post('products/inquiry/', [InquiryController::class, 'store'])->name('inquiry.store');
Route::get('aboutus', AboutController::class)->name('about');
Route::get('contactus' , ContactusController::class )->name('contact');
Route::post('help/store' , HelpController::class)->name('help.store');
