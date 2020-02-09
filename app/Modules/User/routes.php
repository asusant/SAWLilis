<?php

  Route::group(['namespace' => 'App\Modules\User\Controllers', 'middleware' => ['web']], function(){
    Route::resource('user', 'UserController');
    Route::get('/details/user', 'UserController@details')->name('user.ajax.index');
  });

  Route::namespace('App\Modules\User\Controllers')->prefix('api')->name('api.')->middleware(['api'])->group(function () {
  Route::apiResource('user', 'UserApiController');
});
