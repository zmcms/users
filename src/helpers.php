<?php

/**
 * WALIDACJA FORMULARZA REJESTRACJI UŻYTKOWNIKA FRONTENDU
 */

function zmcms_frontend_user_register_validation($data){
	$err = [];
	if(!email_validate(($data['mail'] ?? null))) $err[] = ___('Niepoprawny e-mail');
	if($data['password'] != $data['password_confirm']) $err[] = ___('Pomyłka podczas ustalania hasła. Hasło i jego potwierdzenie muszą być identyczne.');
	if(!isset($data['gdpr_agreement'])) $err[] = ___('Musisz sie zgodzić na warunki polityki RODO');	
	return $err;
}