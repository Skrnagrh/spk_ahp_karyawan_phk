<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatifs = Alternatif::all(); // Retrieve paginated data with 10 items per page

        return view('pages.alternatif.index', ['alternatifs' => $alternatifs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nik' => 'required|unique:alternatifs',
            'nama' => 'required',
        ]);

        $alternatif = new Alternatif();
        $alternatif->nama = $request->nama;
        $alternatif->nik = $request->nik;
        $alternatif->bagian = $request->bagian;

        $alternatif->save();
        return redirect('/alternatif')->with('success', 'Berhasil menambahkan alternatif');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternatif $alternatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        $id = $request->post('id_alternatif');
        $alternatif = Alternatif::where('id', $id)->first();
        if (!$alternatif) {
            return redirect('alternatif')->with('error', 'Gagal edit alternatif');
        }
        $alternatif->nama = $request->post('nama');
        $alternatif->nik = $request->post('nik');
        $alternatif->save();

        return redirect('/alternatif')->with('success', 'Berhasil edit alternatif');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id_alternatif');
        $alternatif = Alternatif::where('id', $id)->first();
        if (!$alternatif) {
            return redirect('alternatif')->with('error', 'Gagal menghapus alternatif');
        }
        $alternatif->delete();
        return redirect('alternatif')->with('success', 'Berhasil menghapus alternatif');
    }
}
