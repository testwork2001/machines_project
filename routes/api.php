<?php

use App\Http\Controllers\Web\InquiryController;
use App\Http\Controllers\Web\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/products/search/' , [ProductController::class , 'search']);
// Route::post('/products/inquiry/', [InquiryController::class , 'apiStore']);