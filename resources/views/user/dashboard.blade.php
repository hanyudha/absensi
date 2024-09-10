@extends('layout.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="card-title text-primary"><b>Halo, Selamat Datang!</b></h3>
                        <p class="mb-4">
                            Sekarang <span class="fw-bold">Kamu.</span>
                        <br> Bisa Melakukan Absensi dan lain-lain dalam website.
                        </p>
                    </div>
                    <div>
                        <img src="{{ asset('asset/images/backgrounds/ilustrasi.png') }}" alt="Gambar Selamat Datang" style="max-width: 180px; max-height: 180px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection