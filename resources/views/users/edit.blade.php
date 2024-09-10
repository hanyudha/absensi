@extends('patrial.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Pengguna</h5>
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

                    <form action="{{ route('users.update', $user->UserID) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="JabatanID" class="form-label">Jabatan</label>
                                <select name="JabatanID" id="JabatanID" class="form-control" required>
                                    @foreach($jabatans as $jabatan)
                                        <option value="{{ $jabatan->JabatanID }}" {{ $user->JabatanID == $jabatan->JabatanID ? 'selected' : '' }}>
                                            {{ $jabatan->NamaJabatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="Tanggal_Lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="Tanggal_Lahir" class="form-control" id="Tanggal_Lahir" value="{{ old('Tanggal_Lahir', $user->Tanggal_Lahir->format('Y-m-d')) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Jenis_Kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="Jenis_Kelamin" class="form-control" required>
                                    <option value="Laki-laki" {{ $user->Jenis_Kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $user->Jenis_Kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="No_Telp" class="form-label">No Telp</label>
                                <input type="text" name="No_Telp" class="form-control" value="{{ old('No_Telp', $user->No_Telp) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Alamat" class="form-label">Alamat</label>
                                <textarea name="Alamat" class="form-control" required>{{ old('Alamat', $user->Alamat) }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="Tanggal_Bergabung" class="form-label">Tanggal Bergabung</label>
                                <input type="date" name="Tanggal_Bergabung" class="form-control" value="{{ old('Tanggal_Bergabung', $user->Tanggal_Bergabung->format('Y-m-d')) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Status" class="form-label">Status</label>
                                <select name="Status" class="form-control" required>
                                    <option value="Aktif" {{ $user->Status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ $user->Status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="role_as" class="form-label">Role</label>
                                <select name="role_as" class="form-control" required>
                                    <option value="admin" {{ $user->role_as == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ $user->role_as == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
