@extends('partial.template')

@section('content')
    <h1>Daftar Pengajuan Cuti</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alasan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cutis as $cuti)
                <tr>
                    <td>{{ $cuti->user->name }}</td>
                    <td>{{ $cuti->alasan }}</td>
                    <td>{{ $cuti->tanggal_mulai }}</td>
                    <td>{{ $cuti->tanggal_selesai }}</td>
                    <td>{{ $cuti->status }}</td>
                    <td>
                        @if($cuti->status == 'pending')
                            <a href="{{ route('admin.cuti.updateStatus', ['id' => $cuti->CutiID, 'status' => 'approved']) }}">Approve</a>
                            <a href="{{ route('admin.cuti.updateStatus', ['id' => $cuti->CutiID, 'status' => 'rejected']) }}">Reject</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
