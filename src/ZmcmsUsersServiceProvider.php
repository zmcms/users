<?php
namespace Zmcms\Users;
use Illuminate\Support\ServiceProvider;
use View;
class ZmcmsUsersServiceProvider extends ServiceProvider{

	public function register(){
		$this->app->make('Zmcms\Users\Backend\Controllers\ZmcmsUsersController');
		$this->app->make('Zmcms\Users\Frontend\Controllers\ZmcmsUsersController');
		require_once(__DIR__.'/helpers.php');
	}

	public function boot(){
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
