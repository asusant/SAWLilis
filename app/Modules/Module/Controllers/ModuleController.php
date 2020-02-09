<?php

namespace App\Modules\Module\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Module\Models\Module;
use App\Modules\Menu\Models\Menu;
use App\Modules\Log\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Module::module.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        DB::statement(DB::raw('set @no=0'));
        $model = Module::with('menu')->select([DB::raw('@no  := @no  + 1 AS no'), 'modules.*']);
        $data = new Datatables;
        return $data->eloquent($model)
                ->editColumn('menu_id', function($data){
                    return $data->menu->menu;
                })
                ->editColumn('icon', function($data){
                    return '<span class="'.$data->icon.'"></span> ' .$data->icon;
                })
                ->addColumn('action', function($data){
                  return '<td>
                      <a href="'. route('module.show', $data->id) .'" title="View Module"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="'. route('module.edit', $data->id) .'" title="Edit Module"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      <form method="POST" action="'. route('module.destroy', $data->id) .'" accept-charset="UTF-8" style="display:inline">
                          '.method_field("DELETE").'
                          '.csrf_field().'
                          <a href="javascript:void(0)" onclick="delete_item(this);return false;" id="delete-item" class="btn btn-outline-danger btn-sm" title="Delete Module" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
        $module['menus'] = Menu::get(['menu', 'id']);

        return view('Module::module.create', compact('module'));
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
			'menu_id' => 'required|exists:menus,id',
			'module' => 'required|string|max:50',
			'route' => 'required|string',
			'icon' => 'required|string|max:50',
			'priority' => 'required|numeric'
		]);
        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->id;
        
        $data = Module::create($requestData);

        Log::captureLog(Auth::user()->id, 'modules', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' menambah data Module dengan ID = '.$data->id.' via Web');

        return redirect('module')->with('message_success', 'Module added!');
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
        $module = Module::with('menu')->findOrFail($id);

        return view('Module::module.show', compact('module'));
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
        $module = Module::findOrFail($id);

        $module['menus'] = Menu::get(['menu', 'id']);

        return view('Module::module.edit', compact('module'));
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
			'menu_id' => 'required|exists:menus,id',
			'module' => 'required|string|max:50',
			'route' => 'required|string',
			'icon' => 'required|string|max:50',
			'priority' => 'required|numeric'
		]);
        $requestData = $request->all();
        $requestData['updated_by'] = Auth::user()->id;
        
        $data = Module::findOrFail($id);
        $data->update($requestData);

        Log::captureLog(Auth::user()->id, 'modules', $data->id, 'update', 'User dengan ID = '.Auth::user()->id.' mengubah data Module dengan ID = '.$data->id.' via Web');

        return redirect('module')->with('message_success', 'Module updated!');
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
        $deleted['deleted_by'] = Auth::user()->id;
        $module = Module::findOrFail($id);
        $module->update($deleted);

        $data = Module::destroy($id);

        Log::captureLog(Auth::user()->id, 'modules', $id, 'store', 'User dengan ID = '.Auth::user()->id.' menghapus data Module dengan ID = '.$id.' via Web');

        return redirect('module')->with('message_success', 'Module deleted!');
    }
}
