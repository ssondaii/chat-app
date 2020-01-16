<?php
Route::group(['prefix' => 'users'], function (){
    Route::get('/', 'UserController@index')->name('users.index');
    Route::post('/store', 'UserController@store')->name('users.store');
    Route::post('/delete', 'UserController@delete')->name('users.delete');
});
