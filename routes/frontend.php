<?php

Route::get('css/style.css', 'StyleController@render');

// Catch-all resource routing.
Route::get('/{resource}', 'FrontendController@handle')->where('resource', '(.*)');
