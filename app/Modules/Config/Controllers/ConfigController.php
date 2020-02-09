<?php

namespace App\Modules\Config\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Config\Models\Config;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Modules\Log\Models\Log;
use Illuminate\Support\Facades\Auth;
use DB;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Config::config.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        DB::statement(DB::raw('set @no=0'));
        $model = Config::select([DB::raw('@no  := @no  + 1 AS no'), 'configs.*']);
        $data = new Datatables;
        return $data->eloquent($model)
                ->addColumn('action', function($data){
                  return '<td>
                      <a href="'. route('config.show', $data->id) .'" title="View Config"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="'. route('config.edit', $data->id) .'" title="Edit Config"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      <form method="POST" action="'. route('config.destroy', $data->id) .'" accept-charset="UTF-8" style="display:inline">
                          '.method_field("DELETE").'
                          '.csrf_field().'
                          <a href="javascript:void(0)" onclick="delete_item(this);return false;" id="delete-item" class="btn btn-outline-danger btn-sm" title="Delete Config" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
        return view('Config::config.create');
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
			'config_name' => 'required|string',
			'key' => 'required|string|max:50',
			'value' => 'required|string',
			'description' => 'required|string'
		]);
        $requestData = $request->all();

        $requestData['created_by'] = Auth::user()->id;

        $data = Config::create($requestData);

        Log::captureLog(Auth::user()->id, 'configs', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' menambah data Config dengan ID = '.$data->id.' via Web');

        return redirect('config')->with('message_success', 'Config added!');
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
        $config = Config::findOrFail($id);

        return view('Config::config.show', compact('config'));
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
        $config = Config::findOrFail($id);

        return view('Config::config.edit', compact('config'));
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
			'config_name' => 'required|string',
			'key' => 'required|string|max:50',
			'value' => 'required|string',
			'description' => 'required|string'
		]);
        $requestData = $request->all();

        $requestData['updated_by'] = Auth::user()->id;
        
        $data = Config::findOrFail($id);
        $data->update($requestData);

        Log::captureLog(Auth::user()->id, 'configs', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' mengubah data Config dengan ID = '.$data->id.' via Web');

        return redirect('config')->with('message_success', 'Config updated!');
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
        $data = Config::findOrFail($id);
        $data->update($deleted);

        $data = Config::destroy($id);

        Log::captureLog(Auth::user()->id, 'configs', $id, 'store', 'User dengan ID = '.Auth::user()->id.' menghapus data Config dengan ID = '.$id.' via Web');

        return redirect('config')->with('message_success', 'Config deleted!');
    }
}
