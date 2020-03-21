<?php
Route::middleware(['FrontendUser'])->group(function () {
	$prefix = Config('zmcms.main.backend_prefix');
	Route::get($prefix.'/login', function (){return view('themes.zmcms.backend.zmcms_users_frm_login');})->name('backend_user_login');
	Route::post($prefix.'/zmcms_backend_user_login', 'Zmcms\Users\Backend\Controllers\ZmcmsUsersController@zmcms_backend_user_login')->name('backend_user_login');

});
