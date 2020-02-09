<?php

namespace App\Modules\Alternatif\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Alternatif\Models\Alternatif;
use App\Modules\Section\Models\Section;
use App\Modules\Log\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Alternatif::alternatif.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        DB::statement(DB::raw('set @no=0'));
        $model = Alternatif::with('section')->select([DB::raw('@no  := @no  + 1 AS no'), 'alternatifs.*']);
        $data = new Datatables;
        return $data->eloquent($model)
                ->addColumn('action', function($data){
                  return '<td>
                      <a href="'. route('alternatif.show', $data->id) .'" title="View Alternatif"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="'. route('alternatif.edit', $data->id) .'" title="Edit Alternatif"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      <form method="POST" action="'. route('alternatif.destroy', $data->id) .'" accept-charset="UTF-8" style="display:inline">
                          '.method_field("DELETE").'
                          '.csrf_field().'
                          <a href="javascript:void(0)" onclick="delete_item(this);return false;" id="delete-item" class="btn btn-outline-danger btn-sm" title="Delete Alternatif" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
        $sections = Section::all();
        return view('Alternatif::alternatif.create', compact('sections'));
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
			'alternatif' => 'required',
			'keterangan' => 'required'
		]);
        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->id;

        $data = Alternatif::create($requestData);

        Log::captureLog(Auth::user()->id, 'alternatifs', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' menambah data Alternatif dengan ID = '.$data->id.' via Web');

        return redirect('alternatif')->with('message_success', 'Alternatif added!');
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
        $alternatif = Alternatif::findOrFail($id);

        return view('Alternatif::alternatif.show', compact('alternatif'));
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
        $alternatif = Alternatif::findOrFail($id);
        $sections = Section::all();

        return view('Alternatif::alternatif.edit', compact('alternatif','sections'));
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
			'alternatif' => 'required',
			'keterangan' => 'required'
		]);
        $requestData = $request->all();
        $requestData['updated_by'] = Auth::user()->id;

        $data = Alternatif::findOrFail($id);
        $data->update($requestData);

        Log::captureLog(Auth::user()->id, 'alternatifs', $data->id, 'update', 'User dengan ID = '.Auth::user()->id.' mengubah data Alternatif dengan ID = '.$data->id.' via Web');

        return redirect('alternatif')->with('message_success', 'Alternatif updated!');
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
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->update($deleted);

        $data = Alternatif::destroy($id);

        Log::captureLog(Auth::user()->id, 'alternatifs', $id, 'store', 'User dengan ID = '.Auth::user()->id.' menghapus data Alternatif dengan ID = '.$id.' via Web');

        return redirect('alternatif')->with('message_success', 'Alternatif deleted!');
    }
}
