<?php
Route::get('/', 'Panel\DashboardController@Index')->name('BaseUrl');
Route::get('/admin/login', 'Panel\LoginController@Login')->name('Admin.Login');
Route::post('/admin/login', 'Panel\LoginController@Verify')->name('Admin.Login');

Route::get('/testapi', 'Panel\ImdbController@getmoviedetail')->name('Test.Api');

// , 'middleware' => ['admin']
Route::group(['prefix' => 'panel'], function () {
    Route::get('upload', 'Panel\UploadController@Add')->name('Panel.UploadFile');
    Route::post('upload', 'Panel\UploadController@SavePost')->name('Panel.UploadFile');
    Route::put('upload', 'Panel\UploadController@EditPost')->name('Panel.UploadFile');
    Route::get('users', 'Panel\UserController@List')->name('Panel.UserList');
    Route::get('files/list', 'Panel\UploadController@List')->name('Panel.FileList');
    Route::get('files/{post}', 'Panel\UploadController@Edit')->name('Panel.FileEdit');
    Route::post('actor/insert', 'Panel\ActorsController@Insert')->name('Panel.Actor.Insert');
    Route::get('upload/video', 'Panel\UploadController@UploadVideo')->name('Panel.UploadVideo');
    Route::post('upload/video', 'Panel\UploadController@SaveVideo')->name('Panel.UploadVideo');
    Route::delete('post/delete', 'Panel\UploadController@DeletePost')->name('Panel.DeletePost');
    Route::delete('video/delete', 'Panel\UploadController@DeleteVideo')->name('Panel.DeleteVideo');
    Route::get('plans/add', 'Panel\PlanController@Add')->name('Panel.AddPlan');
    Route::post('plans/add', 'Panel\PlanController@Save')->name('Panel.AddPlan');  
    Route::get('plans/list', 'Panel\PlanController@List')->name('Panel.PlanList');  
    Route::delete('plans/delete', 'Panel\PlanController@Delete')->name('Panel.DeletePlan');  

});
