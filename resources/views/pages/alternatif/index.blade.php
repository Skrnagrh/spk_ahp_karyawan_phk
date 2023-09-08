<x-app-layout>

    @slot('content')
    @section('title')Alternatif @endsection
    <div class="container-fluid px-4">
        <h4 class="mb-2 mt-4">Alternatif</h4>
        <hr>

        <div class="col-12 my-3">
            @if (Auth::user()->admin == 'staff hrd')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah alternatif
            </button>
            @endcan
        </div>


        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-striped border">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" style="width:5%">No</th>
                            <th scope="col" style="width:20%">NIK</th>
                            <th scope="col" style="width:30%">Nama Lengkap</th>
                            @if (Auth::user()->admin == 'staff hrd')
                            <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatifs as $index => $alternatif)
                        <tr class="text-center">
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{$alternatif->nik}}</td>
                            <td>{{$alternatif->nama}}</td>
                            @if (Auth::user()->admin == 'staff hrd')
                            <td>

                                <a href="/alternatif_detail?id={{$alternatif->id}}"
                                    class="btn btn-success btn-sm text-white text-capitalize">
                                    Parameter
                                </a> |
                                <a class="btn btn-warning btn-sm edit-link text-white text-capitalize"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal3"
                                    data-id="{{ $alternatif->id }}"
                                    data-idalternatif="{{$alternatif->nama .  ',' . $alternatif->nik . ',' . $alternatif->bagian}}"
                                    style="cursor: pointer;">
                                    Edit
                                </a> |
                                <a class="btn btn-danger btn-sm delete-link text-white text-capitalize"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                    data-id="{{ $alternatif->id }}" style="cursor: pointer;">
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
            <form method="POST" action="/alternatif/store">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-1">
                            <label for="" class="form-label">Nomor Induk Karyawan</label>
                            <input type="text" class="form-control border px-2" id="" name="nik" required
                                placeholder="Nomor Induk Karyawan" autofocus>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1">
                            <label for="" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control border px-2" id="" name="nama" required
                                placeholder="Nama Lengkap">
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

    <div class="modal fade" id="exampleModal2" tabindex="-999" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id_alternatif" id="deleteIdInput">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModal2Label">Hapus </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda Yakin Ingin Menghapusnya ?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModal3Label">Edit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1">
                            <label for="" class="form-label">NIK</label>
                            <input type="text" class="form-control border px-2" id="nik" name="nik" placeholder="NIK">
                            <input type="hidden" class="form-control border px-2" id="id_alternatif"
                                name="id_alternatif">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1">
                            <label for="" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control border px-2" id="nama" name="nama"
                                placeholder="Nama Lengkap">
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

    @endslot

</x-app-layout>

<script>
    $(document).ready(function() {
        $('.delete-link').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#deleteIdInput').val(id); // Set the value of the hidden input field
            var formAction = '/alternatif/destroy';
            $('#exampleModal2 form').attr('action', formAction);
        });
        $('.edit-link').click(function(e) {
            let id = $(this).data('id');
            let alternatif = $(this).data('idalternatif');
            alternatif = alternatif.split(',');
            $('#id_alternatif').val(id);
            $('#nama').val(alternatif[0]);
            $('#nik').val(alternatif[1]);
            $('#bagian').val(alternatif[2]);
            console.log(`${alternatif} ${id}`)
            var formActionEdit = '/alternatif/update';
            $('#exampleModal3 form').attr('action', formActionEdit);
        });
    });

</script>
