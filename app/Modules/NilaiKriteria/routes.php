<?php

  Route::group(['namespace' => 'App\Modules\NilaiKriteria\Controllers', 'prefix' => 'kriteria.', 'middleware' => ['web']], function(){
    Route::resource('nilai-kriteria', 'NilaiKriteriaController');
    Route::get('/details/nilai-kriteria/{kriteria}', 'NilaiKriteriaController@details')->name('nilai-kriteria.ajax.index');
  });


