@extends('patrial.template')

@section('content')
<div class="container">      
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="mb-3">
        <a href="{{ route('departemens.create') }}" class="btn btn-primary btn-action">
            <i class="fas fa-plus"></i> Buat Data Departemen
        </a>
    </div>

    <form action="{{ route('departemens.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Departemen" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </div>
    </form>

    <div class="table-responsive mt-4">
        <table class="table table-bordered text-center">
            <thead class="bg-primary text-white">
                <tr>
                    <th style="font-weight: bold;">No</th>
                    <th style="font-weight: bold;">Nama Departemen</th>
                    <th style="font-weight: bold;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($departemens as $departemen)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $departemen->NamaDepartemen }}</td>
                    <td>
                        <a href="{{ route('departemens.edit', $departemen->DepartemenID) }}" class="btn btn-info btn-sm btn-action" title="Edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('departemens.destroy', $departemen->DepartemenID) }}" method="POST" class="d-inline">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')" title="Hapus">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Tidak Ada Data Departemen</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3 d-flex justify-content-between align-items-center">
        <div>
            {{ $departemens->links('pagination::bootstrap-4') }} <!-- Memastikan pagination menggunakan Bootstrap -->
        </div>
        <p class="mt-2">Menampilkan {{ $departemens->count() }} dari {{ $departemens->total() }} data Departemen.</p>
    </div>
</div>

<style>
    thead th {
        background-color: rgba(0, 123, 255, 0.5); /* Biru transparan */
        color: white; /* Teks berwarna putih */
    }
</style>
@endsection
