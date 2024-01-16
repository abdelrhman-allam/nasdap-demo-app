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

Route::get('/', function () {
    Route::get('home', 'HomeController');

    Route::get('register', 'RegisterUserController');
    Route::get('login', 'LoginUserController');

    Route::post('register', 'RegisterUserController');
    Route::post('login', 'LoginUserController');

    Route::get('home', 'HomeController');
    Route::get('list-companies', 'ListCompaniesController');
    Route::get('show-company', 'ShowCompanyController');

    Route::post('add-company', 'AddCompanyController');
});
