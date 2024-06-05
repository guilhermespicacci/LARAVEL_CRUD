<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fallbackController;
use App\Http\Controllers\sharkController;
use App\Http\Controllers\LevelController;
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

Route::resource('sharks',sharkController::class);



Route::prefix('shark')->group(function () {
Route::resource('levels',LevelController::class);
});

Route::fallback([fallbackController::class,'index'])->name('fallback');