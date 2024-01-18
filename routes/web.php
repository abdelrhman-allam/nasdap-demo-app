<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\Home;

use App\Http\Controllers\UserAuthentication;
use App\Http\Controllers\ManageCompany;

/* home routes */
Route::get('/', Home\IndexController::class);

/* basic auth routes */
Route::prefix('auth')->group(function () {
    Route::get('register', UserAuthentication\RegisterController::class);
    Route::get('login', UserAuthentication\LoginController::class);
    Route::post('register', UserAuthentication\RegisterController::class);
    Route::post('login', UserAuthentication\LoginController::class);
    Route::post('logout', UserAuthentication\LogoutController::class);
});

/* company routes */
Route::prefix('company')->group(function () {
    Route::get('/', ManageCompany\ListCompaniesController::class);
    Route::get('{id}', ManageCompany\ShowCompanyController::class);
    Route::post('/', ManageCompany\CreateCompanyController::class);
});
