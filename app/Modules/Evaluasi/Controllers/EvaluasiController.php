<?php

namespace App\Modules\Evaluasi\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Evaluasi\Models\Evaluasi;
use App\Modules\Alternatif\Models\Alternatif;
use App\Modules\Kriteria\Models\Kriteria;
use App\Modules\Log\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use App\Helper\Saw;

class EvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $evaluasi['kriterias'] = Kriteria::all();
        return view('Evaluasi::evaluasi.index', compact('evaluasi'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        DB::statement(DB::raw('set @no=0'));

        $kriterias = Kriteria::all();

        $evaluated = Evaluasi::groupBy('alternatif_id')->pluck('alternatif_id')->toArray();

        $model = Alternatif::whereIn('id', $evaluated)
                            ->select([
                                DB::raw('@no  := @no  + 1 AS no'),
                                'alternatifs.*',
                                'alternatifs.alternatif as alternatif_id'
                            ]);

        $data = new Datatables;
        $data = $data->eloquent($model);
        $data->addColumn('action', function($data){
                  return '<td>
                      <a href="'. route('evaluasi.show', $data->id) .'" title="View Evaluasi"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="'. route('evaluasi.edit', $data->id) .'" title="Edit Evaluasi"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      <form method="POST" action="'. route('evaluasi.destroy', $data->id) .'" accept-charset="UTF-8" style="display:inline">
                          '.method_field("DELETE").'
                          '.csrf_field().'
                          <a href="javascript:void(0)" onclick="delete_item(this);return false;" id="delete-item" class="btn btn-outline-danger btn-sm" title="Delete Evaluasi" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                      </form>
                  </td>';
                });

        foreach ($kriterias as $key => $row) {
            $data->addColumn('eval-'.$row->id, function($data) use($row){
                return Evaluasi::where('alternatif_id', $data->id)->where('kriteria_id', $row->id)->first()->nilai;
            });
        }

        return $data->escapeColumns('[*]')->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $evaluasi['kriterias'] = Kriteria::with('nilai')->get();
        $evaluasi['alternatifs'] = Alternatif::all();

        return view('Evaluasi::evaluasi.create', compact('evaluasi'));
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
        $evaluated = Evaluasi::where('alternatif_id', $request->input('alternatif_id'))->count();

        if ($evaluated > 0) {
            return redirect()->back()->withInput()->with('message_error', 'Alternatif sudah pernah dievaluasi, gunakan menu edit!');
        }

        $this->validate($request, [
			'alternatif_id' => 'required|exists:alternatifs,id',
		]);

        $kriterias = Kriteria::all();

        $evaluasi = array();
        foreach ($kriterias as $key => $row) {
            unset($evaluasi);
            $evaluasi['alternatif_id'] = $request->input('alternatif_id');
            $evaluasi['kriteria_id'] = $row->id;
            $evaluasi['nilai'] = $request->input('nilai-'.$row->id);
            $evaluasi['created_by'] = Auth::user()->id;

            Evaluasi::create($evaluasi);
        }

        Log::captureLog(Auth::user()->id, 'evaluasis', $request->input('alternatif_id'), 'store', 'User dengan ID = '.Auth::user()->id.' menambah data Evaluasi untuk Alternatif dengan ID = '.$request->input('alternatif_id').' via Web');

        return redirect('evaluasi')->with('message_success', 'Evaluasi added!');
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
        $evaluasi = Evaluasi::where('alternatif_id', $id)->first();
        $evaluasi->nilai = Evaluasi::where('alternatif_id', $id)->get()->keyBy('kriteria_id');

        $evaluasi['kriterias'] = Kriteria::all();
        $evaluasi['alternatifs'] = Alternatif::all();

        return view('Evaluasi::evaluasi.show', compact('evaluasi'));
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
        $evaluasi = Evaluasi::where('alternatif_id',$id)->first();
        $evaluasi->nilai = Evaluasi::where('alternatif_id', $id)->get()->keyBy('kriteria_id');

        $evaluasi['kriterias'] = Kriteria::with('nilai')->get();
        $evaluasi['alternatifs'] = Alternatif::all();

        return view('Evaluasi::evaluasi.edit', compact('evaluasi'));
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
        $evaluated = Evaluasi::where('alternatif_id', $request->input('alternatif_id'))->get();

        if ($request->input('edit_alternatif_id') != $request->input('alternatif_id')) {

            $evaluated = Evaluasi::where('alternatif_id', $request->input('edit_alternatif_id'))->get();

            if ($evaluated->count() > 0) {
                return redirect()->back()->withInput()->with('message_error', 'Alternatif sudah pernah dievaluasi, gunakan menu edit!');
            }

        }

        $this->validate($request, [
			'alternatif_id' => 'required|exists:alternatifs,id',
        ]);

        $evaluasi = array();

        $kriterias = Kriteria::get()->keyBy('id');

        foreach ($kriterias as $key => $row) {
            unset($evaluasi);
            $evaluasi = Evaluasi::find($request->input('edit_nilai_'.$row->id));

            $evaluasi->alternatif_id = $request->input('alternatif_id');
            $evaluasi->nilai = $request->input('nilai-'.$row->id);
            $evaluasi->updated_by = Auth::user()->id;

            $evaluasi->save();
        }

        Log::captureLog(Auth::user()->id, 'evaluasis', $request->input('alternatif_id'), 'update', 'User dengan ID = '.Auth::user()->id.' mengubah data Evaluasi dengan ID Alternatif = '.$request->input('alternatif_id').' via Web');

        return redirect('evaluasi')->with('message_success', 'Evaluasi updated!');
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

        $evaluasi = Evaluasi::where('alternatif_id',$id)->update($deleted);

        $data = Evaluasi::where('alternatif_id', $id)->delete();

        Log::captureLog(Auth::user()->id, 'evaluasis', $id, 'store', 'User dengan ID = '.Auth::user()->id.' menghapus data Evaluasi dengan ID Alternatif = '.$id.' via Web');

        return redirect('evaluasi')->with('message_success', 'Evaluasi deleted!');
    }

    public function perhitungan()
    {
        $kriterias = Kriteria::get()->keyBy('id');
        $alternatifs = Alternatif::with('section')->get()->keyBy('id');
        $evaluasies = Evaluasi::all();

        $saw = new Saw;
        $saw->hitungSaw($kriterias, $alternatifs, $evaluasies);

        $evaluasi['kriterias'] = Kriteria::all();
        $evaluasi['saw'] = $saw;
        return view('Evaluasi::evaluasi.index', compact('evaluasi'));
    }
}
