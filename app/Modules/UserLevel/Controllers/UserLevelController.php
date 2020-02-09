<?php

namespace App\Modules\UserLevel\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\UserLevel\Models\UserLevel;
use App\Modules\User\Models\User;
use App\Modules\Level\Models\Level;
use App\Modules\Log\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class UserLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('UserLevel::user-level.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        DB::statement(DB::raw('set @no=0'));
        $model = UserLevel::with('level')->with('user')->select([DB::raw('@no  := @no  + 1 AS no'), 'user_levels.*']);
        $data = new Datatables;
        return $data->eloquent($model)
                ->editColumn('level_id', function($data){
                    return $data->level->level;
                })
                ->editColumn('user_id', function($data){
                    return $data->user->name;
                })
                ->addColumn('action', function($data){
                  return '<td>
                      <a href="'. route('user-level.show', $data->id) .'" title="View UserLevel"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="'. route('user-level.edit', $data->id) .'" title="Edit UserLevel"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      <form method="POST" action="'. route('user-level.destroy', $data->id) .'" accept-charset="UTF-8" style="display:inline">
                          '.method_field("DELETE").'
                          '.csrf_field().'
                          <a href="javascript:void(0)" onclick="delete_item(this);return false;" id="delete-item" class="btn btn-outline-danger btn-sm" title="Delete UserLevel" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
        $menu['users'] = User::get(['email', 'name', 'id']);
        $menu['levels'] = Level::get(['level', 'id']);
        return view('UserLevel::user-level.create', compact('menu'));
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
			'user_id' => 'required|exists:users,id',
			'level_id' => 'required|exists:levels,id'
		]);
        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->id;

        $data = UserLevel::create($requestData);

        Log::captureLog(Auth::user()->id, 'userlevels', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' menambah data UserLevel dengan ID = '.$data->id.' via Web');

        return redirect('user-level')->with('message_success', 'UserLevel added!');
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
        $userlevel = UserLevel::with('level')->with('user')->findOrFail($id);

        return view('UserLevel::user-level.show', compact('userlevel'));
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
        $menu = UserLevel::findOrFail($id);
        $menu['users'] = User::get(['email', 'name', 'id']);
        $menu['levels'] = Level::get(['level', 'id']);

        return view('UserLevel::user-level.edit', compact('menu'));
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
			'user_id' => 'required|exists:users,id',
			'level_id' => 'required|exists:levels,id'
		]);
        $requestData = $request->all();
        $requestData['updated_by'] = Auth::user()->id;

        $data = UserLevel::findOrFail($id);
        $data->update($requestData);

        Log::captureLog(Auth::user()->id, 'userlevels', $data->id, 'update', 'User dengan ID = '.Auth::user()->id.' mengubah data UserLevel dengan ID = '.$data->id.' via Web');

        return redirect('user-level')->with('message_success', 'UserLevel updated!');
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
        $userlevel = UserLevel::findOrFail($id);
        $userlevel->update($deleted);

        $data = UserLevel::destroy($id);

        Log::captureLog(Auth::user()->id, 'userlevels', $id, 'store', 'User dengan ID = '.Auth::user()->id.' menghapus data UserLevel dengan ID = '.$id.' via Web');

        return redirect('user-level')->with('message_success', 'UserLevel deleted!');
    }
}
