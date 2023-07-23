<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index']);
Route::get('p/create', [App\Http\Controllers\PostController::class, 'create']);
Route::post('/p', [App\Http\Controllers\PostController::class, 'store']);


