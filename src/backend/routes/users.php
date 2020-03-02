<?php

$prefix = Config('zmcms.main.backend_prefix');
Route::get($prefix.'/login', function (){return view('themes.zmcms.backend.zmcms_users_frm_login');});
Route::middleware(['BackendUser'])->group(function () use ($prefix){
	Route::get($prefix.'/panel', function (){return view('themes.zmcms.backend.zmcms_users_frm_login');});
});
