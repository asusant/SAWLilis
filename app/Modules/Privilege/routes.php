<?php

  Route::group(['namespace' => 'App\Modules\Privilege\Controllers', 'middleware' => ['web']], function(){
    Route::resource('privilege', 'PrivilegeController');
    Route::get('/details/privilege', 'PrivilegeController@details')->name('privilege.ajax.index');
  });

  Route::namespace('App\Modules\Privilege\Controllers')->prefix('api')->name('api.')->middleware(['api'])->group(function () {
  #Route::apiResource('privilege', 'PrivilegeApiController');
});
