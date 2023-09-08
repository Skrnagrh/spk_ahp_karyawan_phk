<x-app-layout>

    @slot('content')

    <div class="container-fluid px-4 mb-5">
        @section('title')List Kriteria @endsection
        <h4 class="mb-2 mt-4">List Kriteria</h4>
        <hr>

        <div class="card col-12 p-4">
            <table class="table table-striped border">
                <thead>
                    <tr class="text-center">
                        <th scope="col" style="width:5%">No</th>
                        <th scope="col" style="width:65%">Nama Kriteria</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriterias as $index => $kriteria)
                    <tr class="text-center">
                        <th scope="row">{{$index + 1}}</th>
                        <td>{{$kriteria->nama_kriteria}}</td>
                        <td>
                            <a href="/perhitungan_subkriteria/matrix?id={{$kriteria->id}}"
                                class="btn text-white btn-primary btn-sm">
                                @if (Auth::user()->admin == 'staff hrd')
                                Input Nilai
                                @endif
                                @if (Auth::user()->admin == 'manager')
                                Lihat Nilai
                                @endif
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endslot

</x-app-layout>
