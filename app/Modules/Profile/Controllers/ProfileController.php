<?php

namespace App\Modules\Profile\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Profile\Models\Profile;
use App\Modules\Log\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $logs = Log::where('user_id', Auth::user()->id)->get();
        return view('Profile::profile.index', compact('logs'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        DB::statement(DB::raw('set @no=0'));
        $model = Profile::select([DB::raw('@no  := @no  + 1 AS no'), 'profiles.*']);
        $data = new Datatables;
        return $data->eloquent($model)
                ->addColumn('action', function($data){
                  return '<td>
                      <a href="'. route('profile.show', $data->id) .'" title="View Profile"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="'. route('profile.edit', $data->id) .'" title="Edit Profile"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      <form method="POST" action="'. route('profile.destroy', $data->id) .'" accept-charset="UTF-8" style="display:inline">
                          '.method_field("DELETE").'
                          '.csrf_field().'
                          <a href="javascript:void(0)" onclick="delete_item(this);return false;" id="delete-item" class="btn btn-outline-danger btn-sm" title="Delete Profile" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
        return view('Profile::profile.create');
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

        $data = Profile::create($requestData);

        Log::captureLog(Auth::user()->id, 'profiles', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' menambah data Profile dengan ID = '.$data->id.' via Web');

        return redirect('profile')->with('message_success', 'Profile added!');
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
        $profile = Profile::findOrFail($id);

        return view('Profile::profile.show', compact('profile'));
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
        $profile = Profile::findOrFail($id);

        return view('Profile::profile.edit', compact('profile'));
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
			'username' => 'nullable|string|max:50|unique:users,username',
			'email' => 'required|string|unique:users,email',
			'password' => 'required|string|min:6|confirmed'
		]);
        $requestData = $request->all();
        $requestData['updated_by'] = Auth::user()->id;

        $data = Profile::findOrFail($id);
        $data->update($requestData);

        Log::captureLog(Auth::user()->id, 'profiles', $data->id, 'update', 'User dengan ID = '.Auth::user()->id.' mengubah data Profile dengan ID = '.$data->id.' via Web');

        return redirect('profile')->with('message_success', 'Profile updated!');
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
        $profile = Profile::findOrFail($id);
        $profile->update($deleted);

        $data = Profile::destroy($id);

        Log::captureLog(Auth::user()->id, 'profiles', $id, 'store', 'User dengan ID = '.Auth::user()->id.' menghapus data Profile dengan ID = '.$id.' via Web');

        return redirect('profile')->with('message_success', 'Profile deleted!');
    }
}
