<?php

  Route::group(['namespace' => 'App\Modules\Menu\Controllers', 'middleware' => ['web']], function(){
    Route::resource('menu', 'MenuController');
    Route::get('/details/menu', 'MenuController@details')->name('menu.ajax.index');
  });

  Route::namespace('App\Modules\Menu\Controllers')->prefix('api')->name('api.')->middleware(['api'])->group(function () {
  #Route::apiResource('menu', 'MenuApiController');
});
