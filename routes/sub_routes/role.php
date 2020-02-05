<?php
Route::group(['prefix' => 'roles'], function (){
    Route::get('/', 'RoleController@index')->name('roles.index');
    Route::post('/store', 'RoleController@store')->name('roles.store');
    Route::post('/delete', 'RoleController@delete')->name('roles.delete');
    Route::post('/edit-role-permission', 'RoleController@editRolePermission')->name('roles.edit_role_permission');
    Route::post('/update-role-permission', 'RoleController@updateRolePermission')->name('roles.update_role_permission');
});
