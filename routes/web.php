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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login-form','AdminController@loginForm');
Route::post('login','AdminController@login');
Route::get('employees','EmployeeController@index');
Route::get('add-form','EmployeeController@create');
Route::post('add','EmployeeController@store');
Route::get('show-form/{id}','EmployeeController@show');
Route::get('edit-form/{id}','EmployeeController@edit');
Route::post('update/{id}','EmployeeController@update');
Route::post('delete/{id}','EmployeeController@destroy');

Route::get('companies','CompanyController@index');
Route::get('add-form-company','CompanyController@create');
Route::post('add-company','CompanyController@store');
Route::get('show-form-company/{id}','CompanyController@show');
Route::get('edit-form-company/{id}','CompanyController@edit');
Route::post('update-company/{id}','CompanyController@update');
Route::post('delete-company/{id}','CompanyController@destroy');
