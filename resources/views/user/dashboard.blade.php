@extends('layout.template')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-2"> <!-- Mengurangi margin-bottom -->
        <!-- Card Welcome --> 
        <div class="col-lg-12">
            <div class="card" style="height: 150px;"> <!-- Panjang card disesuaikan -->
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="card-title text-primary"><b>Halo, Selamat Datang!</b></h3>
                        <p class="mb-0">Sekarang <span class="fw-bold">Kamu.</span><br>Bisa Melakukan Absensi dan lain-lain dalam website.</p>
                    </div>
                    <div>
                        <img src="{{ asset('asset/images/backgrounds/karyawan1.png') }}" alt="Gambar Selamat Datang" style="max-width: 120px; max-height: 120px;"> <!-- Ukuran gambar disesuaikan -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2"> <!-- Mengurangi margin-bottom -->
        <!-- Card Status Absensi -->
        <div class="col-lg-4 col-md-6">
            <div class="dashboard-card d-flex align-items-center justify-content-between" 
                 style="border: 2px solid {{ $absensiHariIni ? '#28a745' : '#dc3545' }}; padding: 15px; border-radius: 10px; background-color: {{ $absensiHariIni ? '#28a745' : '#dc3545' }}; height: 100px;">
                <div class="details text-right">
                    <h5 class="text-white">{{ $absensiHariIni ? 'Anda Sudah Absen' : 'Anda Belum Absen' }}</h5>
                    <p class="text-white">Hari ini</p>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('absensi.index') }}" class="text-primary">Lihat Detail</a>
            </div>
        </div>

        <!-- Card Riwayat Cuti -->
        <div class="col-lg-4 col-md-6">
            <div class="dashboard-card d-flex align-items-center justify-content-between" style="border: 2px solid #007bff; padding: 15px; border-radius: 10px; background-color: #007bff; height: 100px;">
                <div class="icon">
                    <img src="{{ asset('asset/images/profile/kalender.png') }}" alt="User Icon" class="img-fluid" style="width: 50px; height: 50px;">
                </div>
                <div class="details text-right">
                    <h5 class="text-white">{{ $totalCuti }}</h5>
                    <p class="text-white">RIWAYAT CUTI ANDA</p>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('cuti.index') }}" class="text-primary">Lihat Detail</a>
            </div>
        </div>
    </div>

    <style>
        .dashboard-card {
            width: 100%;
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: right;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }

        .icon img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .details {
            margin-left: auto;
            text-align: right;
        }

        .details h5 {
            margin: 0;
            font-size: 20px; /* Ukuran font disesuaikan */
            font-weight: bold;
            color: white;
        }

        .details p {
            margin: 5px 0 0;
            font-size: 14px; /* Ukuran font disesuaikan */
            color: white;
        }

        .card-footer {
            background-color: #f0f0f0;
            color: #007bff;
            padding: 10px;
            font-size: 14px;
        }
    </style>
</div>
@endsection
