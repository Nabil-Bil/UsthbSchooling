<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
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

Route::get('/login',[UserController::class,'view_login'])->name('login');
Route::post('/login',[UserController::class,'login'])->name('login')->middleware('throttle:only_three_attempts');
Route::middleware(['auth'])->group(function () {
    Route::get('/', [Controller::class,'index'])->name('home');
    Route::get('/logout',function(){
        return redirect(route('login'));
    });
    Route::post('logout',[UserController::class,'logout'])->name('logout');

});
