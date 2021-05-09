<?php
namespace Zmcms\Users\Frontend\Db;
use Illuminate\Support\Facades\DB;
use Session;
use Request;
class Queries{
	private const TBL_FRON_USR = (Config('database.prefix')??'').'frontend_users';
	private const TBL_FRON_USR_PASSWORDS = (Config('database.prefix')??'').'frontend_users_passwords';
	
	/**
	 * REJESTRACJA NOWEGO UŻYTKOWNIKA W BAZIE DANYCH
	 */
	public static function user_register($data){
		$token = 'fu_'.hash ('sha256', date('Ymd').rand(0,1000));
		try{
			DB::beginTransaction();
			DB::table(TBL_FRON_USR)->insert([
				'token'				=> $token,
				'mail'				=> $data['mail'],
				'login'				=> $data['login'],
				'active'			=> 0, //Podczas rozpoczęcia procesu rejestracji uzytkownik nie jest aktywny
				'role_id'			=> $data['role_id'] ?? NULL,
				'name'				=> $data['name'],
				'last_name'			=> $data['last_name'],
				'nick'				=> $data['nick'] ?? NULL,
				'sex'				=> $data['sex'] ?? NULL,
				'ilustration'		=> $data['ilustration'] ?? NULL,
				'birthday'			=> $data['birthday'] ?? NULL,
				'confirmed'			=> 0, //Podczas rozpoczęcia procesu rejestracji uzytkownik nie jest potwierdzony
				'login_try'			=> $data['login_try'] ?? NULL,
				'total_login_try'	=> $data['total_login_try'] ?? NULL,
				'homepage'			=> $data['homepage'] ?? NULL,
			]);
			DB::table(TBL_FRON_USR_PASSWORDS)->insert([
				'token'		=> $token,
				'password'	=> password_hash($data['password'], PASSWORD_BCRYPT, ["cost" => 11]);
			]);
			DB::commit();
			return json_encode([
				'result'	=>	'ok',
				'code'		=>	'ok',
				'msg' 		=>	___('Użytkownik został zarejestrowany.'),
			]);
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return json_encode([
				'result'	=>	'error',
				'code'		=>	$e->getCode(),
				'msg' 		=>	___('Rejestracja zakończona niepowodzeniem.'),
			]);
		}
	}
}


/**
 * token
	mail
	login
	active
	role_id
	name
	last_name
	nick
	sex
	ilustration
	birthday
	confirmed
	login_try
	total_login_try
	homepage
 */
