@extends('patrial.template')
@section('content')
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="mb-3">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Buat Data User</a>
        </div>
        <form action="{{ route('users.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Data User" value="{{ request()->query('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
        <div class="table-responsive mt-4">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th style="font-weight: bold;">No</th>
                        <th style="font-weight: bold;">Nama</th>
                        <th style="font-weight: bold;">Email</th>
                        <th style="font-weight: bold;">Jabatan</th>
                        <th style="font-weight: bold;">Tanggal Lahir</th>
                        <th style="font-weight: bold;">Jenis Kelamin</th>
                        <th style="font-weight: bold;">No Telepon</th>
                        <th style="font-weight: bold;">Alamat</th>
                        <th style="font-weight: bold;">Tanggal Bergabung</th>
                        <th style="font-weight: bold;">Status</th>
                        <th style="font-weight: bold;">Role</th>
                        <th style="font-weight: bold;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->jabatan->NamaJabatan ?? 'Tidak ada' }}</td>
                            <td>{{ $user->Tanggal_Lahir->format('d-m-Y') }}</td>
                            <td>{{ $user->Jenis_Kelamin }}</td>
                            <td>{{ $user->No_Telp }}</td>
                            <td>{{ $user->Alamat }}</td>
                            <td>{{ $user->Tanggal_Bergabung->format('d-m-Y') }}</td>
                            <td>{{ $user->Status }}</td>
                            <td>{{ $user->role_as }}</td>
                            <td>
                                <P>
                               <a href="{{ route('users.edit', $user->UserID) }}" class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fas fa-edit"> Edit </i>
                               </a><p>
                               <a href="{{ route('users.show', $user->UserID) }}" class="btn btn-sm" title="Show" style="background-color: #89CFF0; color: #fff;">
    <i class="fas fa-eye"></i> Show
</a>

                               <form action="{{ route('users.destroy', $user->UserID) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapusnya?')" title="Hapus">
                                        <i class="fas fa-trash-alt"> hapus </i>
                                    </button>
                               </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center"> Tidak Ada Data Karyawan </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection