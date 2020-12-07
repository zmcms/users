<?php
/**
 * KONFIGURACJA PAKIETU zmcms\users
 * ROLE UŻYTKOWNIKÓW FRONTENDU
**/
return [
	'*' => [
		'name' => 'Wszyscy',
		'description' => 'Grupa o najmniejszych uprawnieniach. Tzw. "Wszyscy" zalogowani i niezalogowani',
	],
	'logged_in' => [
		'name' => 'Zalogowani',
		'description' => 'Grupa mająca dostęp do materiałów tylko dla zalogowanych.',
	],
];
