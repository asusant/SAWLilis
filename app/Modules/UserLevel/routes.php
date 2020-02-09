<?php

  Route::group(['namespace' => 'App\Modules\UserLevel\Controllers', 'middleware' => ['web']], function(){
    Route::resource('user-level', 'UserLevelController');
    Route::get('/details/user-level', 'UserLevelController@details')->name('user-level.ajax.index');
  });

  Route::namespace('App\Modules\UserLevel\Controllers')->prefix('api')->name('api.')->middleware(['api'])->group(function () {
  #Route::apiResource('userlevel', 'UserLevelApiController');
});
