<?php
namespace Zmcms\WebsiteNavigations;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades;
use Hash;
$token = hash('sha256', rand(0, 100456));
$backend_user = [
	[
		'token'				=> $token,
		'mail'				=> 'kontakt@l-bit.pl',
		'login'				=> 'superadmin',
		'active'			=> 1,
		'role_id'			=> null,
		'name'				=> 'superadmin',
		'last_name'			=> 'superadmin',
		'nick'				=> null,
		'sex'				=> 'NS',
		'ilustration'		=> null,
		'birthday'			=> null,
		'confirmed'			=> 1,
		'login_try'			=> 3,
		'total_login_try'	=> 50,
		'login_tries'		=> 0,
		'total_login_tries'	=> 0,
		'homepage'			=> Config('zmcms.main.backend_prefix').'/panel',
	]
];

$backend_user_password = [
	[
		'token'				=> $token,
		'password'			=> Hash::make('superadmin'),
	]
];


$tblNamePrefix=(Config('database.prefix')??'');
$tblName=$tblNamePrefix.'backend_users';

foreach($backend_user as $a){
	DB::table($tblName)->insert([ 'token' => $a['token'], 'mail' => $a['mail'], 'login' => $a['login'], 'active' => $a['active'], 'role_id' => $a['role_id'], 'name' => $a['name'], 'last_name' => $a['last_name'], 'nick' => $a['nick'], 'sex' => $a['sex'], 'ilustration' => $a['ilustration'], 'birthday' => $a['birthday'], 'confirmed' => $a['confirmed'], 'login_try' => $a['login_try'], 'total_login_try' => $a['total_login_try'], 'login_tries' => $a['login_tries'], 'total_login_tries' => $a['total_login_tries'], 'homepage' => $a['homepage'],]);
};


$tblName=$tblNamePrefix.'backend_users_passwords';
foreach($backend_user_password as $a){
	DB::table($tblName)->insert([
		'token' => $a['token'],
		'password' => $a['password'],
	]);
};
