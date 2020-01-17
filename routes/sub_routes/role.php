<?php
Route::group(['prefix' => 'roles'], function (){
    Route::get('/', 'RoleController@index')->name('roles.index');
    Route::post('/store', 'RoleController@store')->name('roles.store');
    Route::post('/delete', 'RoleController@delete')->name('roles.delete');
});
