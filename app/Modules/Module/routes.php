<?php

  Route::group(['namespace' => 'App\Modules\Module\Controllers', 'middleware' => ['web']], function(){
    Route::resource('module', 'ModuleController');
    Route::get('/details/module', 'ModuleController@details')->name('module.ajax.index');
  });
  
  Route::namespace('App\Modules\Module\Controllers')->prefix('api')->name('api.')->middleware(['api'])->group(function () {
  #Route::apiResource('module', 'ModuleApiController');
});
