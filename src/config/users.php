<?php
/**
 * KONFIGURACJA PAKIETU zmcms\users
**/
return [
	'lang' => [
		'pl' =>	['name' => 'polski',  'iso' => 'PL', 'flag' => 'pl.png'],
		'en' =>	['name' => 'English', 'iso' => 'EN', 'flag' => 'en.png'],
	],
	'frontend_user'	=>[
		'max_login_try' 		=> 5,
		'max_total_login_try'	=>50,
		'default_role_id'		=>'guest',
		'time_refresh'			=>60,
	],
	'backend_user'	=>[
		'max_login_try' 		=> 5,
		'max_total_login_try'	=>50,
		'default_role_id'		=>'guest',
		'time_refresh'			=>60,
	],
];
