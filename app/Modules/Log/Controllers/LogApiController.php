<?php

namespace App\Modules\Log\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Log\Models\Log;
use Illuminate\Http\Request;

class LogApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $log = Log::latest()->paginate(25);

        return $log;
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
			'user_id' => 'required|numeric',
			'table' => 'required|string|max:50',
			'row_id' => 'required|numeric',
			'action' => 'required',
			'description' => 'required'
		]);
        $log = Log::create($request->all());

        return response()->json($log, 201);
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
        $log = Log::findOrFail($id);

        return $log;
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
			'user_id' => 'required|numeric',
			'table' => 'required|string|max:50',
			'row_id' => 'required|numeric',
			'action' => 'required',
			'description' => 'required'
		]);
        $log = Log::findOrFail($id);
        $log->update($request->all());

        return response()->json($log, 200);
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
        Log::destroy($id);

        return response()->json(null, 204);
    }
}
