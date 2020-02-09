<?php

namespace App\Modules\User\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
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
            $user = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('username', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $user = User::latest()->paginate($perPage);
        }

        return view('User::user.index', compact('user'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        DB::statement(DB::raw('set @no=0'));
        $model = User::select([DB::raw('@no  := @no  + 1 AS no'), 'users.*']);
        $data = new Datatables;
        return $data->eloquent($model)
                ->addColumn('action', function($data){
                  return '<td>
                      <a href="'. route('user.show', $data->id) .'" title="View User"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="'. route('user.edit', $data->id) .'" title="Edit User"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      <form method="POST" action="'. route('user.destroy', $data->id) .'" accept-charset="UTF-8" style="display:inline">
                          '.method_field("DELETE").'
                          '.csrf_field().'
                          <a href="javascript:void(0)" onclick="delete_item(this);return false;" id="delete-item" class="btn btn-outline-danger btn-sm" title="Delete User" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
        return view('User::user.create');
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
			'name' => 'required|string',
			'username' => 'nullable|string|max:50|unique:users,username',
			'email' => 'required|string|unique:users,email',
			'password' => 'required|string|min:6|confirmed'
		]);
        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->id;

        $requestData['password'] = Hash::make($requestData['password']);
        
        User::create($requestData);

        return redirect('user')->with('message_success', 'User added!');
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
        $user = User::findOrFail($id);

        return view('User::user.show', compact('user'));
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
        $user = User::findOrFail($id);

        return view('User::user.edit', compact('user'));
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
			'name' => 'required|string',
			'username' => 'nullable|string|max:50|unique:users,username,'.$id,
			'email' => 'required|string|unique:users,email,'.$id,
			'password' => 'required|string|min:6|confirmed'
		]);
        $requestData = $request->all();

        $requestData['password'] = Hash::make($requestData['password']);
        $requestData['updated_by'] = Auth::user()->id;
        
        $user = User::findOrFail($id);
        $user->update($requestData);

        return redirect('user')->with('message_success', 'User updated!');
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
        $requestData['deleted_by'] = Auth::user()->id;
        
        $user = User::findOrFail($id);
        $user->update($requestData);

        User::destroy($id);

        return redirect('user')->with('message_success', 'User deleted!');
    }
}
