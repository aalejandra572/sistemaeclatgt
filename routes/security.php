<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(UserController::class)->group(function () {
        Route::get('/users/index/{search?}', 'index')->name('users.index');
        Route::get('/users/new', 'new')->name('users.new');
        Route::post('/users/store', 'store')->name('users.store');
        Route::get('/users/edit/{user}', 'edit')->name('users.edit');
        Route::post('/users/update/{user}', 'update')->name('users.update');
        Route::get('/users/delete/{user}', 'delete')->name('users.delete');
        Route::post('/users/attachRoles/{user}', 'attachRoles')->name('users.attachRoles');
        Route::post('/users/updatePassword/{user}', 'updatePassword')->name('users.updatePassword');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/roles/index/{search?}', 'index')->name('roles.index');
        Route::get('/roles/new', 'new')->name('roles.new');
        Route::post('/roles/store', 'store')->name('roles.store');
        Route::get('/roles/edit/{role}', 'edit')->name('roles.edit');
        Route::post('/roles/update/{role}', 'update')->name('roles.update');
        Route::get('/roles/delete/{role}', 'delete')->name('roles.delete');
        Route::post('/roles/attachPermissions/{role}', 'attachPermissions')->name('roles.attachPermissions');
    });

    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permissions/index/{search?}', 'index')
        //->middleware('permission:show-permission')
        ->name('permissions.index');
        Route::get('/permissions/new', 'new')->name('permissions.new');
        Route::post('/permissions/store', 'store')->name('permissions.store');
        Route::get('/permissions/edit/{permission}', 'edit')->name('permissions.edit');
        Route::post('/permissions/update/{permission}', 'update')->name('permissions.update');
        Route::get('/permissions/delete/{permission}', 'delete')->name('permissions.delete');
    });
});