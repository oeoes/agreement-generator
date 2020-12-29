<?php

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
// Route::get('/', 'SpaController@index')->where('any', '.*');
// Route::get('/update/{any}', 'SpaController@index')->where('any', '.*');
// Route::get('/view/{any}', 'SpaController@index')->where('any', '.*');
// Route::get('/user', 'SpaController@index')->where('any', '.*');
// Route::get('/docs', 'SpaController@index')->where('any', '.*');
// Route::get('/template/{any}', 'SpaController@index')->where('any', '.*');
// Route::get('/template', 'SpaController@index')->where('any', '.*');
// Route::get('/login', 'SpaController@index')->where('any', '.*');
// Route::get('/custom', 'SpaController@index')->where('any', '.*');