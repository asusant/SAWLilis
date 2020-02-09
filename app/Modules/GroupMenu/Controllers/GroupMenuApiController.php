<?php

namespace App\Modules\GroupMenu\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\GroupMenu\Models\GroupMenu;
use Illuminate\Http\Request;

class GroupMenuApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $groupmenu = GroupMenu::latest()->paginate(25);

        return $groupmenu;
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
			'group_name' => 'required|string',
			'icon' => 'required|string'
		]);
        $groupmenu = GroupMenu::create($request->all());

        return response()->json($groupmenu, 201);
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
        $groupmenu = GroupMenu::findOrFail($id);

        return $groupmenu;
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
			'group_name' => 'required|string',
			'icon' => 'required|string'
		]);
        $groupmenu = GroupMenu::findOrFail($id);
        $groupmenu->update($request->all());

        return response()->json($groupmenu, 200);
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
        GroupMenu::destroy($id);

        return response()->json(null, 204);
    }
}
