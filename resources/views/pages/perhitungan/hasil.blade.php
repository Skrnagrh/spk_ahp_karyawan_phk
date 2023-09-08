<div class="container-fluid  px-4">

    <div class="row" id="hasil_container">
        @if ((count($kriterias) * count($kriterias)) == count($perhitungans_all))
        @if (($is_valid) && $is_valid->is_valid)
        <p class="alert alert-success text-white py-2 w-30 text-center" style="font-size: 12px">Nilai Consistensi
            Ratio dan Consistensi Index valid</p>
        @endif

        @if (($is_valid) && !$is_valid->is_valid)
        <p class="alert alert-danger text-white py-2 w-30 text-center" style="font-size: 12px">Nilai Consistensi
            Ratio dan Consistensi Index tidak valid, silahkan input kembali</p>
        @endif
        @endif
        <div class="card col-12 p-4">


            @if (count($kriterias))
            <form method="post" action="/perhitungan/store">
                @csrf
                @method('POST')
                <table class="table border">
                    <thead>
                        <tr class="text-center">
                            <th class="border" scope="col" style="width:10%">Kriteria</th>
                            @foreach ($kriterias as $kriteria1)
                            <th class="border" scope="col">{{$kriteria1->nama_kriteria}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>

                        <?php $total_nilai_prioritas = array(); ?>

                        @foreach ($kriterias as $outerIndex => $kriteria2)
                        <tr class="text-center">
                            <td class="fw-bold border">{{$kriteria2->nama_kriteria}}</td>
                            @foreach ($kriterias as $innerIndex => $kriteria3)
                            <td class="border">
                                @if ((count($kriterias) * count($kriterias)) != count($perhitungans_all))
                                <select name="{{$kriteria2->nama_kriteria . '[]'}}"
                                    class="form-select px-4 matrix_select" style="padding: 5px 20px"
                                    {{$innerIndex==$outerIndex ? 'disabled' : '' }}
                                    data-id="{{$innerIndex . ',' . $outerIndex}}">
                                    @foreach (range(1,9) as $point)
                                    <option value="{{$point}}">{{$point}}</option>
                                    @endforeach
                                </select>
                                @else

                                <select name="{{$kriteria2->nama_kriteria . '[]'}}"
                                    class="form-select px-4 matrix_select" style="padding: 5px 20px"
                                    {{$innerIndex==$outerIndex ? 'disabled' : '' }}
                                    data-id="{{$innerIndex . ',' . $outerIndex}}">
                                    @if (count($kriteria2->perhitungans))
                                    @if ($kriteria2->perhitungans[$innerIndex])
                                    <?php
                                                    $total_nilai_prioritas[$innerIndex] = ISSET($total_nilai_prioritas[$innerIndex]) ? ($total_nilai_prioritas[$innerIndex] + $kriteria2->perhitungans[$innerIndex]->nilai) : $kriteria2->perhitungans[$innerIndex]->nilai;
                                                ?>
                                    <option value="{{$kriteria2->perhitungans[$innerIndex]->nilai}}"
                                        data-dynamic="true">
                                        {{number_format($kriteria2->perhitungans[$innerIndex]->nilai, 2)}}</option>
                                    @endif
                                    @endif
                                    @foreach (range(1,9) as $point)
                                    <option value="{{$point}}">{{$point}}</option>
                                    @endforeach
                                </select>

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
                {{-- <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">
                        Hitung Nilai
                    </button>
                </div> --}}
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary btn-hitung" style="display: none">
                        Hitung Nilai
                    </button>
                </div>
            </form>
            @endif
        </div>
    </div>

    <div class="row mt-4">
        <div class="card col-12 p-4 mb-5">
            <h4 class="mb-4">Matrix Nilai Kriteria</h4>
            @if (count($kriterias))
            <table class="table border">
                <thead>
                    <tr class="text-center">
                        <th class="border w-10" scope="col">Kriteria</th>
                        @foreach ($kriterias as $kriteria1)
                        <th class="border" scope="col">{{$kriteria1->nama_kriteria}}</th>
                        @endforeach
                        <th class="border w-10" scope="col">Jumlah</th>
                        <th class="border w-10" scope="col">Prioritas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $max_lamda = 0; ?>
                    @foreach ($kriterias as $outerIndex2 => $kriteria4)
                    <tr class="text-center">
                        <td class="fw-bold border">{{$kriteria4->nama_kriteria}}</td>
                        <?php $jml_nilai = 0; ?>
                        @foreach ($kriterias as $innerIndex2 => $kriteria3)
                        <td class="border">
                            @if (count($kriteria4->perhitungans))
                            @if ($kriteria4->perhitungans[$innerIndex2])
                            <?php
                                            $jml_nilai += $kriteria4->perhitungans[$innerIndex2]->nilai / $total_nilai_prioritas[$innerIndex2];
                                            $nilai_p_kriteria = $kriteria4->perhitungans[$innerIndex2]->nilai / $total_nilai_prioritas[$innerIndex2];
                                        ?>
                            {{number_format($nilai_p_kriteria, 2)}}
                            @endif
                            @endif
                        </td>
                        @endforeach
                        <td class="border">{{number_format($jml_nilai, 2)}}</td>
                        <td class="border">{{number_format($jml_nilai/count($kriterias), 2)}}</td>
                    </tr>
                    <?php $max_lamda += ($jml_nilai/count($kriterias)) * $total_nilai_prioritas[$outerIndex2]; ?>
                    @endforeach
                </tbody>
            </table>
            <div class="col-12 my-2 w-70 mx-auto">
                <?php
                        $length = count($kriterias);
                        $ci = ($max_lamda - $length) / ($length-1);
                    ?>
                {{-- <p class="p-0 m-0" style="color: #333">Max λ = {{number_format($max_lamda, 2)}}</p> --}}
                <p class="p-0 m-0" style="color: #333">n = {{$length}}</p>
                <div class="row">
                    <div class="col-6">
                        <p class="p-0 m-0" style="color: #333">Consistensi Index = (max λ - n) / (n-1)</p>
                        <p class="p-0 m-0" style="color: #333">CI = ({{number_format($max_lamda, 2)}} - {{$length}}) /
                            {{$length-1}}</p>
                        <p class="p-0 m-0" style="color: #333">CI = {{number_format($ci, 2)}}</p>
                    </div>
                    <div class="col-6">
                        <p class="p-0 m-0" style="color: #333">Consistensi Ratio = CI/IR</p>
                        <p class="p-0 m-0" style="color: #333">CR = {{number_format(number_format($ci,2))}} /
                            {{$nilai_index_random}}</p>
                        <p class="p-0 m-0" style="color: #333">CR = {{number_format($ci/$nilai_index_random , 2)}}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
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
                url: '/perhitungan/store', // Replace with the actual URL to your controller route
                method: 'POST', // Replace with the appropriate HTTP method
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
    $('.matrix_select').on('change', function(e) {
        var selectedValueChanged = false; // Menyimpan status perubahan nilai pada setiap perubahan select

        $('.matrix_select').each(function() {
            if ($(this).val() != $(this).data('prev-value')) {
                selectedValueChanged = true; // Menandai jika ada perubahan nilai pada salah satu select
            }
        });

        if (selectedValueChanged) {
            $('.btn-hitung').show(); // Menampilkan tombol Hitung Nilai
        } else {
            $('.btn-hitung').hide(); // Menyembunyikan tombol Hitung Nilai
        }
    });

    $('form').submit(function(event) {
        event.preventDefault();
        $(this).find('select:disabled').prop('disabled', false);
        $(this).find('option:disabled').prop('disabled', false);
        var formData = $(this).serialize();

        // ...
        });
    });
</script>
