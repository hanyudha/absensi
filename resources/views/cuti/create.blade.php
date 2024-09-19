@extends('layout.template')

@section('content')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ajukan Cuti Pustipanda</h5>
            <div class="card">
          <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('cuti.store') }}" id="create-cuti-form">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama </label>
                    <input type="text" class="form-control" id="nama" value="{{ auth()->user()->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                </div>
                <div class="mb-3">
                    <label for="alasan" class="form-label">Alasan Cuti</label>
                    <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ajukan Cuti</button>
            </form>
        </div>
    </div>
</div>

@endsection
