<?php
namespace Zmcms\Users\Backend\Middleware;
use Closure;
use Session;
use URL;
class ZmcmsUsers
{
	public function handle($request, Closure $next){
		session()->regenerate();
		Session::put('theme_name', Config('zmcms.main.theme_name'));
		if(!$this->isLoggedIn()){
				return redirect(Config('zmcms.main.backend_prefix').'/login');
		}
		return $next($request);
	}
	private function isLoggedIn(){
		if(!Session::has('backend_user')){
			return false;
		}else{
			return true;
		};
	}
}
