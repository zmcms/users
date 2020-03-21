<?php
namespace Zmcms\Users\Backend\Db;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;
use Request;
class Queries{
	/**
	 * SPRAWDZANIE DANYCH DO LOGOWANIA
	 */
	public static function check_login_data(array $data = []){
		$resultset = DB::table((Config('database.prefix')??'').'backend_users')
			->where('login', $data['u'])
			->select([
				'token',
				'login',
				'active',
				'login_try',
				'total_login_try',
				'login_tries',
				'total_login_tries',
			])
			->get();
		if(count($resultset) == 1){
			$pass = self::check_password($resultset[0]->token, $data['p']);
			if($pass){
				self::update_backend_user_after_correct_password($resultset[0]->token, $resultset);
				if($resultset[0]->active == '0')
					return 'account_inactive';
				Session::put('backend_user', [
					'token' 				=> $resultset[0]->token,
					'session_token' 		=> md5(rand(0, 1000)),
					'session_token_start' 	=> time(),
					'ip'					=> Request::ip(),
				]);
				return 'ok';
			}else{
				self::update_backend_user_after_wrong_password($resultset[0]->token, $resultset);
				return 'Błędny login lub hasło';
			}
		}
		return 'Błędny login lub hasło';
	}
	/**
	 * SPRAWDZANIE HASŁA, GDY JUŻ ZNALEZIONO UŻYTKOWNIKA
	 */
	public static function check_password($data, $password){
		$resultset = DB::table((Config('database.prefix')??'').'backend_users_passwords')
			->where('token', $data)
			->select([
				'token',
				'password',
			])
			->get();
		if(count($resultset) == 1){
			if(Hash::check($password, $resultset[0]->password)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	/**
	 * GDY PODANO BŁĘDNE HASŁO, AKTUALIZUJEMY ODPOWIENIE LICZNIKI
	 */	
	public static function update_backend_user_after_wrong_password($token, $resultset){
		DB::table((Config('database.prefix')??'').'backend_users')
			->where('token', $token)
			->update([
				'login_tries'		=> ($resultset[0]->login_tries + 1),
				'total_login_tries'	=> ($resultset[0]->total_login_tries + 1),
			]);
		if(($resultset[0]->login_try == ($resultset[0]->login_tries + 1) )|| ($resultset[0]->total_login_try == ($resultset[0]->total_login_tries + 1) )) {	self::block_backend_user_account($token, $resultset);
			self::reset_login_tries($token, $resultset);
		}
	}
	/**
	 * GDY PODANO PRAWIDŁOWE HASŁO, ZERUJEMY MNIEJSZY LICZNIK
	 */	
	public static function update_backend_user_after_correct_password($token, $resultset){
		DB::table((Config('database.prefix')??'').'backend_users')
			->where('token', $token)
			->update([
				'login_tries'		=> 0,
			]);
	}
	/**
	 * RESETOWANIE LICZNIKÓW POMYŁEK
	 */	
	public static function reset_login_tries($token, $resultset){
		DB::table((Config('database.prefix')??'').'backend_users')
			->where('token', $token)
			->update([
				'login_tries'		=> 0,
				'total_login_tries'	=> 0,
			]);
	}
	/**
	 * BLOKOWANIE KONTA UŻYTKOWNIKA BACKENDU
	 */	
	public static function block_backend_user_account($token, $resultset){
		DB::table((Config('database.prefix')??'').'backend_users')
			->where('token', $token)
			->update([
				'active'		=> 0,
			]);
	}
	/**
	 * POBIERANIE DANYCH KONTA UŻYTKOWNIKA
	 */	
	public static function get_user_data($token){
		return DB::table((Config('database.prefix')??'').'backend_users')
			->where('token', $token)
			->get();
	}

}





