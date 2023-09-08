<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Models\AlternatifDetail;
use Illuminate\Routing\Controller;

class AlternatifDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->query('id');
        if($id == null) {
            return redirect('alternatif');
        }
        $details = AlternatifDetail::where('id_alternatif', $id)
        ->get();
        $kriterias = Kriteria::get();
        $alternatif = Alternatif::findOrFail($id);
        return view('pages.alternatif_detail.index', compact('details', 'kriterias', 'alternatif'));
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
        if(!$request->post('list_subkriteria')) {
            return redirect('/alternatif_detail?id=' . $request->id_alternatif)->with('error', 'Gagagl menambahkan detail');
        }
        $id_alternatif = $request->post('id_alternatif');
        $kriteria_id = $request->post('kriteria_id');
        if($request->post('list_subkriteria')) {
            foreach($request->post('list_subkriteria') as $index => $subkriteria) {
                $alternatif_detail = AlternatifDetail::where('id_alternatif', $id_alternatif)->where('id_kriteria', $kriteria_id[$index])->first();
                if(!$alternatif_detail) {
                    $alternatif_detail = new AlternatifDetail();
                    $alternatif_detail->id_alternatif = $id_alternatif;
                    $alternatif_detail->id_kriteria = $kriteria_id[$index];
                }
                $alternatif_detail->id_subkriteria = $subkriteria;
                $alternatif_detail->save();
            }
            // return redirect('/siswa_detail?id=' . $id_alternatif)->with('success', 'Berhasil menambahkan detail');
            return redirect('/alternatif')->with('success', 'Berhasil menambahkan detail');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AlternatifDetail $alternatifDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlternatifDetail $alternatifDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlternatifDetail $alternatifDetail)
    {
        $id = $request->input('id_alternatifDetails');
        $alternatifDetail = AlternatifDetail::where('id', $id)->first();
        $alternatifDetail->nama_AlternatifDetail = $request->input('nama_alternatifDetails');
        $id_kriteria = $alternatifDetail->id_kriteria;
        $alternatifDetail->save();
        return redirect('/alternatif_detail?id=' . $id_kriteria)->with('success', 'Berhasil edit detail');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id_alternatifDetails');
        $alternatifDetail = AlternatifDetail::where('id', $id)->first();
        $id_kriteria = $alternatifDetail->id_kriteria;
        $alternatifDetail->delete();
        return redirect('/alternatif_detail?id=' . $id_kriteria)->with('success', 'Berhasil menghapus AlternatifDetail');
    }
}
