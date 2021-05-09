<?php
namespace Zmcms\Users\Frontend\Controllers;
use Illuminate\Http\Request;
use Zmcms\Users\Frontend\Db\Queries as Q; 
use Session;
class ZmcmsUsersController extends \App\Http\Controllers\Controller
{	
	public function user_home(){

	}
	public function login_or_register(Request $request){
		$settings=[
			'title'	=> ___('Rejestracja konta użytkownika'),
			'action' => 'create',
			'btnsave' => 'Zarejestruj',
		];
		$data = ['post'=>$request->all()];
		return view('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.frontend.users.login_or_register_frm', compact('settings', 'data'));
	}
	
	public function user_register_frm(Request $request){
		$err = $msg = [];
		$settings=[
			'title'	=> ___('Rejestracja konta użytkownika'),
			'action' => 'create',
			'btnsave' => 'Zarejestruj',
		];
		$data = ['post'=>arr_sanitize($request->all())];

		//WALIDACJA
		if($data['post']!=[]){
			$err = zmcms_frontend_user_register_validation($data['post']);
			if($err == []) $data['result'] = Q::user_register($data);
		}
		//ZAPIS DANYCH



		return view('themes.'.(Config('zmcms.frontend.theme_name') ?? 'zmcms').'.frontend.users.register_frm', compact('settings', 'data', 'err'));
	}
	private function cost(){
		$timeTarget = .09; // 50 milliseconds 

		$cost = 7;
		do {
		    $cost++;
		    $start = microtime(true);
		    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
		    $end = microtime(true);
		} while (($end - $start) < $timeTarget);
		
		return $cost;
	}
}


/**
 *  
 [post] => Array
        (
            [MAX_FILE_SIZE] => 4194304
            [mail] => pszkudlarek@zoltanmultimedia.pl
            [login] => superadmin
            [password] => superadmin
            [password_confirm] => superadmin
            [sex] => M
            [name] => Piotr
            [last_name] => Szkudlarek
            [gdpr_agreement] => on
        )
 */