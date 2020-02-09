<?php

  Route::group(['namespace' => 'App\Modules\Config\Controllers', 'middleware' => ['web']], function(){
    Route::resource('config', 'ConfigController');
    Route::get('/details/config', 'ConfigController@details')->name('config.ajax.index');
  });

  Route::namespace('App\Modules\Config\Controllers')->prefix('api')->name('api.')->middleware(['api'])->group(function () {
  #Route::apiResource('config', 'ConfigApiController');
});
