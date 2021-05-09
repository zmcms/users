<?php
namespace Zmcms\Users;
use Illuminate\Support\ServiceProvider;
use View;
use Config;
class ZmcmsUsersServiceProvider extends ServiceProvider{

	public function register(){
		$this->app->make('Zmcms\Users\Backend\Controllers\ZmcmsUsersController');
		$this->app->make('Zmcms\Users\Frontend\Controllers\ZmcmsUsersController');
		require_once(__DIR__.'/helpers.php');
	}

	public function boot(){
		$this->app['router']->middlewareGroup('FrontendLoggedInUser', []);
		if(Config::has(Config('zmcms.frontend.theme_name').'.middleware')){
			$m=Config(Config('zmcms.frontend.theme_name').'.middleware.frontend_user_logged_in');
			foreach($m as $n)$this->app['router']->pushMiddlewareToGroup('FrontendLoggedInUser', $n);
		}
		// Ładowanie routiongów frontendu
		$mod_path = base_path().DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR;
		if(is_array(Config(Config('zmcms.frontend.theme_name').'.routes.frontend'))){
			foreach(Config(Config('zmcms.frontend.theme_name').'.routes.frontend') as $r){
				$this->loadRoutesFrom($mod_path.$r);
			}	
		}
		// $this->loadRoutesFrom(__DIR__.DIRECTORY_SEPARATOR.'backend'.DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'users.php');
		// $this->loadRoutesFrom(__DIR__.DIRECTORY_SEPARATOR.'backend'.DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'users_console.php');
		// $this->loadRoutesFrom(__DIR__.DIRECTORY_SEPARATOR.'frontend'.DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'users.php');
		$this->loadMigrationsFrom(__DIR__.'/migrations');
		$this->publishes([
			__DIR__.'/backend/views' => base_path('resources/views/themes/zmcms/backend'),
			__DIR__.'/frontend/views' => base_path('resources/views/themes/zmcms/frontend'),
			__DIR__.'/config' => base_path('config/zmcms'),
			__DIR__.'/backend/css' => base_path('public/themes/zmcms/backend/css'),
			__DIR__.'/frontend/css' => base_path('public/themes/zmcms/frontend/css'),
			__DIR__.'/backend/js' => base_path('public/themes/zmcms/backend/js'),
			__DIR__.'/frontend/js' => base_path('public/themes/zmcms/frontend/js'),
		]);
		View::addLocation(__DIR__.DIRECTORY_SEPARATOR.'backend'.DIRECTORY_SEPARATOR.'views');
		View::addLocation(__DIR__.DIRECTORY_SEPARATOR.'frontend'.DIRECTORY_SEPARATOR.'views');
	}

}
