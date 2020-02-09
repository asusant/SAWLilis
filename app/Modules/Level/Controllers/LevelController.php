<?php

namespace App\Modules\Level\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Level\Models\Level;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Modules\Log\Models\Log;
use Illuminate\Support\Facades\Auth;
use DB;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Level::level.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        DB::statement(DB::raw('set @no=0'));
        $model = Level::select([DB::raw('@no  := @no  + 1 AS no'), 'levels.*']);
        $data = new Datatables;
        return $data->eloquent($model)
                ->editColumn('icon', function ($data){
                    return '<i class="'.$data->icon.'"></i> '.$data->icon;
                })
                ->addColumn('action', function($data){
                  return '<td>
                      <a href="'. route('level.show', $data->id) .'" title="View Level"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="'. route('level.edit', $data->id) .'" title="Edit Level"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      <form method="POST" action="'. route('level.destroy', $data->id) .'" accept-charset="UTF-8" style="display:inline">
                          '.method_field("DELETE").'
                          '.csrf_field().'
                          <a href="javascript:void(0)" onclick="delete_item(this);return false;" id="delete-item" class="btn btn-outline-danger btn-sm" title="Delete Level" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
        return view('Level::level.create');
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
			'level' => 'required|string',
			'icon' => 'required|string|max:50',
			'description' => 'required|string'
		]);

        $requestData = $request->all();

        $requestData['created_by'] = Auth::user()->id;
        
        $data = Level::create($requestData);

        Log::captureLog(Auth::user()->id, 'configs', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' menambah data Config dengan ID = '.$data->id.' via Web');

        return redirect('level')->with('message_success', 'Level added!');
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
        $level = Level::findOrFail($id);

        return view('Level::level.show', compact('level'));
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
        $level = Level::findOrFail($id);

        return view('Level::level.edit', compact('level'));
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
			'level' => 'required|string',
			'icon' => 'required|string|max:50',
			'description' => 'required|string'
		]);
        $requestData = $request->all();
        $requestData['updated_by'] = Auth::user()->id;
        
        $data = Level::findOrFail($id);
        $data->update($requestData);

        Log::captureLog(Auth::user()->id, 'configs', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' menambah data Config dengan ID = '.$data->id.' via Web');

        return redirect('level')->with('message_success', 'Level updated!');
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
        Level::destroy($id);

        return redirect('level')->with('message_success', 'Level deleted!');
    }
}
