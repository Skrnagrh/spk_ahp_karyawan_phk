<?php

namespace App\Http\Controllers;

use App\Http\helpers\Formula;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\KriteriaValid;
use App\Models\MatrixNilaiSubkriteria;
use App\Models\NilaiPrioritasSubkriteria;
use App\Models\Perhitungan;
use App\Models\PerhitunganSubkriteria;
use App\Models\SubKriteria;
use App\Models\SubkriteriaValid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PerhitunganSubkriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::get();
        return view('pages.perhitungan_subkriteria.index', ['kriterias' => $kriterias]);
    }

    public function matrix(Request $request)
    {
        $id = $request->query('id');
        if ($id == null) {
            return redirect('perhitungan_subkriteria');
        }
        $is_valid = SubkriteriaValid::where('id_kriteria', $id)->first();
        $kriteria = Kriteria::where('id', $id)->firstOrFail();
        $nilai_index_random = (Formula::$nilai_index_random[count($kriteria->subkriterias)]);
        $perhitungans_all = PerhitunganSubkriteria::where('id_kriteria', $id)->get();
        return view('pages.perhitungan_subkriteria.matrix', ['kriteria' => $kriteria, 'is_valid' => $is_valid], [
            'perhitungans_all' => $perhitungans_all,
            'nilai_index_random' => $nilai_index_random
        ]);
    }


    public function store(Request $request)
    {
        $subkriterias = SubKriteria::where('id_kriteria', $request->post('id_kriteria'))->get();
        foreach ($subkriterias as $subkriteria) {
            $split = explode(' ', $subkriteria->nama_subkriteria);
            $join = implode('_', $split);
            if ($request->post($join) == null && count($request->post($join)) != count($subkriterias)) {
                return back()->with('error', 'Gagal menghitung, isi semua nilai prioritas subkriteria dengan benar');
            }

            foreach ($request->post($join) as $index => $nilai) {
                $perhitungan = PerhitunganSubkriteria::where('id_subkriteria', $subkriteria->id)->where('urutan', $index + 1)->first();
                if ($perhitungan == null) {
                    $perhitungan = new PerhitunganSubkriteria();
                }
                $perhitungan->urutan = $index + 1;
                $perhitungan->nilai = $nilai;
                $perhitungan->id_kriteria = $subkriteria->kriteria->id;
                $perhitungan->id_subkriteria = $subkriteria->id;

                $perhitungan->save();
            }
        }

        $jml_nilai_intensitas = DB::table('perhitungan_subkriterias')
            ->select('urutan', DB::raw('SUM(nilai) as total_nilai'))
            ->where('id_kriteria', $request->post('id_kriteria'))
            ->groupBy('urutan')
            ->get();
        $maks_lamda = 0;
        foreach ($subkriterias as $index2 => $subkriteria2) {
            $jml_nilai = 0;
            foreach ($subkriteria2->perhitungansubkriterias as $index3 => $perhitungansubkriteria) {
                $nilai_intensitas = $perhitungansubkriteria->nilai / $jml_nilai_intensitas[$index3]->total_nilai;
                $mtrx_n_krtr = MatrixNilaiSubkriteria::where('id_subkriteria', $subkriteria2->id)->where('urutan', $index3 + 1)->first();
                if ($mtrx_n_krtr == null) {
                    $mtrx_n_krtr = new MatrixNilaiSubkriteria();
                }

                $mtrx_n_krtr->id_subkriteria = $subkriteria2->id;
                $mtrx_n_krtr->id_kriteria = $subkriteria2->kriteria->id;
                $mtrx_n_krtr->urutan = $index3 + 1;
                $mtrx_n_krtr->nilai = $nilai_intensitas;

                $mtrx_n_krtr->save();
                $jml_nilai += $nilai_intensitas;
            }
            $maks_lamda += ($jml_nilai / count($subkriterias)) * $jml_nilai_intensitas[$index2]->total_nilai;
            $nilai_prioritas_kriteria = NilaiPrioritasSubkriteria::where('id_subkriteria', $subkriteria2->id)->first();
            if ($nilai_prioritas_kriteria == null) {
                $nilai_prioritas_kriteria = new NilaiPrioritasSubkriteria();
            }
            $nilai_prioritas_kriteria->jml_nilai = $jml_nilai;
            $nilai_prioritas_kriteria->id_subkriteria = $subkriteria2->id;
            $nilai_prioritas_kriteria->id_kriteria = $subkriteria2->kriteria->id;
            $nilai_prioritas_kriteria->nilai_prioritas = $jml_nilai / count($subkriterias);
            $nilai_prioritas_kriteria->save();
        }
        $nilai_index_random = [
            "1" => 0,
            "2" => 0,
            "3" => 0.58,
            "4" => 0.90,
            "5" => 1.12,
            "6" => 1.24,
            "7" => 1.32,
            "8" => 1.41,
            "9" => 1.45,
            "10" => 1.49,
            "11" => 1.51,
            "12" => 1.48,
            "13" => 1.56,
            "14" => 1.57,
            "15" => 1.59,
        ];
        $ci = ($maks_lamda - count($subkriterias)) / (count($subkriterias) - 1);
        $cr = $ci / ($nilai_index_random[count($subkriterias)]);
        $valid = SubkriteriaValid::where('id_kriteria', $request->post('id_kriteria'))->first();
        if (!$valid) {
            $valid = new SubkriteriaValid();
        }
        $valid->id_kriteria = $request->post('id_kriteria');
        if ($cr > 0.1) {
            $valid->is_valid = false;
            $valid->save();
            return redirect('/perhitungan_subkriteria/hasil?id=' . $request->post('id_kriteria'))->with('error', 'Gagal hitung, nilai Consistensi Ratio ' . number_format($cr, 3) . ' dan Consistensi Index ' . number_format($ci, 3) . ', lebih besar dari 0,1 atau 10%.');
        }

        $valid->is_valid = true;
        $valid->save();
        return redirect('/perhitungan_subkriteria/hasil?id=' . $request->post('id_kriteria'))->with('success', 'Berhasil hitung, nilai Consistensi Ratio ' . number_format($cr, 3) . ' dan Consistensi Index ' . number_format($ci, 3) . ', lebih kecil dari 0,1 atau 10%.');
    }


    public function alternatif()
    {
        $kriterias = Kriteria::get();
        $alternatifs = Alternatif::get();
        $nilai_prioritas_subkriterias = NilaiPrioritasSubkriteria::get();
        $perhitungans_all = Perhitungan::get();
        $is_valid = KriteriaValid::first();
        $is_subkriteria_valid = SubkriteriaValid::where('is_valid', false)->first();

        // Mengurutkan data perhitungan secara menurun berdasarkan kolom "total"
        $perhitungans_all = $perhitungans_all->sortByDesc('total')->values();

        return view('pages.perhitungan_alternatif.alternatif', [
            'kriterias' => $kriterias,
            'alternatifs' => $alternatifs,
            'nilai_prioritas_subkriterias' => $nilai_prioritas_subkriterias,
            'perhitungans_all' => $perhitungans_all,
            'is_valid' => $is_valid,
            'is_subkriteria_valid' => $is_subkriteria_valid ? false : true
        ]);
    }

    public function hasil(Request $request)
    {
        $id = $request->query('id');
        if ($id == null) {
            return redirect('perhitungan_subkriteria');
        }
        $is_valid = SubkriteriaValid::where('id_kriteria', $id)->first();
        $kriteria = Kriteria::where('id', $id)->firstOrFail();
        $nilai_index_random = (Formula::$nilai_index_random[count($kriteria->subkriterias)]);
        $perhitungans_all = PerhitunganSubkriteria::where('id_kriteria', $id)->get();
        return view('pages.perhitungan_alternatif.hasil',  [
            'kriteria' => $kriteria,
            'is_valid' => $is_valid,
            'perhitungans_all' => $perhitungans_all,
            'nilai_index_random' => $nilai_index_random
        ]);
    }

    public function prangkingan(Request $request)
    {
        $kriterias = Kriteria::get();
        $alternatifs = Alternatif::get();
        $nilai_prioritas_subkriterias = NilaiPrioritasSubkriteria::get();
        $perhitungans_all = Perhitungan::get();
        $is_valid = KriteriaValid::first();
        $is_subkriteria_valid = SubkriteriaValid::where('is_valid', false)->first();

        // Mengurutkan data perhitungan secara menurun berdasarkan kolom "total"
        $perhitungans_all = $perhitungans_all->sortByDesc('total')->values();

        return view('pages.perhitungan_alternatif.prangkingan', [
            'kriterias' => $kriterias,
            'alternatifs' => $alternatifs,
            'nilai_prioritas_subkriterias' => $nilai_prioritas_subkriterias,
            'perhitungans_all' => $perhitungans_all,
            'is_valid' => $is_valid,
            'is_subkriteria_valid' => $is_subkriteria_valid ? false : true
        ]);
    }
}
