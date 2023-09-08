<x-app-layout>
    <script src="/dashboard/js/datatables-simple-demo.js"></script>
    @slot('content')
    <div class="container-fluid px-4">
        @section('title')Hitung Alternatif @endsection

        <h4 class="mb-2 mt-4">Perhitungan Alternatif</h4>
        <hr>

        @if ((count($kriterias) * count($kriterias)) == count($perhitungans_all))
        <div class="row m-3">
            <div class="card col-12 p-4">
                <div class="col-12">
                    <div class="mb-2">
                        @if (($is_valid) && $is_valid->is_valid)
                        <span class="alert alert-success text-white py-2" style="font-size: 11px">Nilai Consistensi
                            Ratio dan Consistensi Index kriteria valid</span>
                        @endif

                        @if (($is_valid) && !$is_valid->is_valid)
                        <span class="alert alert-danger text-white py-2" style="font-size: 11px"><a href="/perhitungan"
                                class="text-decoration-none text-white">Nilai Consistensi Ratio
                                dan Consistensi Index kriteria tidak valid, silahkan input kembali</a></span>
                        @endif

                        @if ($is_subkriteria_valid)
                        <span class="alert alert-success text-white py-2" style="font-size: 11px">Nilai Consistensi
                            Ratio dan Consistensi Index subkriteria valid</span>
                        @else
                        <span class="alert alert-danger text-white py-2" style="font-size: 11px"><a
                                href="/perhitungan_subkriteria" class="text-decoration-none text-white">Nilai
                                Consistensi Ratio
                                dan Consistensi Index subkriteria tidak valid, silahkan input kembali</a></span>
                        @endif

                    </div>
                </div>

                <h4 class="mb-4">Nilai Alternatif</h4>

                @if (count($kriterias) && count($alternatifs))
                <form method="post" action="/perhitungan_subkriteria/store">
                    @csrf
                    @method('POST')
                    <table class="table table-striped border" id="datatablesSimple3">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" style="width:5%" rowspan="2">No</th>
                                <th scope="col" style="width:10%" rowspan="2">Alternatif</th>
                                <th scope="col" style="width:10%" colspan="{{ count($kriterias) }}">Kriteria</th>
                            </tr>
                            <tr>
                                @foreach ($kriterias as $kriteria)
                                <th scope="col" class="text-center">{{$kriteria->nama_kriteria}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatifs as $outerIndex => $alternatif)
                            <tr class="text-center">
                                <td class="fw-bold">{{ ($outerIndex + 1) }}</td>
                                <td class="fw-bold">{{$alternatif->nama}}</td>

                                @foreach ($kriterias as $innerIndex => $kriteria2)
                                <?php $alternatifDetail = $kriteria2->alternatifdetails()->where('id_alternatif', $alternatif->id)->first(); ?>
                                <td>
                                    @if ($alternatifDetail)
                                    {{ $kriteria2->subkriterias()->where('id',
                                    $alternatifDetail->id_subkriteria)->first()->nama_subkriteria }}
                                    @else
                                    <a href="/alternatif_detail?id={{$alternatif->id}}" class="btn btn-primary">Isi
                                        Nilai Alternatif</a>
                                    @endif
                                </td>
                                @endforeach

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
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
        <div class="row my-4 mx-3 mb-5">
            <div class="card col-12 p-4">
                <h4 class="mb-4">Hitung Nilai Akhir</h4>
                @if (count($kriterias) && count($alternatifs))
                <form method="post" action="/perhitungan_subkriteria/store">
                    @csrf
                    @method('POST')
                    <table class="table table-striped border" id="datatablesSimple">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" style="width:10%" rowspan="2">No</th>
                                <th scope="col" style="width:10%" rowspan="2">Alternatif</th>
                                <th scope="col" style="width:10%" colspan="{{ count($kriterias) }}">Kriteria</th>
                                <th scope="col" style="width:10%" rowspan="2">Total</th>
                            </tr>
                            <tr>
                                @foreach ($kriterias as $kriteria)
                                <th scope="col" class="text-center">{{ $kriteria->nama_kriteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rank = array(); ?>
                            @foreach ($alternatifs as $outerIndex => $alternatif)
                            <tr class="text-center">
                                <td class="fw-bold">{{ ($outerIndex + 1) }}</td>
                                <td class="fw-bold">{{ $alternatif->nama }}</td>
                                <?php $total = 0; ?>
                                @foreach ($kriterias as $innerIndex => $kriteria3)
                                <?php
                                     $id_subkriteria = $kriteria3->alternatifdetails()->where('id_alternatif', $alternatif->id)->first()->id_subkriteria;
                                     $nilai_prioritas_kriteria = $kriteria3->nilaiprioritaskriteria->nilai_prioritas;
                                     $nilai_prioritas_subkriteria = $nilai_prioritas_subkriterias->where('id_subkriteria', $id_subkriteria)->first();
                                ?>
                                <td>
                                    @if ($nilai_prioritas_subkriteria)
                                    {{ number_format($nilai_prioritas_subkriteria->nilai_prioritas *
                                    $nilai_prioritas_kriteria, 2) }}
                                    <?php $total += $nilai_prioritas_subkriteria->nilai_prioritas * $nilai_prioritas_kriteria; ?>
                                    @else
                                    @if ($innerIndex == 0)
                                    <!-- Tampilkan tautan "Hitung Subkriteria" dengan href yang sesuai -->
                                    <a href="/perhitungan_subkriteria/matrix?id=1" class="text-primary">Hitung
                                        Subkriteria</a>
                                    @elseif ($innerIndex == 1)
                                    <a href="/perhitungan_subkriteria/matrix?id=2" class="text-primary">Hitung
                                        Subkriteria</a>
                                    @elseif ($innerIndex == 2)
                                    <a href="/perhitungan_subkriteria/matrix?id=3" class="text-primary">Hitung
                                        Subkriteria</a>
                                    @elseif ($innerIndex == 3)
                                    <a href="/perhitungan_subkriteria/matrix?id=4" class="text-primary">Hitung
                                        Subkriteria</a>
                                    @endif
                                    @endif
                                </td>
                                @endforeach

                                @if ($total > 0)
                                <td>{{ number_format($total, 2) }}</td>
                                @else
                                <td class="text-primary">Tidak ada Hasil</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @foreach ($alternatifs as $alternatif)
                    @if (!$alternatif->alternatifdetails->count())
                    <a href="{{ route('alternatifdetails.create', $alternatif->id) }}" class="btn btn-primary mt-3">Isi
                        Nilai Alternatif</a>
                    @break
                    @endif
                    @endforeach
                </form>
                @endif

                <?php
                            usort($rank, function($a, $b) {
                                return $b[0]['total'] <=> $a[0]['total'];
                            });
                        ?>
            </div>
        </div>

        @endif

        @else
        <div class="row my-4 mx-3 mb-5">
            <div class="card col-12 p-4">
                <h4 class="mb-4">Hitung Nilai Akhir</h4>
                <!-- Table for calculating final scores -->
                @if (count($kriterias) && count($alternatifs))
                <form method="post" action="/perhitungan_subkriteria/store">
                    @csrf
                    @method('POST')
                    <table class="table table-striped border" id="datatablesSimple2">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" style="width:10%" rowspan="2">No</th>
                                <th scope="col" style="width:10%" rowspan="2">Alternatif</th>
                                <th scope="col" style="width:10%" colspan="{{ count($kriterias) }}">Kriteria</th>
                                <th scope="col" style="width:10%" rowspan="2">Total</th>
                            </tr>
                            <tr>
                                @foreach ($kriterias as $kriteria)
                                <th scope="col" class="text-center">{{ $kriteria->nama_kriteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rank = array(); ?>
                            @foreach ($alternatifs as $outerIndex => $alternatif)
                            <tr class="text-center">
                                <td class="fw-bold">{{ ($outerIndex + 1) }}</td>
                                <td class="fw-bold">{{ $alternatif->nama }}</td>
                                <?php $total = 0; ?>
                                @foreach ($kriterias as $innerIndex => $kriteria)
                                <?php
                                                $alternatifDetail = $kriteria->alternatifdetails()->where('id_alternatif', $alternatif->id)->first();
                                                if ($alternatifDetail) {
                                                    $id_subkriteria = $alternatifDetail->id_subkriteria;
                                                    $nilai_prioritas_kriteria = $kriteria->nilaiprioritaskriteria->nilai_prioritas;
                                                    $nilai_prioritas_subkriteria = $nilai_prioritas_subkriterias->where('id_subkriteria', $id_subkriteria)->first();
                                                    $nilai = $nilai_prioritas_subkriteria ? $nilai_prioritas_subkriteria->nilai_prioritas * $nilai_prioritas_kriteria : 0;
                                                    $total += $nilai;
                                                } else {
                                                    $nilai = 0;
                                                }
                                                ?>
                                <td>
                                    @if ($nilai != 0)
                                    {{ number_format($nilai, 2) }}
                                    @else
                                    @foreach ($alternatifs as $alternatif)
                                    @if (!$alternatif->alternatifdetails->count())
                                    <span class="text-danger">Harap isi nilai</span>
                                    @break
                                    @endif
                                    @endforeach

                                    @endif

                                </td>
                                @endforeach

                                <?php
                                                    array_push($rank, array([
                                                        'alternatif_nama' => $alternatif->nama,
                                                        'total' => $total
                                                    ]));
                                                    ?>
                                <td>
                                    @if ($total != 0)
                                    {{ number_format($total, 2) }}</td>
                                @else
                                @foreach ($alternatifs as $alternatif)
                                @if (!$alternatif->alternatifdetails->count())
                                <span class="text-danger">Tidak ada nilai</span>
                                @break
                                @endif
                                @endforeach
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                @endif
            </div>
        </div>
        @endif
        @else
        <p>Tidak ada data alternatif yang tersedia.</p>
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
