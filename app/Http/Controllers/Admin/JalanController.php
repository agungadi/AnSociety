<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jalan;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyJalanRequest;

use App\Http\Requests\UpdateJalanRequest;
use Illuminate\Support\Facades\DB;



class JalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_unless(\Gate::allows('jalan_access'), 403);

        $datas = Jalan::all();
        return view('admin.jalan.index', compact('datas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJalanRequest $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function show(Jalan $jalan)
    {
        //
        abort_unless(\Gate::allows('jalan_show'), 403);

        return view('admin.jalan.show', compact('jalan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jalan $jalan)
    {
        //
        abort_unless(\Gate::allows('jalan_edit'), 403);

        return view('admin.jalan.edit', compact('jalan'));
    }

    public function update(UpdateJalanRequest $request, Jalan $jalan)
    {
        //
        abort_unless(\Gate::allows('jalan_edit'), 403);

        $jalan->update($request->all());

        return redirect()->route('admin.jalan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jalan  $jalan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jalan $jalan)
    {
        //
        abort_unless(\Gate::allows('jalan_delete'), 403);

        $jalan->delete();

        return back();
    }

    public function massDestroy(MassDestroyJalanRequest $request)
    {
        Jalan::whereIn('idLapor', request('ids'))->delete();

        return response(null, 204);
    }
    
}
