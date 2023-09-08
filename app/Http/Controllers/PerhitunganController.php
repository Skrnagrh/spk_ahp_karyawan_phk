<?php

namespace App\Http\Controllers;

use App\Http\helpers\Formula;
use App\Models\Kriteria;
use App\Models\KriteriaValid;
use App\Models\MatrixNilaiKriteria;
use App\Models\NilaiPrioritasKriteria;
use App\Models\Perhitungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::get();
        $is_valid = KriteriaValid::first();
        $perhitungans_all = Perhitungan::get();
        $nilai_index_random = (Formula::$nilai_index_random[count($kriterias)]);
        return view('pages.perhitungan.index', [
            'kriterias' => $kriterias,
            'is_valid' => $is_valid,
            'perhitungans_all' => $perhitungans_all,
            'nilai_index_random' => $nilai_index_random
        ]);
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
        $kriterias = Kriteria::get();
        foreach ($kriterias as $kriteria) {
            $split = explode(' ', $kriteria->nama_kriteria);
            $join = implode('_', $split);
            if ($request->post($join) == null && count($request->post($join)) != count($kriterias)) {
                return back()->with('error', 'Gagal menghitung, isi semua nilai prioritas kriteria dengan benar');
            }

            foreach ($request->post($join) as $index => $nilai) {
                $perhitungan = Perhitungan::where('id_kriteria', $kriteria->id)->where('urutan', $index + 1)->first();
                if ($perhitungan == null) {
                    $perhitungan = new Perhitungan();
                }
                $perhitungan->urutan = $index + 1;
                $perhitungan->nilai = $nilai;
                $perhitungan->id_kriteria = $kriteria->id;

                $perhitungan->save();
            }
        }

        $jml_nilai_intensitas = DB::table('perhitungans')
            ->select('urutan', DB::raw('SUM(nilai) as total_nilai'))
            ->groupBy('urutan')
            ->get();
        $maks_lamda = 0;
        foreach ($kriterias as $index2 => $kriteria2) {
            $jml_nilai = 0;
            foreach ($kriteria2->perhitungans as $index3 => $perhitungan) {
                $nilai_intensitas = $perhitungan->nilai / $jml_nilai_intensitas[$index3]->total_nilai;
                $mtrx_n_krtr = MatrixNilaiKriteria::where('id_kriteria', $kriteria2->id)->where('urutan', $index3 + 1)->first();
                if ($mtrx_n_krtr == null) {
                    $mtrx_n_krtr = new MatrixNilaiKriteria();
                }

                $mtrx_n_krtr->id_kriteria = $kriteria2->id;
                $mtrx_n_krtr->urutan = $index3 + 1;
                $mtrx_n_krtr->nilai = $nilai_intensitas;

                $mtrx_n_krtr->save();
                $jml_nilai += $nilai_intensitas;
            }
            $maks_lamda += ($jml_nilai / count($kriterias)) * $jml_nilai_intensitas[$index2]->total_nilai;
            $nilai_prioritas_kriteria = NilaiPrioritasKriteria::where('id_kriteria', $kriteria2->id)->first();
            if ($nilai_prioritas_kriteria == null) {
                $nilai_prioritas_kriteria = new NilaiPrioritasKriteria();
            }
            $nilai_prioritas_kriteria->jml_nilai = $jml_nilai;
            $nilai_prioritas_kriteria->id_kriteria = $kriteria2->id;
            $nilai_prioritas_kriteria->nilai_prioritas = $jml_nilai / count($kriterias);
            $nilai_prioritas_kriteria->save();
        }
        $nilai_index_random = Formula::$nilai_index_random;

        $ci = ($maks_lamda - count($kriterias)) / (count($kriterias) - 1);
        $cr = $ci / ($nilai_index_random[count($kriterias)]);
        $valid = KriteriaValid::first();
        if (!$valid) {
            $valid = new KriteriaValid();
        }
        if ($cr > 0.1) {
            $valid->is_valid = false;
            $valid->save();
            return redirect('/perhitungan/hasil')->with('error', 'Gagal hitung, nilai Consistensi Ratio ' . number_format($cr, 3) . ' dan Consistensi Index ' . number_format($ci, 3) . ', lebih besar dari 0,1 atau 10%');
        }

        $valid->is_valid = true;
        $valid->save();
        return redirect('/perhitungan/hasil')->with('success', 'Berhasil hitung, nilai Consistensi Ratio ' . number_format($cr, 3) . ' dan Consistensi Index ' . number_format($ci, 3) . ', lebih besar dari 0,1 atau 10%');
    }

    public function hasil()
    {
        $kriterias = Kriteria::get();
        $is_valid = KriteriaValid::first();
        $perhitungans_all = Perhitungan::get();
        $nilai_index_random = (Formula::$nilai_index_random[count($kriterias)]);
        return view('pages.perhitungan/hasil', [
            'kriterias' => $kriterias,
            'is_valid' => $is_valid,
            'perhitungans_all' => $perhitungans_all,
            'nilai_index_random' => $nilai_index_random
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perhitungan $perhitungan)
    {
        //
    }
}
