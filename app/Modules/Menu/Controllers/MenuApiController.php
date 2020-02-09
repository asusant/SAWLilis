<?php

namespace App\Modules\Menu\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Menu\Models\Menu;
use Illuminate\Http\Request;

class MenuApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menu = Menu::latest()->paginate(25);

        return $menu;
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
			'group_menu_id' => 'required|string',
			'menu' => 'required|string',
			'icon' => 'required|string|max:50',
			'priority' => 'required|numeric'
		]);
        $menu = Menu::create($request->all());

        return response()->json($menu, 201);
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
        $menu = Menu::findOrFail($id);

        return $menu;
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
			'group_menu_id' => 'required|string',
			'menu' => 'required|string',
			'icon' => 'required|string|max:50',
			'priority' => 'required|numeric'
		]);
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return response()->json($menu, 200);
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
        Menu::destroy($id);

        return response()->json(null, 204);
    }
}
