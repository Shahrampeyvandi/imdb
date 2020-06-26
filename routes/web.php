<?php
Route::get('/', 'Panel\DashboardController@Index')->name('BaseUrl');
Route::get('/panel/upload', 'Panel\UploadController@Add')->name('Panel.UploadFile');
Route::post('/panel/upload', 'Panel\UploadController@SavePost')->name('Panel.UploadFile');
Route::get('/panel/users', 'Panel\UserController@List')->name('Panel.UserList');
