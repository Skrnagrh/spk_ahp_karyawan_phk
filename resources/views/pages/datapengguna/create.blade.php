<div class="modal fade" id="mocreat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-dark" id="exampleModalLabel">Tambah Data Pengguna
                </h3>
                <i class="bi bi-x-lg text-danger" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <form method="post" action="/datapengguna" class="mb-3" enctype="multipart/form-data" id="createsuratmasuk">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label text-dark">Nama Lengkap</label>
                        <input type="text" class="form-control border px-2 @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" min="1" maxlength="10">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="email" class="form-label text-dark">Alamat Email</label>
                        <input type="text" class="form-control border px-2" id="email" name="email" required
                            value="{{ old('email') }}" placeholder="Alamat Email">

                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-dark">Jabatan</label>
                        <div class="col-sm-12">
                            <select class="form-select border px-2" name="admin">
                                <option value="manager" @if(old('admin')=='manager' ) selected @endif>Manager</option>
                                <option value="admin" @if(old('admin')=='admin' ) selected @endif>Admin</option>
                            </select>

                        </div>
                    </div>

                    <label for="password" class="form-label text-dark">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control border px-2 @error('password') is-invalid @enderror"
                            id="password" name="password" required autofocus value="{{ old('password') }}"
                            placeholder="Password" style="height: 40px;">
                    </div>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="modal-footer">
                    <a class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Batal</a>
                    <button type="submit" class="btn btn-success">
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
