<?php

  Route::group(['namespace' => 'App\Modules\Level\Controllers', 'middleware' => ['web']], function(){
    Route::resource('level', 'LevelController');
    Route::get('/details/level', 'LevelController@details')->name('level.ajax.index');
  });

  Route::namespace('App\Modules\Level\Controllers')->prefix('api')->name('api.')->middleware(['api'])->group(function () {
  #Route::apiResource('level', 'LevelApiController');
});
