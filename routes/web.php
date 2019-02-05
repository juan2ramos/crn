<?php
Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@createLead')->name('createLead');
