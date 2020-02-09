<?php

namespace App\Modules\Module\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Module\Models\Module;
use Illuminate\Http\Request;

class ModuleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $module = Module::latest()->paginate(25);

        return $module;
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
			'menu_id' => 'required|exists:menus,id',
			'module' => 'required|string|max:50',
			'route' => 'required|string',
			'icon' => 'required|string|max:50',
			'priority' => 'required|numeric'
		]);
        $module = Module::create($request->all());

        return response()->json($module, 201);
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
        $module = Module::findOrFail($id);

        return $module;
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
			'menu_id' => 'required|exists:menus,id',
			'module' => 'required|string|max:50',
			'route' => 'required|string',
			'icon' => 'required|string|max:50',
			'priority' => 'required|numeric'
		]);
        $module = Module::findOrFail($id);
        $module->update($request->all());

        return response()->json($module, 200);
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
        Module::destroy($id);

        return response()->json(null, 204);
    }
}
