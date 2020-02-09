<?php

  Route::group(['namespace' => 'App\Modules\GroupMenu\Controllers', 'middleware' => ['web']], function(){
    Route::resource('group-menu', 'GroupMenuController');
    Route::get('/details/group-menu', 'GroupMenuController@details')->name('group-menu.ajax.index');
  });

  Route::namespace('App\Modules\GroupMenu\Controllers')->prefix('api')->name('api.')->middleware(['api'])->group(function () {
  #Route::apiResource('groupmenu', 'GroupMenuApiController');
});
