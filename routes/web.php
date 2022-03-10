<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TarifController,
    AuthController
};

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
    return view('auth/login');
})->name('login');
Route::get('/login2', function () {
    return view('auth/login');
})->name('login2');
Route::get('/register', function () {
    return view('auth/register');
})->name('regis');
Route::post('/register', [AuthController::class, "register"])->name('register');
Route::post('/login', [AuthController::class, "login"])->name('loginProses');
Route::group(['auth:sanctum'], function() {
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('isidashboard');
        })->name('dashboard');
        Route::get('/logout', [AuthController::class, "logout"])->name('logout');

        //route Tarif
        Route::get('/tarif', [TarifController::class, "index"])->name('tarif');
        Route::get('/addtarif', function () {return view('addtarif');})->name('addtarif');
        Route::post('/savetarif', [TarifController::class, "store"])->name('savetarif');
        Route::post('/updatetarif/{id}', [TarifController::class, "update"])->name('updatetarif');
        Route::get('/edittarif/{id}', [TarifController::class, "show"])->name('edittarif');
        Route::get('/deletetarif/{id}', [TarifController::class, "delete"])->name('deletetarif');
        //route nilai
        Route::get('/nilai', function () {return view('nilai');})->name('nilai');
    });
    
});
