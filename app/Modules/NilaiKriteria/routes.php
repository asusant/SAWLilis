<?php

  Route::group(['namespace' => 'App\Modules\NilaiKriteria\Controllers', 'middleware' => ['web']], function(){
    Route::resource('nilai-kriteria', 'NilaiKriteriaController')->names([
        'index' => 'kriteria.nilai-kriteria.index',
        'create' => 'kriteria.nilai-kriteria.create',
        'store' => 'kriteria.nilai-kriteria.store',
        'show' => 'kriteria.nilai-kriteria.show',
        'edit' => 'kriteria.nilai-kriteria.edit',
        'update' => 'kriteria.nilai-kriteria.update',
        'destroy' => 'kriteria.nilai-kriteria.destroy',
    ]);
    Route::get('/details/nilai-kriteria/{kriteria}', 'NilaiKriteriaController@details')->name('kriteria.nilai-kriteria.ajax.index');
  });


