<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;

class Authorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	$routeRequest = Route::getRoutes()->match($request)->getName();

		$except_route = array('login', 'login.post','logout');

		if(Auth::check()){
			if(!in_array($routeRequest, $except_route)){

				$level_id = session('level_id');
				$access = BaseController::getAccess($level_id, $routeRequest);
        
				if($access == false){
					abort("403", "This Content is not available in Your Country!");
				}
			}
		}else{
			if(in_array($routeRequest, $except_route)){
				return $next($request);
			}else{
				return redirect(route('login'));
			}
		}

		return $next($request);
    }
}
