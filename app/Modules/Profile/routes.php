<?php

  Route::group(['namespace' => 'App\Modules\Profile\Controllers', 'middleware' => ['web']], function(){
    Route::resource('profile', 'ProfileController');
    Route::get('/details/profile', 'ProfileController@details')->name('profile.ajax.index');
  });

  
