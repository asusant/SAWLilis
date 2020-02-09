<?php

namespace App\Modules\NilaiKriteria\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\NilaiKriteria\Models\NilaiKriteria;
use App\Modules\Log\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class NilaiKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(!$request->get('kriteria'))
        {
            return redirect()->back()->with('message_danger', 'Parameter Kriteria harus didefinisikan!');
        }
        $kriteria = $request->get('kriteria');
        return view('NilaiKriteria::nilai-kriteria.index', compact('kriteria'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function details($kriteria)
    {
        DB::statement(DB::raw('set @no=0'));
        $model = NilaiKriteria::where('kriteria_id', $kriteria)
            ->select([DB::raw('@no  := @no  + 1 AS no'), 'nilaikriterias.*']);
        $data = new Datatables;
        return $data->eloquent($model)
                ->addColumn('action', function($data){
                  return '<td>
                      <a href="'. route('kriteria.nilai-kriteria.show', $data->id) .'" title="View NilaiKriteria"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="'. route('kriteria.nilai-kriteria.edit', $data->id) .'" title="Edit NilaiKriteria"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      <form method="POST" action="'. route('kriteria.nilai-kriteria.destroy', $data->id) .'" accept-charset="UTF-8" style="display:inline">
                          '.method_field("DELETE").'
                          '.csrf_field().'
                          <a href="javascript:void(0)" onclick="delete_item(this);return false;" id="delete-item" class="btn btn-outline-danger btn-sm" title="Delete NilaiKriteria" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
        return view('NilaiKriteria::nilai-kriteria.create');
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
			'kriteria_id' => 'required|exists:kriterias,id',
			'deskripsi' => 'required',
			'nilai' => 'required|numeric'
		]);
        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->id;

        $data = NilaiKriteria::create($requestData);

        Log::captureLog(Auth::user()->id, 'nilaikriterias', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' menambah data NilaiKriteria dengan ID = '.$data->id.' via Web');

        return redirect('nilai-kriteria')->with('message_success', 'NilaiKriteria added!');
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
        $nilaikriterium = NilaiKriteria::findOrFail($id);

        return view('NilaiKriteria::nilai-kriteria.show', compact('nilaikriterium'));
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
        $nilaikriterium = NilaiKriteria::findOrFail($id);

        return view('NilaiKriteria::nilai-kriteria.edit', compact('nilaikriterium'));
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
			'kriteria_id' => 'required|exists:kriterias,id',
			'deskripsi' => 'required',
			'nilai' => 'required|numeric'
		]);
        $requestData = $request->all();
        $requestData['updated_by'] = Auth::user()->id;

        $data = NilaiKriteria::findOrFail($id);
        $data->update($requestData);

        Log::captureLog(Auth::user()->id, 'nilaikriterias', $data->id, 'update', 'User dengan ID = '.Auth::user()->id.' mengubah data NilaiKriteria dengan ID = '.$data->id.' via Web');

        return redirect('nilai-kriteria')->with('message_success', 'NilaiKriteria updated!');
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
        $nilaikriterium = NilaiKriteria::findOrFail($id);
        $nilaikriterium->update($deleted);

        $data = NilaiKriteria::destroy($id);

        Log::captureLog(Auth::user()->id, 'nilaikriterias', $id, 'store', 'User dengan ID = '.Auth::user()->id.' menghapus data NilaiKriteria dengan ID = '.$id.' via Web');

        return redirect('nilai-kriteria')->with('message_success', 'NilaiKriteria deleted!');
    }
}
