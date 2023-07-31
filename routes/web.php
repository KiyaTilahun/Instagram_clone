<?php

use App\Mail\NewUserWelcomeMail;
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



Auth::routes();
Route::get('/email',function(){
return new NewUserWelcomeMail();
});
Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
Route::post('/follow/{user}',[\App\Http\Controllers\FollowsController::class,'store']);
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index']);
Route::get('p/create', [App\Http\Controllers\PostController::class, 'create']);
Route::post('/p', [App\Http\Controllers\PostController::class, 'store']);
Route::get('/p/{posts}', [App\Http\Controllers\PostController::class, 'show'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');





