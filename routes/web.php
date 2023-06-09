<?php

use App\Http\Controllers\IndexController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('cars', [IndexController::class, 'cars']);
Route::get('washers', [IndexController::class, 'washers']);
Route::get('payments', [IndexController::class, 'payments']);
Route::get('charges', [IndexController::class, 'charges']);
Route::get('editCharge', [IndexController::class, 'editCharge']);
Route::get('editRate', [IndexController::class, 'editRate']);
Route::get('editWasher', [IndexController::class, 'editWasher']);
Route::get('getAmount', [IndexController::class, 'getAmount']);
Route::post('addWashers', [IndexController::class, 'addWashers']);
Route::post('addCar', [IndexController::class, 'addCar']);
Route::post('eWashers', [IndexController::class, 'eWashers']);
Route::post('eRate', [IndexController::class, 'eRate']);
Route::post('eCharge', [IndexController::class, 'eCharge']);
Route::post('addCharge', [IndexController::class, 'addCharge']);

