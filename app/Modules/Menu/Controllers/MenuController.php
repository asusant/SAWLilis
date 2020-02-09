<?php

namespace App\Modules\Menu\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Menu\Models\Menu;
use App\Modules\GroupMenu\Models\GroupMenu;
use App\Modules\Log\Models\Log;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Menu::menu.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        DB::statement(DB::raw('set @no=0'));
        $model = Menu::with('group_menu')->select([DB::raw('@no  := @no  + 1 AS no'), 'menus.*']);
        $data = new Datatables;
        return $data->eloquent($model)
                ->editColumn('group_menu_id', function($data){
                    return $data->group_menu->group_name;
                })
                ->editColumn('icon', function($data){
                    return '<span class="'.$data->icon.'"></span> ' .$data->icon;
                })
                ->addColumn('action', function($data){
                  return '<td>
                      <a href="'. route('menu.show', $data->id) .'" title="View Menu"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="'. route('menu.edit', $data->id) .'" title="Edit Menu"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      <form method="POST" action="'. route('menu.destroy', $data->id) .'" accept-charset="UTF-8" style="display:inline">
                          '.method_field("DELETE").'
                          '.csrf_field().'
                          <a href="javascript:void(0)" onclick="delete_item(this);return false;" id="delete-item" class="btn btn-outline-danger btn-sm" title="Delete Menu" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                      </form>
                  </td>';
                })
                ->escapeColumns('[*]')
                ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $menu['groupMenus'] = GroupMenu::get(['group_name', 'id']);
        return view('Menu::menu.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'group_menu_id' => 'required|string',
			'menu' => 'required|string',
			'icon' => 'required|string|max:50',
			'priority' => 'required|numeric'
		]);
        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->id;
        
        $data = Menu::create($requestData);

        Log::captureLog(Auth::user()->id, 'configs', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' menambah data menu dengan ID = '.$data->id.' via Web');

        return redirect('menu')->with('message_success', 'Menu added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $menu = Menu::with('group_menu')->findOrFail($id);

        return view('Menu::menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $menu['groupMenus'] = GroupMenu::get(['group_name', 'id']);
        return view('Menu::menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'group_menu_id' => 'required|string',
			'menu' => 'required|string',
			'icon' => 'required|string|max:50',
			'priority' => 'required|numeric'
		]);
        $requestData = $request->all();
        $requestData['updated_by'] = Auth::user()->id;
        
        $data = Menu::findOrFail($id);
        $data->update($requestData);

        Log::captureLog(Auth::user()->id, 'configs', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' mengubah data Menu dengan ID = '.$data->id.' via Web');

        return redirect('menu')->with('message_success', 'Menu updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $requestData['updated_by'] = Auth::user()->id;
        $menu = Menu::findOrFail($id);
        $menu->update($requestData);

        $data = Menu::destroy($id);

        Log::captureLog(Auth::user()->id, 'configs', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' menghapus data Menu dengan ID = '.$data->id.' via Web');

        return redirect('menu')->with('message_success', 'Menu deleted!');
    }
}
