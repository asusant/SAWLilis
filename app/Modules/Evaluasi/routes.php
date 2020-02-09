<?php

  Route::group(['namespace' => 'App\Modules\Evaluasi\Controllers', 'middleware' => ['web']], function(){
    Route::resource('evaluasi', 'EvaluasiController');
    Route::get('/details/evaluasi', 'EvaluasiController@details')->name('evaluasi.ajax.index');

    Route::get('evaluasi/show/perhitungan', 'EvaluasiController@perhitungan')->name('evaluasi.perhitungan.custom');
  });

  
