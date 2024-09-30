@extends('patrial.template')  
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="card-title text-primary"><b>Halo, Selamat Datang, Administrator!</b></h3>
                        <p class="mb-4">
                        Sekarang <span class="fw-bold">Kamu</span> bisa mengelola 
                        <br>absensi <b>PUSTIPANDA</b> dengan mudah.
                        </p>
                    </div>
                    <div>
                        <img src="{{ asset('asset/images/backgrounds/flowers.jpg') }}" alt="Gambar Selamat Datang" style="max-width: 200px; max-height: 200px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Dashboard Cards -->
    <div class="row">
        <!-- Card Karyawan -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="dashboard-card d-flex align-items-center justify-content-between" style="border: 2px solid #007bff; padding: 20px; border-radius: 10px; background-color: #007bff;">
                <div class="icon">
                    <img src="{{ asset('asset/images/profile/user.png') }}" alt="User Icon" class="img-fluid">
                </div>
                <div class="details text-right">
                    <h3 class="text-white">{{ $totalUsers }}</h3>
                    <p class="text-white">KARYAWAN</p>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('users.index') }}">Lihat Detail</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="dashboard-card d-flex align-items-center justify-content-between" style="border: 2px solid #ff851b; padding: 20px; border-radius: 10px; background-color: #ff851b;">
                <div class="icon">
                    <img src="{{ asset('asset/images/profile/kalender.png') }}" alt="Cuti Icon" class="img-fluid">
                </div>
                <div class="details text-right">
                    @php
                        $cuti_hari_ini = $cutis->filter(function($cuti) {
                            return $cuti->tanggal_mulai == date('Y-m-d');
                        });
                    @endphp
                    <h3 class="text-white">{{ $cuti_hari_ini->count() }}</h3>
                    <p class="text-white">PENGAJUAN CUTI</p>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('admin.cuti.index') }}">Lihat Detail</a>
            </div>
        </div>

        <!-- Card Absensi Hari Ini -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="dashboard-card d-flex align-items-center justify-content-between" style="border: 2px solid #28a745; padding: 20px; border-radius: 10px; background-color: #28a745;">
                <div class="icon">
                    <img src="{{ asset('asset/images/profile/absensi.png') }}" alt="Absensi Icon" class="img-fluid">
                </div>
                <div class="details text-right">
                    <h3 class="text-white">{{ $totalAbsensis }}</h3>
                    <p class="text-white">ABSENSI HARI INI</p>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('absensi.laporan') }}">Lihat Detail</a>
            </div>
        </div>
        
        <!-- Card Section -->
        <div class="card-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Absensi Hari Ini ({{ \Carbon\Carbon::today()->format('d M Y') }})</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Karyawan</th>
                                        <th>Waktu Masuk</th>
                                        <th>Waktu Keluar</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($absensiHariIni as $absensi)
                                        <tr>
                                            <td>{{ $absensi->user->name }}</td>
                                            <td>{{ $absensi->WaktuMasuk }}</td>
                                            <td>{{ $absensi->WaktuKeluar ?? '-' }}</td>
                                            <td>{{ $absensi->Keterangan }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Belum ada absensi karyawan untuk hari ini.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Kalender</h5>
                        </div>
                        <div class="card-body">
                            <div id="calendar" style="width: 100%; height: 300px;">
                                <div class="calendar">
                                    @php
                                        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                        $currentMonth = date('n') - 1; // Current month (0-11)
                                        $currentYear = date('Y');
                                        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth + 1, $currentYear);
                                        $firstDayOfMonth = strtotime("{$currentYear}-" . ($currentMonth + 1) . "-01");
                                        $startDayOfWeek = date('w', $firstDayOfMonth);
                                    @endphp
                                    <div class="month-header">
                                        <h5>{{ $months[$currentMonth] }} {{ $currentYear }}</h5>
                                    </div>
                                    @for ($i = 0; $i < $startDayOfWeek; $i++)
                                        <div class="day"></div>
                                    @endfor
                                    @for ($day = 1; $day <= $daysInMonth; $day++)
                                        <div class="day {{ date('j') == $day ? 'today' : '' }}">{{ $day }}</div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
    /* Basic calendar styles */
.calendar {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px; /* Spacing between cells */
    text-align: center;
    border: none; /* No border around the calendar */
}
.day {
    padding: 10px;
    background: #f9f9f9; /* Light background for each day */
    border: none; /* No border */
    border-radius: 5px; /* Optional: Slight rounding for corners */
}
.today {
    background: #007bff; /* Highlight today's date */
    color: white; /* White text for better contrast */
}

#calendar {
    width: 100%;
    height: 300px;
    margin-left: -19px; /* Adjust this value to move left or right */
}
            .dashboard-card {
                width: 100%;
                color: white;
                border-radius: 10px 10px 0 0;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                text-align: right;
                display: flex;
                align-items: center;
                justify-content: space-between;
                position: relative;
            }

            .icon img {
                width: 140px;
                height: 140px;
                border-radius: 50%;
                position: absolute;
                top: -10px;
                left: 10px;
            }

            .details {
                margin-left: auto;
                text-align: right;
            }

            .details h3 {
                margin: 0;
                font-size: 28px;
                font-weight: bold;
                color: white;
            }

            .details p {
                margin: 5px 0 0;
                font-size: 18px;
                color: white;
            }
            .table th {
                background-color: #5D87FF;
                color: white;
                font-weight: bold;
            }
            .card-footer {
                background-color: #f0f0f0;
                color: #007bff;
                padding: 10px;
                font-size: 14px;
            }
        </style>
    </div>
</div>
@endsection
