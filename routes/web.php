<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MasterController;
use GuzzleHttp\Middleware;
use Maatwebsite\Excel\Row;

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

Route::get('/login',[AuthController::class,'index']);
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/deshbord',[MasterController::class,'index']);
    Route::get('/logout',[AuthController::class,'logout']);
    Route::get('/customer-data',[MasterController::class,'getdata'])->name('customer.data');
    Route::post('/customer-save',[MasterController::class,'add'])->name('customer.save');
    Route::post('/customer-update',[MasterController::class,'update'])->name('customer.update');
    Route::post('cdata',[MasterController::class,'cdata'])->name('data');
    Route::get('/delete/{id}',[MasterController::class,'delete']);
});