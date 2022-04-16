<?php

namespace App\Http\Controllers\Admin;

use App\Pengguna;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyPenggunaRequest;

use App\Http\Requests\UpdatePenggunaRequest;
use Illuminate\Support\Facades\DB;


class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_unless(\Gate::allows('pengguna_access'), 403);

        $penggunas = Pengguna::all();
        return view('admin.pengguna.index', compact('penggunas'));

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
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        //
        abort_unless(\Gate::allows('pengguna_show'), 403);

        return view('admin.pengguna.show', compact('pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        //
        abort_unless(\Gate::allows('pengguna_edit'), 403);

        return view('admin.pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenggunaRequest $request, Pengguna $pengguna)
    {
        //
        abort_unless(\Gate::allows('pengguna_edit'), 403);

        $pengguna->update($request->all());

        return redirect()->route('admin.pengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        //
        abort_unless(\Gate::allows('pengguna_delete'), 403);

        $pengguna->delete();

        return back();
    }
    public function massDestroy(MassDestroyPenggunaRequest $request)
    {
        Pengguna::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
