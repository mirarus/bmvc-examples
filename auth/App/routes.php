<?php

use BMVC\Libs\Route;

Route::get(null, ['Main', 'index']);

Route::middleware('Auth')->group(function () {
  Route::prefix('admin')->group(function () {

    Route::get(null, ['Admin\Main', 'index']);

    Route::prefix('admin/users')->group(function () {
      Route::get(null, ['Admin\User', 'index']);
      Route::get('add', ['Admin\User', 'add']);
      Route::get('edit/:id', ['Admin\User', 'edit']);
      Route::post('get', ['Admin\User', '_post_get']);
      Route::post('delete', ['Admin\User', '_post_delete']);
      Route::post('add', ['Admin\User', '_post_add']);
      Route::post('edit', ['Admin\User', '_post_edit']);
    });
  });

  Route::get('logout', ['Auth', 'logout']);
  Route::post('auth/signin', ['Auth', '_post_signin']);
  Route::post('auth/signup', ['Auth', '_post_signup']);
  Route::post('auth/change', ['Auth', '_post_change']);
});