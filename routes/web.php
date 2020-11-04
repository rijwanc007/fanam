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

Auth::routes();
Route::group(['middleware' => ['preventbackbutton','auth']],function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/user','Admin\UserController');
    Route::get('user-index','Admin\UserController@index')->name('user.index');
    Route::get('user-create','Admin\UserController@create')->name('user.create');

    Route::resource('employee', 'EmployeeController');
    Route::get('employee-index', 'EmployeeController@index')->name('employee.index');
    Route::get('employee-create', 'EmployeeController@create')->name('employee.create');
    Route::get('employee-show-{id}', 'EmployeeController@show')->name('employee.show');
    Route::get('employee-accounts', 'EmployeeController@accounts')->name('employee.accounts');

    Route::resource('grade', 'GradeController');
    Route::get('grade-index', 'GradeController@index')->name('grade.index');
    Route::get('grade-create', 'GradeController@create')->name('grade.create');

    Route::resource('company', 'CompanyController');
    Route::get('company-index', 'CompanyController@index')->name('company.index');
    Route::get('company-create', 'CompanyController@create')->name('company.create');

    Route::resource('siscon', 'SisterconcernController');
    Route::get('siscon-index', 'SisterconcernController@index')->name('siscon.index');
    Route::get('siscon-create', 'SisterconcernController@create')->name('siscon.create');
    Route::get('/sister_concern/{company}','SisterconcernController@sisterConcern');
    Route::get('/sister_concern_tax/{sister_concern}','SisterconcernController@tax');

    Route::resource('collection', 'CollectionController');
    Route::get('collection-index', 'CollectionController@index')->name('collection.index');
    Route::get('collection-create', 'CollectionController@create')->name('collection.create');

    Route::resource('tatd', 'TatdController');
    Route::get('/ta-td-index', 'TatdController@index')->name('tatd.index');
    Route::get('/ta_td-create-{id}', 'TatdController@create')->name('tatd.create');
    Route::get('/ta_td/month','TatdController@taTdMonth')->name('ta_td_month');

    Route::resource('project', 'ProjectController');
    Route::get('project-index', 'ProjectController@index')->name('project.index');
    Route::get('project-create', 'ProjectController@create')->name('project.create');

    Route::resource('incentive', 'IncentiveController');
    Route::get('incentive-index', 'IncentiveController@index')->name('incentive.index');
    Route::get('incentive-create', 'IncentiveController@create')->name('incentive.create');
    Route::get('/incentive/{installment}','IncentiveController@installment');

    Route::resource('sell', 'SellController');
    Route::get('sell-index', 'SellController@index')->name('sell.index');
    Route::get('sell-create-{pid}-{i}', 'SellController@create')->name('sell.create');
    Route::post('sell-store-{i}-{pid}', 'SellController@store')->name('sell.store');

});



