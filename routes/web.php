<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [HomeController::class, 'showDatabase']);
Route::get('/show', [HomeController::class, 'index']);
Route::get('/database', [HomeController::class, 'showDatabase']);
Route::get('/database/{database}', [HomeController::class, 'showTable']);
Route::get('/database/{database}/table/{table}', [HomeController::class, 'showColumns']);
