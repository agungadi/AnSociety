<?php

namespace App\Http\Controllers\Admin;

use App\Jembatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJembatanRequest;

use App\Http\Requests\UpdateJembatanRequest;
use Illuminate\Support\Facades\DB;


class JembatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_unless(\Gate::allows('jembatan_access'), 403);

        $jembatans = Jembatan::all();
        return view('admin.jembatan.index', compact('jembatans'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jembatan  $jembatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jembatan $jembatan)
    {
        //
        abort_unless(\Gate::allows('jembatan_show'), 403);

        return view('admin.jembatan.show', compact('jembatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jembatan  $jembatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jembatan $jembatan)
    {
        //
        abort_unless(\Gate::allows('jembatan_edit'), 403);

        return view('admin.jembatan.edit', compact('jembatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jembatan  $jembatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJembatanRequest $request, Jembatan $jembatan)
    {
        //
        abort_unless(\Gate::allows('jembatan_edit'), 403);

        $jembatan->update($request->all());

        return redirect()->route('admin.jembatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jembatan  $jembatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jembatan $jembatan)
    {
        abort_unless(\Gate::allows('jembatan_delete'), 403);

        $jembatan->delete();

        return back();
    }

    public function massDestroy(MassDestroyJembatanRequest $request)
    {
        Jembatan::whereIn('idLapor', request('ids'))->delete();

        return response(null, 204);
    }
}
