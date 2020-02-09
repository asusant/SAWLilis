<?php

namespace App\Modules\Log\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Log\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $log = Log::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('table', 'LIKE', "%$keyword%")
                ->orWhere('row_id', 'LIKE', "%$keyword%")
                ->orWhere('action', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $log = Log::latest()->paginate($perPage);
        }

        return view('Log::log.index', compact('log'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        DB::statement(DB::raw('set @no=0'));
        $model = Log::with('user')->select([DB::raw('@no  := @no  + 1 AS no'), 'logs.*']);
        $data = new Datatables;
        return $data->eloquent($model)
                ->editColumn('user_id', function($data){
                    return $data->user->name;
                })
                ->addColumn('action', function($data){
                  return '<td>
                      <a href="'. route('log.show', $data->id) .'" title="View Log"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="'. route('log.edit', $data->id) .'" title="Edit Log"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      <form method="POST" action="'. route('log.destroy', $data->id) .'" accept-charset="UTF-8" style="display:inline">
                          '.method_field("DELETE").'
                          '.csrf_field().'
                          <a href="javascript:void(0)" onclick="delete_item(this);return false;" id="delete-item" class="btn btn-outline-danger btn-sm" title="Delete Log" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
        return view('Log::log.create');
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
			'user_id' => 'required|numeric',
			'table' => 'required|string|max:50',
			'row_id' => 'required|numeric',
			'action' => 'required',
			'description' => 'required'
		]);
        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->id;
        
        Log::create($requestData);

        return redirect('log')->with('message_success', 'Log added!');
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
        $log = Log::findOrFail($id);

        return view('Log::log.show', compact('log'));
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
        $log = Log::findOrFail($id);

        return view('Log::log.edit', compact('log'));
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
			'user_id' => 'required|numeric',
			'table' => 'required|string|max:50',
			'row_id' => 'required|numeric',
			'action' => 'required',
			'description' => 'required'
		]);
        $requestData = $request->all();
        $requestData['updated_by'] = Auth::user()->id;
        
        $log = Log::findOrFail($id);
        $log->update($requestData);

        return redirect('log')->with('message_success', 'Log updated!');
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
        $data['deleted_by'] = Auth::user()->id;
        $log = Log::findOrFail($id);
        $log->update($requestData);

        Log::destroy($id);

        return redirect('log')->with('message_success', 'Log deleted!');
    }
}
