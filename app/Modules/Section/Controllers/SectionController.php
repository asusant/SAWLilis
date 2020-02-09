<?php

namespace App\Modules\Section\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Section\Models\Section;
use App\Modules\Log\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Section::section.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function details()
    {
        DB::statement(DB::raw('set @no=0'));
        $model = Section::select([DB::raw('@no  := @no  + 1 AS no'), 'sections.*']);
        $data = new Datatables;
        return $data->eloquent($model)
                ->addColumn('action', function($data){
                  return '<td>
                      <a href="'. route('section.show', $data->id) .'" title="View Section"><button class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="'. route('section.edit', $data->id) .'" title="Edit Section"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      <form method="POST" action="'. route('section.destroy', $data->id) .'" accept-charset="UTF-8" style="display:inline">
                          '.method_field("DELETE").'
                          '.csrf_field().'
                          <a href="javascript:void(0)" onclick="delete_item(this);return false;" id="delete-item" class="btn btn-outline-danger btn-sm" title="Delete Section" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
        return view('Section::section.create');
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
			'kode_section' => 'required|unique:sections,kode_section',
			'section' => 'required'
		]);
        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->id;

        $data = Section::create($requestData);

        Log::captureLog(Auth::user()->id, 'sections', $data->id, 'store', 'User dengan ID = '.Auth::user()->id.' menambah data Section dengan ID = '.$data->id.' via Web');

        return redirect('section')->with('message_success', 'Section added!');
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
        $section = Section::findOrFail($id);

        return view('Section::section.show', compact('section'));
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
        $section = Section::findOrFail($id);

        return view('Section::section.edit', compact('section'));
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
			'kode_section' => 'required|unique:sections,kode_section',
			'section' => 'required'
		]);
        $requestData = $request->all();
        $requestData['updated_by'] = Auth::user()->id;

        $data = Section::findOrFail($id);
        $data->update($requestData);

        Log::captureLog(Auth::user()->id, 'sections', $data->id, 'update', 'User dengan ID = '.Auth::user()->id.' mengubah data Section dengan ID = '.$data->id.' via Web');

        return redirect('section')->with('message_success', 'Section updated!');
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
        $section = Section::findOrFail($id);
        $section->update($deleted);

        $data = Section::destroy($id);

        Log::captureLog(Auth::user()->id, 'sections', $id, 'store', 'User dengan ID = '.Auth::user()->id.' menghapus data Section dengan ID = '.$id.' via Web');

        return redirect('section')->with('message_success', 'Section deleted!');
    }
}
