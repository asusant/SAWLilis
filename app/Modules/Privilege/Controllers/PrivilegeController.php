<?php

namespace App\Modules\Privilege\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Privilege\Models\Privilege;
use App\Modules\Level\Models\Level;
use App\Modules\Module\Models\Module;
use App\Modules\Log\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class PrivilegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        return view('Privilege::privilege.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        DB::statement(DB::raw('set @no=0'));
        $model = Privilege::with('level')->with('module')->select([DB::raw('@no  := @no  + 1 AS no'), 'privileges.*']);
        $data = new Datatables;
        return $data->eloquent($model)
                ->editColumn('level_id', function($data){
                    return $data->level->level;
                })
                ->editColumn('index', function($data){
                    return ($data->index) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>';
                })
                ->editColumn('show', function($data){
                    return ($data->show) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>';
                })
                ->editColumn('create', function($data){
                    return ($data->create) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>';
                })
                ->editColumn('store', function($data){
                    return ($data->store) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>';
                })->editColumn('edit', function($data){
                    return ($data->edit) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>';
                })->editColumn('update', function($data){
                    return ($data->update) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>';
                })->editColumn('destroy', function($data){
                    return ($data->destroy) ? '<div class="label label-success">Allow</div>' : '<div class="label label-danger">Block</div>';
                })
                ->editColumn('module_id', function($data){
                    return $data->module->module;
                })
                ->addColumn('action', function($data){
                  return '<td>
                      <a href="'. route('privilege.show', $data->id) .'" title="View Privilege"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="'. route('privilege.edit', $data->id) .'" title="Edit Privilege"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      <form method="POST" action="'. route('privilege.destroy', $data->id) .'" accept-charset="UTF-8" style="display:inline">
                          '.method_field("DELETE").'
                          '.csrf_field().'
                          <a href="javascript:void(0)" onclick="delete_item(this);return false;" id="delete-item" class="btn btn-outline-danger btn-sm" title="Delete Privilege" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
        $privilege['levels'] = Level::get(['level', 'id']);
        $privilege['modules'] = Module::get(['module', 'id']);

        return view('Privilege::privilege.create', compact('privilege'));
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
			'level_id' => 'required|exists:levels,id',
			'module_id' => 'required|exists:modules,id',
			'index' => 'required|numeric|max:1',
			'create' => 'required|numeric|max:1',
			'store' => 'required|numeric|max:1',
			'edit' => 'required|numeric|max:1',
			'update' => 'required|numeric|max:1',
			'destroy' => 'required|numeric|max:1',
			'custom' => 'required|numeric|max:1'
		]);
        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->id;
        
        $data = Privilege::create($requestData);

        Log::captureLog(Auth::user()->id, 'privileges', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' menambah data Privilege dengan ID = '.$data->id.' via Web');

        return redirect('privilege')->with('message_success', 'Privilege added!');
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
        $privilege = Privilege::with(['level', 'module'])->findOrFail($id);

        return view('Privilege::privilege.show', compact('privilege'));
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
        $privilege = Privilege::findOrFail($id);

        $privilege['levels'] = Level::get(['level', 'id']);
        $privilege['modules'] = Module::get(['module', 'id']);

        return view('Privilege::privilege.edit', compact('privilege'));
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
			'level_id' => 'required|exists:levels,id',
			'module_id' => 'required|exists:modules,id',
			'index' => 'required|numeric|max:1',
			'create' => 'required|numeric|max:1',
			'store' => 'required|numeric|max:1',
			'edit' => 'required|numeric|max:1',
			'update' => 'required|numeric|max:1',
			'destroy' => 'required|numeric|max:1',
			'custom' => 'required|numeric|max:1'
		]);
        $requestData = $request->all();
        $requestData['updated_by'] = Auth::user()->id;
        
        $data = Privilege::findOrFail($id);
        $data->update($requestData);

        Log::captureLog(Auth::user()->id, 'privileges', $data->id, 'update', 'User dengan ID = '.Auth::user()->id.' mengubah data Privilege dengan ID = '.$data->id.' via Web');

        return redirect('privilege')->with('message_success', 'Privilege updated!');
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
        $privilege = Privilege::findOrFail($id);
        $privilege->update($deleted);

        $data = Privilege::destroy($id);

        Log::captureLog(Auth::user()->id, 'privileges', $id, 'store', 'User dengan ID = '.Auth::user()->id.' menghapus data Privilege dengan ID = '.$id.' via Web');

        return redirect('privilege')->with('message_success', 'Privilege deleted!');
    }
}
