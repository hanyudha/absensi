@extends('patrial.template')
@section('content')
<div class="container">        
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="mb-3">
            <a href="{{ route('gajis.create') }}" class="btn btn-primary btn-action">
                <i class="fas fa-plus"></i> Buat Data Gaji
            </a>
        </div>
        <form action="{{ route('gajis.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari gaji" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </div>
        </form>
        <div class="table-responsive mt-4">
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                        <th style="font-weight: bold;">No</th>
                        <th style="font-weight: bold;">Nama Karyawan</th>
                        <th style="font-weight: bold;">No. Rekening</th>
                        <th style="font-weight: bold;">NPWP</th>
                        <th style="font-weight: bold;">Nominal</th>
                        <th style="font-weight: bold;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gajis as $gaji)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $gaji->user ? $gaji->user->name : '' }}</td>
                        <td>{{ $gaji->No_Rekening }}</td>
                        <td>{{ $gaji->Npwp }}</td>
                        <td>{{ $gaji->Nominal }}</td>
                        <td>
                        <a href="{{ route('gajis.edit', $gaji->GajiID) }}" class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fas fa-edit"> Edit </i>
                               </a>
                               <a href="{{ route('gajis.show', $gaji->GajiID) }}" class="btn btn-sm" title="Show" style="background-color: #89CFF0; color: #fff;">
                                <i class="fas fa-eye"></i> Show </a>
                            <form action="{{ route('gajis.destroy', $gaji->GajiID) }}" method="POST" class="d-inline">
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
                        <td colspan="6">Tidak Ada Data Gaji</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{ $gajis->appends(request()->except('page'))->links() }}
    </div>
@endsection
