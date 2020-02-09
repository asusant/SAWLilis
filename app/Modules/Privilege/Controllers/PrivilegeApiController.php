<?php

namespace App\Modules\Privilege\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Privilege\Models\Privilege;
use Illuminate\Http\Request;

class PrivilegeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $privilege = Privilege::latest()->paginate(25);

        return $privilege;
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
			'level_id' => 'required|exists:levels,id',
			'module_id' => 'required|exists:modules,id',
			'index' => 'required|numeric|max:1',
			'create' => 'required|numeric|max:1',
			'store' => 'required|numeric|max:1',
			'edit' => 'required|numeric|max:1',
			'update' => 'required|numeric|max:1',
			'delete' => 'required|numeric|max:1',
			'custom' => 'required|numeric|max:1'
		]);
        $privilege = Privilege::create($request->all());

        return response()->json($privilege, 201);
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
        $privilege = Privilege::findOrFail($id);

        return $privilege;
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
			'level_id' => 'required|exists:levels,id',
			'module_id' => 'required|exists:modules,id',
			'index' => 'required|numeric|max:1',
			'create' => 'required|numeric|max:1',
			'store' => 'required|numeric|max:1',
			'edit' => 'required|numeric|max:1',
			'update' => 'required|numeric|max:1',
			'delete' => 'required|numeric|max:1',
			'custom' => 'required|numeric|max:1'
		]);
        $privilege = Privilege::findOrFail($id);
        $privilege->update($request->all());

        return response()->json($privilege, 200);
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
        Privilege::destroy($id);

        return response()->json(null, 204);
    }
}
