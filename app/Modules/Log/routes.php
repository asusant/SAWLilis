<?php

  Route::group(['namespace' => 'App\Modules\Log\Controllers', 'middleware' => ['web']], function(){
    Route::resource('log', 'LogController');
    Route::get('/details/log', 'LogController@details')->name('log.ajax.index');
  });

  Route::namespace('App\Modules\Log\Controllers')->prefix('api')->name('api.')->middleware(['api'])->group(function () {
  #Route::apiResource('log', 'LogApiController');
});
