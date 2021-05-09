<?php
$prefix = Config('zmcms.main.backend_prefix');
// echo 'users<br />';
Route::middleware(['BackendUser'])->group(function () use ($prefix){
	Route::get($prefix.'/account', 'Zmcms\Users\Backend\Controllers\ZmcmsUsersController@zmcms_users_frm_panel')->name('backend_user_account');
	Route::get($prefix.'/logout', 'Zmcms\Users\Backend\Controllers\ZmcmsUsersController@zmcms_users_logout')->name('backend_user_logout');
	Route::post($prefix.'/zmcms_users_frm_panel_save', 'Zmcms\Users\Backend\Controllers\ZmcmsUsersController@zmcms_users_frm_panel_save')->name('backend_user_account');
	Route::post($prefix.'/zmcms_users_frm_panel_new_user', 'Zmcms\Users\Backend\Controllers\ZmcmsUsersController@zmcms_users_frm_panel_new_user')->name('backend_user_account');
	Route::post($prefix.'/zmcms_users_frm_panel_delete_user', 'Zmcms\Users\Backend\Controllers\ZmcmsUsersController@zmcms_users_frm_panel_delete_user')->name('backend_user_account');
});
