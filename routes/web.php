<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrucksController;
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

// Home page
Route::get('/', function () {
    return view('home');
});

// Authorization
Route::post('/login', [UserController::class,'login']);
Route::post('/logout', [UserController::class,'logout']);
Route::post('/register', [UserController::class,'register']);
Route::get('/register', function () { return view('register'); });

// The trucks controller -> Access for logged users only
Route::any('/trucks', [TrucksController::class,'overview']);
Route::get('/trucks/getTrucks', [TrucksController::class,'getTrucks'])->name('getTrucks');;
Route::delete('/trucks/delete/{truck_id}', [TrucksController::class,'delete']);
Route::post('/trucks/create', [TrucksController::class,'create']);


