<?php

  Route::group(['namespace' => 'App\Modules\Alternatif\Controllers', 'middleware' => ['web']], function(){
    Route::resource('alternatif', 'AlternatifController');
    Route::get('/details/alternatif', 'AlternatifController@details')->name('alternatif.ajax.index');
  });

  
