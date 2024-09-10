@extends('patrial.template')

@section('content')
<div class="container">
    <h1>Detail Gaji</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama Pengguna: {{ $gaji->user->name }}</h5>
            <p class="card-text"><strong>No. Rekening:</strong> {{ $gaji->No_Rekening }}</p>
            <p class="card-text"><strong>NPWP:</strong> {{ $gaji->Npwp }}</p>
            <p class="card-text"><strong>Nominal:</strong> Rp {{ number_format($gaji->Nominal, 0, ',', '.') }}</p>
            <a href="{{ route('gajis.edit', $gaji->GajiID) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('gajis.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
