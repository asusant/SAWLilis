<?php

  Route::group(['namespace' => 'App\Modules\Section\Controllers', 'middleware' => ['web']], function(){
    Route::resource('section', 'SectionController');
    Route::get('/details/section', 'SectionController@details')->name('section.ajax.index');
  });

  
