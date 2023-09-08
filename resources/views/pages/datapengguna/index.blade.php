<x-app-layout>

    @slot('content')
    <div class="container-fluid px-4">
        @section('title')Data Pengguna @endsection
        <h4 class="mb-2 mt-4">Data Pengguna</h4>
        <hr>

        <a class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#mocreat" data-bs-whatever="@mdo">Tambah
            Pengguna</a>
        @include('pages.datapengguna.create')

        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Pengguna
                </div>
                <div class="card-body">
                    <table class="table table-striped border">
                        <thead class=" text-center">
                            <tr style="text-transform: capitalize">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user1 as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center" style="text-transform: capitalize">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center" style="text-transform: capitalize">{{ $user->admin }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="/datapengguna/{{ $user->id }}/edit" class="btn btn-warning text-light me-2"
                                        data-bs-toggle="modal" data-bs-target="#penggunaedit{{ $user->id }}">Ubah
                                    </a>

                                    @include('pages.datapengguna.edit')

                                    <form method="POST" action="{{ route('datapengguna.destroy', $user->id) }}"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="button" class="btn btn-xs btn-danger btn-flat"
                                            data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal{{ $user->id }}">Hapus
                                        </button>
                                        <div class="modal fade" id="confirmDeleteModal{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data {{ $user->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endslot

</x-app-layout>
