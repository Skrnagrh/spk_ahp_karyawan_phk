<x-app-layout>

    @slot('content')

    <div class="container-fluid px-4">
        @section('title')List Subkriteria @endsection
        <h4 class="mb-2 mt-4 text-capitalize">List Subkriteria {{ $kriteria->nama_kriteria }}</h4>
        <hr>

        <div class="card col-12 p-4 mb-5">
            <div class="col-12">
                <a href="/kriteria" class="btn btn-warning">
                    Kembali
                </a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Subkriteria
                </button>
            </div>
            <table class="table table-striped border">
                <thead>
                    <tr class="text-center">
                        <th scope="col" style="width:5%">No</th>
                        <th scope="col" style="width:65%">Nama Subkriteria</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subkriterias as $index => $subkriteria)
                    <tr class="text-center">
                        <th scope="row">{{$index + 1}}</th>
                        <td>{{$subkriteria->nama_subkriteria}}</td>
                        <td>
                            <span class="badge text-white text-capitalize text-bg-warning edit-link" data-bs-toggle="modal"
                                data-bs-target="#exampleModal3" data-id="{{ $subkriteria->id }}"
                                data-idNama="{{$subkriteria->nama_subkriteria}}">
                                Edit
                            </span> |
                            <span class="badge text-white text-capitalize text-bg-danger delete-link" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2" data-id="{{ $subkriteria->id }}">
                                Delete
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $subkriterias->links() !!}
        </div>
    </div>

    {{-- create subkriteria --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="{{ route('subkriteria.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Subkriteria</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <input type="hidden" name="id_kriteria" value="{{request()->id}}" id="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Subkriteria</label>
                            <input type="text" class="form-control border px-2" id="" name="nama_subkriteria" placeholder="Nama Subkriteria">
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

    {{-- edit subkriteria --}}
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModal3Label">Edit Subkriteria</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Subkriteria</label>
                            <input type="hidden" name="id_subkriteria" id="editInputId">
                            <input type="text" class="form-control border px-2" id="nama_subkriteria"
                                name="nama_subkriteria" placeholder="Nama Subkriteria">
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

    {{-- delete subkriteria --}}
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id_subkriteria" id="deleteIdInput">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModal2Label">Hapus Subkriteria</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        apakah anda yakin ingin menghapus Subkriteria ini?
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
                var formAction = '/subkriteria/destroy';
                $('#exampleModal2 form').attr('action', formAction);
            });
            $('.edit-link').click(function(e) {
                var id = $(this).data('id');
                let nama_subkriteria = $(this).data('idnama');
                $('#nama_subkriteria').val(nama_subkriteria);
                $('#editInputId').val(id);
                console.log(`${nama_subkriteria} ${id}`)
                var formActionEdit = '/subkriteria/update';
                $('#exampleModal3 form').attr('action', formActionEdit);
            });
        });
</script>
