<?php

namespace App\Modules\UserLevel\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\UserLevel\Models\UserLevel;
use Illuminate\Http\Request;

class UserLevelApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userlevel = UserLevel::latest()->paginate(25);

        return $userlevel;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'user_id' => 'required|exists:users,id',
			'level_id' => 'required|exists:levels,id'
		]);
        $userlevel = UserLevel::create($request->all());

        return response()->json($userlevel, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userlevel = UserLevel::findOrFail($id);

        return $userlevel;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'user_id' => 'required|exists:users,id',
			'level_id' => 'required|exists:levels,id'
		]);
        $userlevel = UserLevel::findOrFail($id);
        $userlevel->update($request->all());

        return response()->json($userlevel, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserLevel::destroy($id);

        return response()->json(null, 204);
    }
}
