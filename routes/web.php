<?php

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

Route::get('/', ['uses' => 'AuthController@loginPage', 'middleware' => 'guest']);
Route::post('/login', ['uses' => 'AuthController@login', 'middleware' => 'guest']);
Route::get('/logout', ['uses' => 'AuthController@logout', 'middleware' => 'sentinel-auth']);

Route::get('/dashboard', ['uses' => 'DashboardController@dashboard', 'middleware' => 'sentinel-auth']);
Route::get('/profile', ['uses' => 'ProfileController@show', 'middleware' => 'sentinel-auth']);
Route::post('/profile', ['uses' => 'ProfileController@save', 'middleware' => 'sentinel-auth']);
Route::post('/change-password', ['uses' => 'ProfileController@changePassword', 'middleware' => 'sentinel-auth']);
Route::post('/change-photo', ['uses' => 'ProfileController@changePhoto', 'middleware' => 'sentinel-auth']);

Route::group(['prefix' => 'master-data-settings', 'middleware' => 'sentinel-auth'], function() {

	Route::get('/banks', 'MasterData\BankController@index');
	Route::post('/banks/store', 'MasterData\BankController@store');
	Route::post('/banks/update/{id}', 'MasterData\BankController@update');
	Route::get('/banks/destroy/{id}', 'MasterData\BankController@destroy');
	Route::get('/branches', 'MasterData\BranchController@index');
	Route::post('/branches/store', 'MasterData\BranchController@store');
	Route::post('/branches/update/{id}', 'MasterData\BranchController@update');
	Route::get('/branches/destroy/{id}', 'MasterData\BranchController@destroy');
	Route::get('/employees', 'MasterData\EmployeeController@index');
	Route::post('/employees/store', 'MasterData\EmployeeController@store');
	Route::post('/employees/update/{id}', 'MasterData\EmployeeController@update');
	Route::get('/employees/destroy/{id}', 'MasterData\EmployeeController@destroy');
	Route::resource('/fdrs', 'MasterData\FdrController');
	Route::get('/fdr-renew', 'MasterData\FdrController@renew');
});

Route::group(['prefix' => 'fdr-fransaction', 'middleware' => 'sentinel-auth'], function() {

	Route::get('/fdr-posting', 'FdrTransaction\TestController@test');
	Route::get('/fdr-transaction-form', 'FdrTransaction\TestController@test');
});

Route::group(['prefix' => 'fdr-reporting', 'middleware' => 'sentinel-auth'], function() {

	Route::get('/bank-branch-and-period-wise-report-search', 'Reporting\ReportController@branchAndPeriodWiseReport');
	Route::get('/date-wise-fdr-report-maturity-search', 'Reporting\ReportController@dateWiseReportMaturity');
});