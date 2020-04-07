<?php
/**
 * KONFIGURACJA PAKIETU zmcms\users
 * ROLE UŻYTKOWNIKÓW
**/
return [
	'superadmins' => [
		'name' => 'Superadmini',
		'description' => 'Użytkownicy należący do tej grupy mogą dosłownie i w przenośni wszystko.',
	],
	'admins' => [
		'name' => 'Admini',
		'description' => 'Użytkownicy należący do tej grupy mogą wszystko za wyjątkiem usuwania innych adminów i superadminów. Mogą usuwać użytkowników o mniejszych uprawnieniach',
	],
	'*' => [
		'name' => 'Wszyscy',
		'description' => 'Grupa o najmniejszych uprawnieniach. Tzw. "Wszyscy" zalogowani i niezalogowani',
	],
];
