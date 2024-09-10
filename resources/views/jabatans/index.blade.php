@extends('patrial.template')
@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="mb-3">
            <a href="{{ route('jabatans.create') }}" class="btn btn-primary">Buat data jabatan</a>
        </div>
        <form action="{{ route('jabatans.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari data jabatan" value="{{ $search }}">
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
                        <th style="font-weight: bold;">Nama Jabatan</th>
                        <th style="font-weight: bold;">Deskripsi</th>
                        <th style="font-weight: bold;">Departemen</th>
                        <th style="font-weight: bold;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jabatans as $jabatan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jabatan->NamaJabatan }}</td>
                            <td>{{ $jabatan->Keterangan }}</td>
                            <td>
                                {{ $jabatan->departemens ? $jabatan->departemens->NamaDepartemen : '' }}
                            </td>
                            <td>
                                <a href="{{ route('jabatans.edit', $jabatan->JabatanID) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('jabatans.destroy', $jabatan->JabatanID) }}" method="POST" class="d-inline">
                                    <input type="hidden" name="_method" value="delete" />
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete" />
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Tidak Ada Data Jabatan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $jabatans->links() }}
    </div>
@endsection
