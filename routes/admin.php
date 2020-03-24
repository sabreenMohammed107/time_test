<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 
|
*/
Route::group(['namespace'=>'Admin'],function () { 
    Route::get('/admin', 'MasterAdminController@index')->name('admin');
});

Route::get('admin-login', 'Auth\loginAdminController@showLoginAdminForm');
Route::post('admin-login', 'Auth\loginAdminController@login')->name('admin-login');
Route::post('admin-logout', 'Auth\loginAdminController@logout')->name('admin-logout');


