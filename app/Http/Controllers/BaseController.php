<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Modules\Privilege\Models\Privilege;
use App\Modules\UserLevel\Models\UserLevel;
use App\Modules\Module\Models\Module;
use App\Modules\GroupMenu\Models\GroupMenu;
use App\Modules\Menu\Models\Menu;
use App\Modules\User\Models\User;

class BaseController extends Controller
{

    public function __construct()
    {

    }

	public static function getMenuByLevel($level_id)
	{
		$menus = GroupMenu::with(['menu' => function ($query) use ($level_id){
								$query->with(['module' => function ($query2) use ($level_id){
									$query2->with(['privilege' => function ($query3) use ($level_id){
										$query3->where('level_id', $level_id);
										$query3->where('index', 1);
									}]);
									$query2->orderBy('priority', "ASC");
								}]);
								$query->orderBy('priority', "ASC");
							}])
							->orderBy('id', 'desc')
							->get();
		
		foreach ($menus as $key => $group) {
			foreach ($group->menu as $ke => $menu) {
				foreach ($menu->module as $k => $module) {
					$m = $module->privilege->pluck(['index'])->first();
					if ($m == 0) {
						$menus[$key]->menu[$ke]->module->forget($k);
					}
				}
				if ($menu->module->count() < 1) {
					$menus[$key]->menu->forget($ke);
				}
			}
			if ($group->menu->count() < 1) {
				$menus->forget($key);
			}
		}

		/*$menus = GroupMenu::leftJoin('menus', 'group_menus.id', 'menus.group_menu_id')
							->leftJoin('modules', 'menus.id', 'modules.menu_id')
							->leftJoin('privileges', 'modules.id', 'privileges.module_id')
							->where('privileges.level_id', session('level_id'))
							->where('privileges.index', 1)
							->whereNull('group_menus.deleted_at')
							->whereNull('menus.deleted_at')
							->whereNull('modules.deleted_at')
							->whereNull('privileges.deleted_at')
							->orderBy('group_menus.id', 'desc')
							->orderBy('menus.priority', 'asc')
							->orderBy('modules.priority', 'asc')
							->get([
								'group_menus.*',
								'menus.*',
								'modules.*',
								'privileges.*'
							]);
		*/

		return $menus;
	}

	public static function getAccess($level_id, $route)
	{
		$elm = explode('.', $route);

		$module = reset($elm);
		$action = end($elm);

		$access = Privilege::with('level')
							->whereHas('module', function ($query) use ($module) {
							    $query->where('route', $module);
							})
							->where($action, 1)
							->where('level_id', $level_id)
							->count();
		return $access;
	}

	public static function getDefaultLevel($user_id)
	{
		return UserLevel::where('user_id', $user_id)->orderBy('level_id', 'asc')->first();
	}

}
