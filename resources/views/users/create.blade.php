@extends('patrial.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Pengguna</h5>
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="JabatanID" class="form-label">Jabatan</label>
                                <select name="JabatanID" id="JabatanID" class="form-control" required>
                                    <option value="">--Pilih Jabatan--</option>
                                    @foreach($jabatans as $jabatan)
                                        <option value="{{ $jabatan->JabatanID }}">{{ $jabatan->NamaJabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="Tanggal_Lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="Tanggal_Lahir" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Jenis_Kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="Jenis_Kelamin" class="form-control" required>
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="No_Telp" class="form-label">No Telp</label>
                                <input type="text" name="No_Telp" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Alamat" class="form-label">Alamat</label>
                                <textarea name="Alamat" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="Tanggal_Bergabung" class="form-label">Tanggal Bergabung</label>
                                <input type="date" name="Tanggal_Bergabung" id="Tanggal_Bergabung" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Status" class="form-label">Status</label>
                                <select name="Status" class="form-control" required>
                                    <option value="">--Pilih Status--</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="role_as" class="form-label">Role</label>
                                <select name="role_as" class="form-control" required>
                                    <option value="">--Pilih Role--</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                    </form>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const today = new Date().toISOString().split('T')[0];
                            document.getElementById('Tanggal_Bergabung').value = today;
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
