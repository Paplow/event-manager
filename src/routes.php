<?php

Route::group([
    'prefix' => 'event',
    'namespace' => 'Paplow\EventManager\Http\Controllers',
    'middleware' => 'web'
], function () {

    Route::get('/', 'EventController@index')->name('event.index');
    Route::post('/', 'EventController@store')->name('event.store');
    Route::get('/all', 'EventController@get_events')->name('event.all');
    Route::get('/{event}/delete', 'EventController@destroy')->name('event.delete');
    Route::get('/{event}/edit', 'EventController@edit')->name('event.edit');
    Route::post('/{event}/update', 'EventController@update')->name('event.update');

});
