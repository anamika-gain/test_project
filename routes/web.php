<?php

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

Route::get('/', [App\Http\Controllers\RegistrationController::class, 'create'])->name('add.user');
Route::get('/all_user', [App\Http\Controllers\RegistrationController::class, 'index'])->name('all_user');
Route::post('store', [App\Http\Controllers\RegistrationController::class, 'Store'])->name('store.user_data');
Route::get('delete/user/{id}', [App\Http\Controllers\RegistrationController::class, 'DeleteUser']);
Route::get('edit/user/{id}', [App\Http\Controllers\RegistrationController::class, 'EditUser']);
Route::post('update/user/{id}',  [App\Http\Controllers\RegistrationController::class, 'UpdateUser']);

//product route store.project
Route::get('/all_product', [App\Http\Controllers\ProductController::class, 'index'])->name('all_product');
Route::get('delete/product/{id}', [App\Http\Controllers\ProductController::class, 'DeleteProduct']);
Route::get('edit/product/{id}', [App\Http\Controllers\ProductController::class, 'EditProduct']);
Route::post('update/product/{id}',  [App\Http\Controllers\ProductController::class, 'UpdateProduct']);
Route::post('store', [App\Http\Controllers\ProductController::class, 'Store'])->name('store.product');
