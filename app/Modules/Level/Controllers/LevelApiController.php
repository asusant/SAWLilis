<?php

namespace App\Modules\Level\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Level\Models\Level;
use Illuminate\Http\Request;

class LevelApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $level = Level::latest()->paginate(25);

        return $level;
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
			'level' => 'required|string',
			'icon' => 'required|string|max:50',
			'description' => 'required|string'
		]);
        $level = Level::create($request->all());

        return response()->json($level, 201);
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
        $level = Level::findOrFail($id);

        return $level;
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
			'level' => 'required|string',
			'icon' => 'required|string|max:50',
			'description' => 'required|text'
		]);
        $level = Level::findOrFail($id);
        $level->update($request->all());

        return response()->json($level, 200);
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
        Level::destroy($id);

        return response()->json(null, 204);
    }
}
