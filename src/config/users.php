<?php
/**
 * KONFIGURACJA PAKIETU zmcms\users
**/
return [
	'lang' => [
		'pl' =>	['name' => 'polski',  'iso' => 'PL', 'flag' => 'pl.png'],
		'en' =>	['name' => 'English', 'iso' => 'EN', 'flag' => 'en.png'],
	]
	'frontend_user'	=>[
		'max_login_try' 		=> 5,
		'max_total_login_try'	=>50,
		'default_role_id'		='guest',
		'default_home_page'		=>['pl'=>'konto', 'en'=>'account',],
		'default_login_page'	=>['pl'=>'logowanie', 'en'=>'login',],
	],
	'backend_user'	=>[
		'max_login_try' 		=> 5,
		'max_total_login_try'	=>50,
		'default_role_id'		='guest',
		'default_home_page'		=>['pl'=>'konto', 'en'=>'account',],
		'default_login_page'	=>['pl'=>'logowanie', 'en'=>'login',],
	],
];
