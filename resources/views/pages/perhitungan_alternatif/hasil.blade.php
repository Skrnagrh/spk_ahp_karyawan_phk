@if (($is_valid) && $is_valid->is_valid)
<p class="alert alert-success text-white py-2 w-30 text-center" style="font-size: 12px">Nilai
    Consistensi Ratio dan Consistensi Index valid</p>
@endif
@if (($is_valid) && !$is_valid->is_valid)
<p class="alert alert-danger text-white py-2 w-30 text-center" style="font-size: 12px">Nilai
    Consistensi Ratio dan Consistensi Index tidak valid, silahkan input kembali</p>
@endif

<div class="row" id="hasil_container">
    <div class="card col-12 p-4">
        <form method="post" action="/perhitungan_subkriteria/store">
            @csrf
            @method('POST')
            <table class="table border">
                <thead>
                    <tr class="text-center">
                        <th class="border" scope="col" style="width:10%">Kriteria</th>
                        @foreach ($kriteria->subkriterias as $subkriteria)
                        <th class="border" scope="col">{{$subkriteria->nama_subkriteria}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total_nilai_prioritas = array();
                    @endphp
                    @foreach ($kriteria->subkriterias as $outerIndex => $subkriteria2)
                    <tr class="text-center">
                        <td class="fw-bold border">{{$subkriteria2->nama_subkriteria}}</td>
                        @foreach ($kriteria->subkriterias as $innerIndex => $subkriteria3)
                        <td class="border">
                            @if (count($subkriteria2->perhitungansubkriterias))
                            @if ($subkriteria2->perhitungansubkriterias[$innerIndex])
                            @php
                            $total_nilai_prioritas[$innerIndex] =
                            isset($total_nilai_prioritas[$innerIndex]) ?
                            ($total_nilai_prioritas[$innerIndex] +
                            $subkriteria2->perhitungansubkriterias[$innerIndex]->nilai) :
                            $subkriteria2->perhitungansubkriterias[$innerIndex]->nilai;
                            @endphp
                            @if (Auth::user()->admin == 'manager')
                            <select name="{{$subkriteria2->nama_subkriteria . '[]'}}"
                                class="form-select px-4 matrix_select" style="padding: 5px 20px" disabled>
                                <option value="{{$subkriteria2->perhitungansubkriterias[$innerIndex]->nilai}}"
                                    data-dynamic="true">
                                    {{number_format($subkriteria2->perhitungansubkriterias[$innerIndex]->nilai, 2)}}
                                </option>
                            </select>
                            @else
                            <select name="{{$subkriteria2->nama_subkriteria . '[]'}}"
                                class="form-select px-4 matrix_select" style="padding: 5px 20px"
                                {{$innerIndex==$outerIndex ? 'disabled' : '' }}
                                data-id="{{$innerIndex . ',' . $outerIndex}}">
                                <option value="{{$subkriteria2->perhitungansubkriterias[$innerIndex]->nilai}}"
                                    data-dynamic="true">
                                    {{number_format($subkriteria2->perhitungansubkriterias[$innerIndex]->nilai, 2)}}
                                </option>
                                @foreach (range(1,9) as $point)
                                <option value="{{$point}}">{{$point}}</option>
                                @endforeach
                            </select>
                            @endif
                            @endif
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                    <tr class="text-center">
                        <td class="border fw-bold text-center">Jumlah</td>
                        @foreach ($total_nilai_prioritas as $tnp)
                        <td class="fw-bold border">{{number_format($tnp, 2)}}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="id_kriteria" id="" value="{{$kriteria->id}}">
            <div class="col-12 text-end">
                <a href="/perhitungan_subkriteria" class="btn btn-warning">Kembali</a>
                <button type="submit" id="hitung_nilai_btn" class="btn btn-primary"
                    style="@if(count($kriteria->subkriterias)) display: none; @endif">Hitung Nilai</button>
            </div>
        </form>
    </div>

    <div class="card col-12 p-4 my-5">
        <h4 class="mb-4">Matrix Nilai Perbandingan {{ $kriteria->nama_kriteria }}</h4>
        @if (count($kriteria->subkriterias))
        <table class="table border">
            <thead>
                <tr class="text-center">
                    <th class="border w-10" scope="col">Kriteria</th>
                    @foreach ($kriteria->subkriterias as $subkriteria1)
                    <th class="border" scope="col">{{$subkriteria1->nama_subkriteria}}</th>
                    @endforeach
                    <th class="border w-10" scope="col">Jumlah</th>
                    <th class="border w-10" scope="col">Prioritas</th>
                </tr>
            </thead>
            <tbody>
                @php
                $max_lamda = 0;
                @endphp
                @foreach ($kriteria->subkriterias as $outerIndex2 => $subkriteria4)
                <tr class="text-center">
                    <td class="fw-bold border">{{$subkriteria4->nama_subkriteria}}</td>
                    @php
                    $jml_nilai = 0;
                    @endphp
                    @foreach ($kriteria->subkriterias as $innerIndex2 => $subkriteria3)
                    <td class="border">
                        @if (count($subkriteria4->perhitungansubkriterias))
                        @if ($subkriteria4->perhitungansubkriterias[$innerIndex2])
                        @php
                        $jml_nilai +=
                        $subkriteria4->perhitungansubkriterias[$innerIndex2]->nilai /
                        $total_nilai_prioritas[$innerIndex2];
                        $nilai_p_kriteria =
                        $subkriteria4->perhitungansubkriterias[$innerIndex2]->nilai /
                        $total_nilai_prioritas[$innerIndex2];
                        @endphp
                        {{number_format($nilai_p_kriteria, 2)}}
                        @endif
                        @endif
                    </td>
                    @endforeach
                    <td class="border">{{number_format($jml_nilai, 2)}}</td>
                    <td class="border">
                        {{number_format($jml_nilai/count($kriteria->subkriterias),
                        2)}}</td>
                </tr>
                @php
                $max_lamda += ($jml_nilai/count($kriteria->subkriterias)) *
                $total_nilai_prioritas[$outerIndex2];
                @endphp
                @endforeach
            </tbody>
        </table>
        <div class="col-12 my-2 w-70 mx-auto">
            @php
            $length = count($kriteria->subkriterias);
            $ci = ($max_lamda - $length) / ($length-1);
            @endphp
            <p class="p-0 m-0" style="color: #333">Max λ = {{number_format($max_lamda, 2)}}</p>
            <p class="p-0 m-0" style="color: #333">n = {{$length}}</p>
            <div class="row">
                <div class="col-6">
                    <p class="p-0 m-0" style="color: #333">Consistensi Index = (max λ - n) /
                        (n-1)
                    </p>
                    <p class="p-0 m-0" style="color: #333">CI = ({{number_format($max_lamda,
                        2)}} -
                        {{$length}}) / {{$length-1}}</p>
                    <p class="p-0 m-0" style="color: #333">CI = {{number_format($ci, 2)}}</p>
                </div>
                <div class="col-6">
                    <p class="p-0 m-0" style="color: #333">Consistensi Ratio = CI/IR</p>
                    <p class="p-0 m-0" style="color: #333">CR =
                        {{number_format(number_format($ci,2))}} / {{$nilai_index_random}}</p>
                    <p class="p-0 m-0" style="color: #333">CR =
                        {{number_format($ci/$nilai_index_random , 2)}}</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

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

        $('form').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission
            $(this).find('select:disabled').prop('disabled', false);
            $(this).find('option:disabled').prop('disabled', false);
            var formData = $(this).serialize(); // Serialize the form data

            $.ajax({
                url: '/perhitungan_subkriteria/store',
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    $('#hasil_container').html(response);
                },
                error: function() {
                // Handle the error if the request fails
                }
            });
        });


    });
</script>

<script>
    $(document).ready(function() {
    // Listen for changes in any select element
    $('.matrix_select').on('change', function() {
        var isAnySelected = false;
        $('.matrix_select').each(function() {
            if ($(this).val() !== '') {
                isAnySelected = true;
                return false; // Exit the loop early
            }
        });

        // Show/hide the "Hitung Nilai" button based on selection status
        if (isAnySelected) {
            $('#hitung_nilai_btn').show();
        } else {
            $('#hitung_nilai_btn').hide();
        }
        });
    });
</script>
