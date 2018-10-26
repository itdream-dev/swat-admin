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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', 'HomeController@index')->name('dashboard');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// Route::get('/users/new', ['as' => 'admin.user.new', 'uses' => 'UserController@newUser']);
// Route::get('/users', ['as' => 'admin.users', 'uses' => 'UserController@users']);
// Route::get('/users/{id}', ['as' => 'admin.userEdit', 'uses' => 'UserController@editUser']);
// Route::delete('/users/{id}', ['uses' => 'UserController@destroy']);
// Route::post('/user', ['as' => 'admin.users', 'uses' => 'UserController@postEdit']);

Route::get('/devices/new', ['as' => 'admin.device.new', 'uses' => 'DeviceController@newDevice']);
Route::get('/devices', ['as' => 'admin.devices', 'uses' => 'DeviceController@devices']);
Route::get('/devices/{id}', ['as' => 'admin.deviceEdit', 'uses' => 'DeviceController@editDevice']);
Route::delete('/devices/{id}', ['uses' => 'DeviceController@destroy']);
Route::post('/device', ['as' => 'admin.devices', 'uses' => 'DeviceController@postEdit']);

Route::get('/settings', 'SettingController@settings')->name('settings');
Route::post('/setting', ['as' => 'admin.setting.post', 'uses' => 'SettingController@postSetting']);
