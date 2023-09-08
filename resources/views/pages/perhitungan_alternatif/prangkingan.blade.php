<x-app-layout>


    @slot('content')
    <div class="container-fluid px-4">
        @section('title')Prangkingan @endsection
        <h4 class="mb-2 mt-4">Prangkingan</h4>
        <hr>

        @if ((count($kriterias) * count($kriterias)) == count($perhitungans_all))
        <div class="row">
            <div class="col-md-6">
                @if (($is_valid) && $is_valid->is_valid)
                <span class="alert alert-success text-white py-2" style="font-size: 11px">Matrix Kriteria valid</span>
                @endif

                @if (($is_valid) && !$is_valid->is_valid)
                <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                    <img src="{{ asset('/dashboard/error-404.png') }}" alt="Empty Data" style="height: 300px"
                        class="img-fluid">
                    <div class="mt-3">
                        <h6 class="text-center" style="font-size: 14px">Nilai Consistensi Ratio
                            dan Consistensi Index kriteria tidak valid, silahkan input kembali
                        </h6>
                        <h6 class="text-center" style="font-size: 14px">Silahkan Diisi Terlebih Dahulu</h6>
                    </div>
                    <a href="/perhitungan"><button class="btn btn-primary mt-4 text-light" style="font-size: 14px"><i
                                class="bi bi-arrow-left"></i> Ke Matrix Kriteria</button></a>
                </div>
                @endif

                @if ($is_subkriteria_valid)
                <span class="alert alert-success text-white py-2" style="font-size: 11px">Matrix ubkriteria valid</span>
                @else
                <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                    <img src="{{ asset('/dashboard/error-404.png') }}" alt="Empty Data" style="height: 300px"
                        class="img-fluid">
                    <div class="mt-3">
                        <h6 class="text-center" style="font-size: 14px">Nilai
                            Consistensi Ratio
                            dan Consistensi Index subkriteria tidak valid, silahkan input kembali
                        </h6>
                        <h6 class="text-center" style="font-size: 14px">Silahkan Diisi Terlebih Dahulu</h6>
                    </div>
                    <a href="/perhitungan_subkriteria"><button class="btn btn-primary mt-4 text-light"
                            style="font-size: 14px"><i class="bi bi-arrow-left"></i> Ke Hitung Subkriteria</button></a>
                </div>
                @endif
            </div>
        </div>


        @if (count($alternatifs) > 0)
        @php
        $isAlternativeDetailsFilled = true;
        foreach ($alternatifs as $alternatif) {
        if (!$alternatif->alternatifdetails->count()) {
        $isAlternativeDetailsFilled = false;
        break;
        }
        }
        @endphp

        @if ($isAlternativeDetailsFilled)
        @if (($is_valid && $is_valid->is_valid) && $is_subkriteria_valid)
        <div class="row my-4 mx-1 mb-5">
            <div class="card col-md-12 p-4">
                <h4 class="mb-4">Peringkat Alternatif</h4>
                @if (count($kriterias) && count($alternatifs))
                <?php
                    $rank = array();
                    foreach ($alternatifs as $outerIndex => $alternatif) {
                        $total = 0;
                        foreach ($kriterias as $innerIndex => $kriteria3) {
                            $alternatifDetail = $kriteria3->alternatifdetails()->where('id_alternatif', $alternatif->id)->first();
                            if ($alternatifDetail) {
                                $id_subkriteria = $alternatifDetail->id_subkriteria;
                                $nilai_prioritas_kriteria = $kriteria3->nilaiprioritaskriteria->nilai_prioritas;
                                $nilai_prioritas_subkriteria = $nilai_prioritas_subkriterias->where('id_subkriteria', $id_subkriteria)->first();
                                if ($nilai_prioritas_subkriteria) {
                                    $total += $nilai_prioritas_subkriteria->nilai_prioritas * $nilai_prioritas_kriteria;
                                }
                            }
                        }
                        if ($total > 0) {
                            $rank[] = [
                                'alternatif_nama' => $alternatif->nama,
                                'alternatif_nik' => $alternatif->nik,
                                'total' => $total
                            ];
                        }
                    }
                    usort($rank, function ($a, $b) {
                        return $a['total'] <=> $b['total'];
                    });
                    ?>

                @if (count($rank) > 0)
                <div class="table-responsive">
                    <table class="table table-striped border">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" style="width:10%">No</th>
                                <th scope="col" style="width:30%">NIP</th>
                                <th scope="col" style="width:30%">Alternatif</th>
                                <th scope="col" style="width:30%">Total Nilai</th>
                                <th scope="col" style="width:30%">Rangking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rank as $index => $alternative)
                            <tr class="text-center">
                                <td class="fw-bold">{{ ($index + 1) }}</td>
                                <td>{{ $alternative['alternatif_nik'] }}</td>
                                <td>{{ $alternative['alternatif_nama'] }}</td>
                                <td>{{ number_format($alternative['total'], 2) }}</td>
                                <td class="fw-bold"><strong>{{ ($index + 1) }}</strong></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                    <img src="{{ asset('/dashboard/error-404.png') }}" alt="Empty Data" style="height: 300px"
                        class="img-fluid">
                    <div class="mt-3">
                        <h6 class="text-center">Tidak ada data yang dapat digunakan untuk peringkat.</h6>
                        <h6 class="text-center">Karena Matrix Subkriteria masih ada yang kosong</h6>
                    </div>
                </div>
                @endif
                @else
                <div class="alert py-2 text-center" style="font-size: 12px">
                    Harap mengisi nilai Parameter kriteria dan subkriteria terlebih dahulu pada alternatif.
                </div>
                @endif
            </div>
        </div>


        @endif

        @else
        <div class="d-flex flex-column justify-content-center align-items-center mt-5">
            <img src="{{ asset('/dashboard/error-404.png') }}" alt="Empty Data" style="height: 300px" class="img-fluid">
            <div class="mt-3">
                <h6 class="text-center">Ada Data Nilai Alternatif yang Masih Kosong</h6>
                <h6 class="text-center">Silahkan Diisi Terlebih Dahulu</h6>
            </div>
            <a href="/perhitungan_subkriteria/alternatif"><button class="btn btn-primary mt-4  text-light"><i
                        class="bi bi-arrow-left"></i> Ke Hitung Alternatif</button></a>
        </div>
        @endif


        @else
        <div class="d-flex flex-column justify-content-center align-items-center mt-5">
            <img src="{{ asset('/dashboard/error-404.png') }}" alt="Empty Data" style="height: 300px" class="img-fluid">
            <div class="mt-3">
                <h6 class="text-center">Ada Data Nilai Alternatif atau Matrik Kriteria/Subkriteria yang Masih Kosong
                </h6>
                <h6 class="text-center">Silahkan Diisi Terlebih Dahulu</h6>
            </div>
            <a href="/perhitungan_subkriteria/alternatif"><button class="btn btn-primary mt-4  text-light"><i
                        class="bi bi-arrow-left"></i> Ke Hitung Alternatif</button></a>
        </div>
        @endif

        @else
        <div class="d-flex flex-column justify-content-center align-items-center mt-5">
            <img src="{{ asset('/dashboard/error-404.png') }}" alt="Empty Data" style="height: 300px" class="img-fluid">
            <div class="mt-3">
                <h6 class="text-center">Nilai Consistensi Ratio
                    dan Consistensi Index Kriteria/Subkriteria tidak valid, silahkan input kembali
                </h6>
                <h6 class="text-center">Silahkan Diisi Terlebih Dahulu</h6>
            </div>
        </div>
        @endif

    </div>
    @endslot


</x-app-layout>

<script>
    $(document).ready(function() {

            $('.matrix_select').on('change', function(e) {
                var selectedOption = $(this).find('option:selected');
                if (!selectedOption.is(':disabled')) {
                    var id = $(this).data('id');
                    id = id.split(',');
                    var targetElement = $('[data-id="' + id[1] + ',' + id[0] + '"]');
                    var optionText = '1' + '/' + selectedOption.val();
                    var optionValue = 1/parseInt(selectedOption.val());

                    // Remove previously appended option
                    targetElement.find('option[data-dynamic="true"]').remove();
                    $(this).find('option[data-dynamic="true"]').remove();
                    // Add the new option
                    targetElement.append($('<option>', {
                        value: optionValue,
                        text: optionText,
                        selected: true,
                        disabled: true,
                        'data-dynamic': true
                    }));
                }
            });


            // Enable the disabled select element before submitting the form
            $('form').submit(function() {
                $(this).find('select:disabled').prop('disabled', false);
                $(this).find('option:disabled').prop('disabled', false);
            });

        });
</script>
