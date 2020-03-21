<?php
$prefix = Config('zmcms.main.backend_prefix');

Route::middleware(['BackendUser'])->group(function () use ($prefix){
	Route::get($prefix.'/account', 'Zmcms\Users\Backend\Controllers\ZmcmsUsersController@zmcms_users_frm_panel')->name('backend_user_account');
	Route::get($prefix.'/logout', 'Zmcms\Users\Backend\Controllers\ZmcmsUsersController@zmcms_users_logout')->name('backend_user_logout');
});
