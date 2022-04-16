<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => true]);



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');





    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductsController');

    Route::resource('jalan', 'JalanController');
    Route::delete('datas/destroy', 'JalanController@massDestroy')->name('jalan.massDestroy');


    Route::resource('jembatan', 'JembatanController');
    Route::delete('jembatans/destroy', 'JembatanController@massDestroy')->name('jembatan.massDestroy');

    Route::resource('pengguna', 'PenggunaController');
    Route::delete('penggunas/destroy', 'PenggunaController@massDestroy')->name('pengguna.massDestroy');
});
