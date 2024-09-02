<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Document');
});
Route::get('customer', [CustomerController::class, 'index'])->name('index');
Route::get('/getStoreList', [CustomerController::class, 'getStoreList'])->name('getStoreList');
Route::post('saveDoc', [CustomerController::class, 'saveDoc'])->name('saveDoc');
Route::get('ListDoc', [CustomerController::class, 'ListDoc'])->name('ListDoc');

Route::get('/document','App\Http\Controllers\DocumentController@documentForm');


