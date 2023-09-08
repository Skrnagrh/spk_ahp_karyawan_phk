<x-app-layout>

    @slot('content')
    <div class="container-fluid px-4">
        @section('title')Input Parameter @endsection

        <h4 class="mb-2 mt-4 text-capitalize">Input Parameter {{ $alternatif->nama }}</h4>
        <hr>

        <div class="card col-12 p-4 mb-5">

            <form method="post" action="/alternatif_detail/store">
                @csrf
                @method('POST')
                <table class="table border">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" style="width:5%">No</th>
                            <th scope="col" style="width:40%">Nama Kriteria</th>
                            <th scope="col" style="width:30%">Parameter</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriterias as $index => $kriteria)
                        <tr class="text-center">
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{$kriteria->nama_kriteria}}</td>
                            <td>
                                <select class="form-select px-2 border" aria-label="Default select example"
                                    id="list_subkriteria" name="list_subkriteria[]" required>
                                    <option selected disabled>Pilih</option>
                                    @foreach ($kriteria->subkriterias as $subkriteria)
                                    <?php
                                                $filter_selected_detail = $details->where('id_subkriteria', $subkriteria->id)->first();
                                            ?>
                                    <option value="{{$subkriteria->id}}" {{$filter_selected_detail ? 'selected' : '' }}>
                                        {{$subkriteria->nama_subkriteria}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="id_alternatif" id="" value="{{request()->id}}">
                                <input type="hidden" name="kriteria_id[]" id="" value="{{$kriteria->id}}">
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="col-12 text-end">
                    <a href="/alternatif" class="btn btn-warning">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>

        </div>

    </div>

    @endslot

</x-app-layout>
