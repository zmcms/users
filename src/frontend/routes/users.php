<?php
/**
 * Uzytkownik anonimowy (niezalogowany)
 */
$prefix = Config(Config('zmcms.frontend.theme_name').'.main.backend_prefix');
$frontend_prefix = Config(Config('zmcms.frontend.theme_name').'.main.frontend_prefix');
Route::middleware(['FrontendUser'])->group(function () {
	
	$prefix = Config(Config('zmcms.frontend.theme_name').'.main.backend_prefix');
	$frontend_prefix = Config(Config('zmcms.frontend.theme_name').'.main.frontend_prefix');
	Route::get($prefix.'/login', function (){return view('themes.'.Config('zmcms.frontend.theme_name').'.backend.zmcms_users_frm_login');})->name('backend_user_login');
	Route::post($prefix.'/zmcms_backend_user_login', 'Zmcms\Users\Backend\Controllers\ZmcmsUsersController@zmcms_backend_user_login')->name('backend_user_login');
	
	/**
	 * REJESRTACJA YŻYTKOWNIKA
	 */
	//Pierwsze uruchomienie
	Route::any($frontend_prefix.'/usr/register', 'Zmcms\Users\Frontend\Controllers\ZmcmsUsersController@user_register_frm');
	//Przetworzenie formularza
	// Route::any($frontend_prefix.'/usr/login', 'Zmcms\Users\Frontend\Controllers\ZmcmsUsersController@login_or_register');


	// Route::get($frontend_prefix.'/usr/home', 'Zmcms\Users\Frontend\Controllers\ZmcmsUsersController@user_home');


});
/**
 * Uzytkownik zalogowany
 */
Route::middleware(['FrontendLoggedInUser'])->group(function () {
	// return 'jestem';
	$prefix = Config(Config('zmcms.frontend.theme_name').'.main.backend_prefix');
	$frontend_prefix = Config(Config('zmcms.frontend.theme_name').'.main.frontend_prefix');
	
	Route::get($frontend_prefix.'/usr/home', 'Zmcms\Users\Frontend\Controllers\ZmcmsUsersController@user_home');


});
// Route::get($frontend_prefix.'/usr/home', 'Zmcms\Users\Frontend\Controllers\ZmcmsUsersController@user_home');
