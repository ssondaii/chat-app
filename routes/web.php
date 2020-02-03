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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'admin', 'middleware' => ['auth']], function () {

    // Clients
    require_once('sub_routes/oauthClient.php');
    // Users
    require_once('sub_routes/user.php');
    // Roles
    require_once('sub_routes/role.php');
    // Permissions
    require_once('sub_routes/permission.php');
});
