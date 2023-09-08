<x-app-layout>

    @slot('content')
    <div class="container-fluid px-4">
        @section('title')Kriteria @endsection
        <h4 class="mb-2 mt-4">Kriteria</h4>
        <hr>

        <div class="col-12 my-3">
            @if (Auth::user()->admin == 'staff hrd')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Kriteria
            </button>
            @endcan
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-striped border">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" style="width:5%">No</th>
                            <th scope="col" style="width:65%">Nama Kriteria</th>
                            @if (Auth::user()->admin == 'staff hrd')
                            <th scope="col">Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriterias as $index => $kriteria)
                        <tr class="text-center">
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{$kriteria->nama_kriteria}}</td>
                            @if (Auth::user()->admin == 'staff hrd')
                            <td>
                                <a href="/subkriteria?id={{$kriteria->id}}"
                                    class="btn btn-success btn-sm text-white text-capitalize" style="cursor: pointer;">
                                    Subkriteria
                                </a> |
                                <a class="btn btn-warning btn-sm edit-link text-white text-capitalize" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal3" data-id="{{ $kriteria->id }}"
                                    data-idNama="{{$kriteria->nama_kriteria}}" style="cursor: pointer;">
                                    Edit
                                </a> |
                                <a class="btn btn-danger btn-sm delete-link text-white text-capitalize" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal2" data-id="{{ $kriteria->id }}"
                                    style="cursor: pointer;">
                                    Delete
                                </a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="{{ route('kriteria.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kriteria</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Kriteria</label>
                            <input type="text" class="form-control border px-2" id="" name="nama_kriteria"
                                placeholder="Nama Kriteria" autofocus>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModal3Label">Edit kriteria</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Kriteria</label>
                            <input type="hidden" name="id_kriteria" id="editInputId">
                            <input type="text" class="form-control border px-2" id="nama_kriteria" name="nama_kriteria" placeholder="Nama Kriteria">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id_kriteria" id="deleteIdInput">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModal2Label">Hapus kriteria</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        apakah anda yakin ingin menghapus kriteria {{$kriteria->nama_kriteria}}?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endslot

</x-app-layout>

<script>
    $(document).ready(function() {
        $('.delete-link').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#deleteIdInput').val(id); // Set the value of the hidden input field
            var formAction = '/kriteria/destroy';
            $('#exampleModal2 form').attr('action', formAction);
        });
        $('.edit-link').click(function(e) {
            var id = $(this).data('id');
            let nama_kriteria = $(this).data('idnama');
            $('#nama_kriteria').val(nama_kriteria);
            $('#editInputId').val(id);
            console.log(`${nama_kriteria} ${id}`)
            var formActionEdit = '/kriteria/update';
            $('#exampleModal3 form').attr('action', formActionEdit);
        });
    });

</script>


