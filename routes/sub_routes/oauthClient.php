<?php
Route::group(['prefix' => 'clients'], function (){
    Route::get('/', 'ClientController@index')->name('clients.index');
    Route::post('/store', 'ClientController@store')->name('clients.store');
    Route::post('/update', 'ClientController@update')->name('clients.update');
    Route::post('/delete', 'ClientController@delete')->name('clients.delete');
});
