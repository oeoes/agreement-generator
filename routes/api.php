<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->group(function() {
    Route::post('/download', 'LetterController@dynamicDownloadSurat');
    Route::post('/download/storage', 'LetterController@downloadFromStorage');
    Route::post('/simpan', 'LetterController@storeSurat');
    Route::delete('/hapus', 'LetterController@hapusTemplate');
    Route::post('/view/doc', 'LetterController@getSurat');
    Route::get('/view', 'LetterController@viewSurat');
    Route::resource('/templates', 'TemplateController');
    Route::get('/templates/view/{id}', 'TemplateController@viewForUpdate');

    Route::resource('/header_footers', 'HeaderFooterController');
    Route::resource('/users', 'UserController');
    Route::resource('/logs', 'ActivityLogController');
    Route::post('/logs/onload/index', 'ActivityLogController@onLoadLog');
});

Route::post('/users/validate', 'UserController@checkUser');
Route::post('/users/insert', 'UserController@addInformation');
Route::post('/users/last-login', 'UserController@lastLogin');
Route::get('/users/credentials/{email}', 'UserController@getCredentials');
Route::post('sociallogin/{provider}', 'AuthController@socialLogin');