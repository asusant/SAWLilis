<?php

namespace App\Modules\Config\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Config\Models\Config;
use Illuminate\Http\Request;

class ConfigApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $config = Config::latest()->paginate(25);

        return $config;
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
			'config_name' => 'required|string',
			'key' => 'required|string|max:50',
			'value' => 'required|string',
			'description' => 'required|string'
		]);
        $config = Config::create($request->all());

        return response()->json($config, 201);
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
        $config = Config::findOrFail($id);

        return $config;
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
			'config_name' => 'required|string',
			'key' => 'required|string|max:50',
			'value' => 'required|string',
			'description' => 'required|string'
		]);
        $config = Config::findOrFail($id);
        $config->update($request->all());

        return response()->json($config, 200);
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
        Config::destroy($id);

        return response()->json(null, 204);
    }
}
