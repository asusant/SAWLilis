<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use App\Modules\Config\Models\Config;

class VariableProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

		view()->composer('*', function ($view)
	    {
			$app_name = Config::getConfig('app_name')[0];
			$app_developer = Config::getConfig('app_developer')[0];
			$app_logo = Config::getConfig('app_icon')[0];
			$app_skin = Config::getConfig('app_skin')[0];
			$menu = BaseController::getMenuByLevel(session('level_id'));
			// $levels = BaseController::getLevelsNameByIdUser(Auth::id());
	        $view->with('menus', $menu);
	        // $view->with('levels', $levels);
	        $view->with('app_skin', $app_skin);
	        $view->with('app_name', $app_name);
	        $view->with('app_developer', $app_developer);
	        $view->with('app_logo', $app_logo);

	    });


        // View::share('menus', $menu);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
