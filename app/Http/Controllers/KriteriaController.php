<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::all();

        return view('pages.kriteria.index', ['kriterias' => $kriterias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $kriteria)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kriteriaModel = new Kriteria();
        $kriteriaModel->nama_kriteria = $request->nama_kriteria;

        $kriteriaModel->save();
        return redirect('/kriteria')->with('success', 'Berhasil menambahkan kriteria');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        $id = $request->input('id_kriteria');
        $kriteria = Kriteria::where('id', $id)->first();
        $kriteria->nama_kriteria = $request->input('nama_kriteria');
        $kriteria->save();
        return redirect('/kriteria')->with('success', 'Berhasil edit kriteria');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id_kriteria');
        $subkriteria = Kriteria::where('id', $id)->first();
        $subkriteria->delete();
        return redirect('kriteria')->with('success', 'Berhasil menghapus kriteria');
    }
}
