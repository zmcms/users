<?php
namespace Zmcms\Users\Frontend\Middleware;
use Closure;use Session;use URL;class ZmcmsUsers
{
	public function handle($request, Closure $next){
				session()->regenerate();
		Session::put('theme_name', Config('zmcms.main.theme_name'));
		if(!$this->isLoggedIn()){
				return redirect(Config(Config('zmcms.frontend.theme_name').'.main.frontend_prefix').'/usr/login');
		}
		return $next($request);
		return $next($request);
	}
	private function isLoggedIn(){
		if(!Session::has('frontend_user')){
			return false;
		}else{
			return true;
		};
	}
}

/**
 * 
 	public function handle($request, Closure $next){
		session()->regenerate();
		Session::put('theme_name', Config('zmcms.main.theme_name'));
		if(!$this->isLoggedIn()){
				return redirect(Config('zmcms.main.frontend_prefix').'/login');
		}
		return $next($request);
	}
	private function isLoggedIn(){
		if(!Session::has('frontend_user')){
			return false;
		}else{
			return true;
		};
	}
 */