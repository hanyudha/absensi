@extends('patrial.template')

@section('content')
<div class="container">
    <h2>Detail Pengajuan Cuti</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama: {{ $cuti->user->name }}</h5>
            <p class="card-text"><strong>Tanggal Mulai:</strong> {{ $cuti->tanggal_mulai }}</p>
            <p class="card-text"><strong>Tanggal Selesai:</strong> {{ $cuti->tanggal_selesai }}</p>
            <p class="card-text"><strong>Status:</strong> 
                @if($cuti->status == 'pending')
                    <span class="badge bg-warning">Pending</span>
                @elseif($cuti->status == 'approved')
                    <span class="badge bg-success">Disetujui</span>
                @elseif($cuti->status == 'rejected')
                    <span class="badge bg-danger">Ditolak</span>
                @endif
            </p>
            <p class="card-text"><strong>Alasan:</strong> {{ $cuti->alasan }}</p>

            <!-- Tombol Kembali -->
            <a href="{{ route('admin.cuti.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
