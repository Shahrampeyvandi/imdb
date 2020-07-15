<?php

Route::get('/admin/login', 'Panel\LoginController@Login')->name('Admin.Login');
Route::post('/admin/login', 'Panel\LoginController@Verify')->name('Admin.Login');

Route::group(['prefix' => 'panel', 'middleware' => ['admin']], function () {
    Route::get('/', 'Panel\DashboardController@Index')->name('BaseUrl');
    Route::get('/logout', function () {
        Auth::guard('admin')->logout();
        return redirect()->route('Admin.Login');
    })->name('logout');
    Route::get('upload', 'Panel\UploadController@Add')->name('Panel.UploadFile');
    Route::post('upload', 'Panel\UploadController@SavePost')->name('Panel.UploadFile');
    Route::put('upload', 'Panel\UploadController@EditPost')->name('Panel.UploadFile');
    Route::get('users', 'Panel\UserController@List')->name('Panel.UserList');
    Route::delete('user/delete', 'Panel\UserController@Delete')->name('Panel.DeleteUser');
    Route::get('files/list', 'Panel\UploadController@List')->name('Panel.FileList');
    Route::get('files/{post}', 'Panel\UploadController@Edit')->name('Panel.FileEdit');
    Route::post('actor/insert', 'Panel\ActorsController@Insert')->name('Panel.Actor.Insert');
    Route::get('upload/video', 'Panel\UploadController@UploadVideo')->name('Panel.UploadVideo');
    Route::post('upload/video', 'Panel\UploadController@SaveVideo')->name('Panel.UploadVideo');
    Route::get('upload/episode', 'Panel\UploadController@AddEpisode')->name('Panel.UploadEpisode');
    Route::post('upload/episode', 'Panel\UploadController@SaveEpisode')->name('Panel.UploadEpisode');
    Route::delete('post/delete', 'Panel\UploadController@DeletePost')->name('Panel.DeletePost');
    Route::delete('video/delete', 'Panel\UploadController@DeleteVideo')->name('Panel.DeleteVideo');
    Route::get('plans/add', 'Panel\PlanController@Add')->name('Panel.AddPlan');
    Route::post('plans/add', 'Panel\PlanController@Save')->name('Panel.AddPlan');
    Route::get('plans/{id}/edit', 'Panel\PlanController@Edit')->name('Panel.EditPlan');
    Route::put('plans/{id}/edit', 'Panel\PlanController@SaveEdit')->name('Panel.EditPlan');
    Route::get('plans/list', 'Panel\PlanController@List')->name('Panel.PlanList');
    Route::delete('plans/delete', 'Panel\PlanController@Delete')->name('Panel.DeletePlan');
    Route::delete('post/image/delete', 'Panel\UploadController@DeleteImage')->name('Panel.DeleteImage');
    Route::get('discounts', 'Panel\DiscountController@List')->name('Panel.DiscountList');
    Route::post('discount/save', 'Panel\DiscountController@Save')->name('Panel.Discount.Insert');
    Route::get('discount/{id}/edit', 'Panel\DiscountController@Edit')->name('Panel.Discount.Edit');
    Route::put('discount/{id}/edit', 'Panel\DiscountController@SaveEdit')->name('Panel.Discount.Edit');
    Route::get('sendmessage', 'Panel\MessageController@Add')->name('Panel.SendMessage');
    Route::post('sendmessage', 'Panel\MessageController@Send')->name('Panel.SendMessage');
    Route::get('blog/add', 'Panel\BlogController@Add')->name('Panel.AddBlog');
    Route::post('upload-image', 'Panel\BlogController@UploadImage')->name('UploadImage');
    Route::post('blog/add', 'Panel\BlogController@Save')->name('Panel.AddBlog');
    Route::get('blogs', 'Panel\BlogController@List')->name('Panel.BlogList');
    Route::delete('blog/delete', 'Panel\BlogController@DeleteBlog')->name('Panel.DeleteBlog');

});
