<?php
Route::group(['prefix' => 'permissions'], function (){
    Route::get('/', 'PermissionController@index')->name('permissions.index');
    Route::post('/store', 'PermissionController@store')->name('permissions.store');
    Route::post('/delete', 'PermissionController@delete')->name('permissions.delete');
});
