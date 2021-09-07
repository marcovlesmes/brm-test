<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionsController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::patch('permissions', [PermissionController::class, 'update'])->name('permissions.update');
Route::resource('info', InfoController::class);
Route::resource('images', ImageController::class);

Auth::routes();