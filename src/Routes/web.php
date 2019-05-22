<?php

Route::group([
        'middleware' => [
            'web', 'rb28dett.base', 'rb28dett.auth',
            'can:access,RB28DETT\Roles\Models\Role',
        ],
        'prefix'    => config('rb28dett.settings.base_url'),
        'namespace' => 'RB28DETT\Roles\Controllers',
        'as'        => 'rb28dett::',
    ], function () {
        // First the suplementor, then the resource
        // https://laravel.com/docs/5.4/controllers#resource-controllers
        Route::get('roles/{role}/permissions', 'RoleController@permissions')->name('roles.permissions');
        Route::post('roles/{role}/permissions', 'RoleController@updatePermissions')->name('roles.permissions.update');
        Route::get('roles/{role}/delete', 'RoleController@confirmDelete')->name('roles.destroy.confirm');
        Route::resource('roles', 'RoleController', ['except' => ['show']]);
    });
