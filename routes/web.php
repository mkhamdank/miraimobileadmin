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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','MasterController@index')->name('login');
Route::post('/auth','MasterController@auth');
Route::get('/kuisioner_corona','MasterController@corona');
Route::get('check/employee_id','MasterController@checkEmployeeId');
Route::post('post/form', 'MasterController@postForm');
Route::post('post/reset_password', 'MasterController@resetPassword');
Route::post('post/update_emp', 'MasterController@updateEmp');
Route::get('/attendance','AttendanceController@index');
Route::get('index/getGrup','MasterController@getGrup');
Route::get('index/getEmployee','MasterController@getEmployee');
Route::get('index/getPengumuman','MasterController@getPengumuman');
Route::post('post/add_announcement', 'MasterController@addAnnouncement');
Route::get('index/delete_announcement','MasterController@deleteAnnouncement');