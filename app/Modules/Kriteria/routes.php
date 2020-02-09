<?php

  Route::group(['namespace' => 'App\Modules\Kriteria\Controllers', 'middleware' => ['web']], function(){
    Route::resource('kriteria', 'KriteriaController');
    Route::get('/details/kriteria', 'KriteriaController@details')->name('kriteria.ajax.index');
  });

  
