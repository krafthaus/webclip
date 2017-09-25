<?php

Route::post('/api/auth/login', 'Auth\LoginController@login');
//Route::post('/api/auth/register', 'Auth\RegisterController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/api/auth/me', 'Auth\MeController@me');
    Route::put('/api/auth/me', 'Auth\MeController@update');

    Route::get('/api/elements', 'ElementsController@index');

    Route::get('/api/websites', 'WebsitesController@index');
    Route::get('/api/websites/{website}', 'WebsitesController@show');

    Route::get('/api/{website}/pages', 'PagesController@index');
    Route::post('/api/{website}/pages', 'PagesController@store');
    Route::get('/api/{website}/pages/{page}', 'PagesController@show');
    Route::get('/api/{website}/pages/{page}/elements', 'PageElementsController@index');

    Route::get('/api/{website}/collections', 'CollectionsController@index');
    Route::get('/api/{website}/collections/{collection}', 'CollectionsController@show');
    Route::get('/api/{website}/collections/{collection}/entries', 'CollectionsController@entries');
});

Route::get('/', 'DashboardController@index');
Route::get('{view}', 'DashboardController@index')->where('view', '^(?!api).+');
