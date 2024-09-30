@extends('layout.template')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Absensi Pustipanda</h2>
        <div id="current-time" style="font-size: 18px; font-weight: bold;">
            {{ \Carbon\Carbon::now('Asia/Jakarta')->format('H:i:s') }} <!-- Menampilkan jam sekarang dengan detik -->
        </div>
    </div>

    <p>&nbsp;</p>
    <div class="card-container">
        <!-- Card Masuk -->
        <div class="card">
            <b>Masuk: 07:30 - 08:00</b>
        </div>

        <!-- Card Keluar -->
        <div class="card">
            <b>Keluar: 16:00 - 17:00</b>
        </div>
    </div>
    
    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div style="color: red; margin-bottom: 15px;">
            {{ session('error') }}
        </div>
    @endif

    {{-- Tombol Absen Masuk dan Keluar --}}
    <div style="margin-bottom: 20px;">
        {{-- Tombol Absen Masuk --}}
        <div style="display: inline-block; margin-right: 20px;">
            @php
                $absenHariIni = $absensi->where('Tanggal', \Carbon\Carbon::now('Asia/Jakarta')->toDateString())->first();
            @endphp
            
            @if(!$absenHariIni || !$absenHariIni->WaktuMasuk)
                <form action="{{ route('absensi.masuk') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                        Absen Masuk
                    </button>
                </form>
            @else
                <button class="btn btn-success" style="background-color: #d4edda; color: #155724; padding: 10px 20px; border: none;" disabled>
                    Anda sudah berhasil melakukan absen masuk
                </button>
            @endif
        </div>

        {{-- Tombol Absen Keluar --}}
        <div style="display: inline-block;">
            @php
                $currentTime = \Carbon\Carbon::now('Asia/Jakarta');
                $checkOutTime = \Carbon\Carbon::createFromTime(16, 0, 0, 'Asia/Jakarta');
            @endphp

            @if($absenHariIni)
                @if(!$absenHariIni->WaktuKeluar)
                    @if($currentTime->lt($checkOutTime))
                        <!-- Button for before 4 PM -->
                        <button class="btn btn-danger" style="background-color: #f8d7da; color: #721c24; padding: 10px 20px; border: none;" disabled>
                            Belum saatnya melakukan absensi pulang
                        </button>
                    @else
                        <!-- Form for after 4 PM -->
                        <form action="{{ route('absensi.keluar', $absenHariIni->AbsensiID) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; cursor: pointer;">
                                Absen Keluar
                            </button>
                        </form>
                    @endif
                @else
                    <button class="btn btn-success" style="background-color: #d4edda; color: #155724; padding: 10px 20px; border: none;" disabled>
                        Anda sudah melakukan absen keluar
                    </button>
                @endif
            @endif
        </div>
    </div>

    <p>&nbsp;</p>
    {{-- History 30 Hari --}}
    <h5 style="text-align: left; margin-bottom: 20px;">History Absensi 30 Hari Terakhir</h5>

    {{-- Tabel Absensi --}}
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; text-align: center;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #808080;">#</th>
                <th style="border: 1px solid #808080;">Tanggal</th>
                <th style="border: 1px solid #808080;">Hari</th>
                <th style="border: 1px solid #808080;">Waktu Masuk</th>
                <th style="border: 1px solid #808080;">Waktu Keluar</th>
                <th style="border: 1px solid #808080;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $absen)
                <tr>
                    <td style="border: 1px solid #808080;">{{ $loop->iteration }}</td>
                    <td style="border: 1px solid #808080;">{{ $absen->Tanggal }}</td>
                    <td style="border: 1px solid #808080;">{{ $absen->Hari }}</td>
                    <td style="border: 1px solid #808080;">{{ $absen->WaktuMasuk ?? 'Belum Absen Masuk' }}</td>
                    <td style="border: 1px solid #808080; color: {{ is_null($absen->WaktuKeluar) ? 'red' : 'black' }};">
                        {{ $absen->WaktuKeluar ?? 'Belum Absen Keluar' }}
                    </td>
                    <td style="border: 1px solid #808080; color: {{ $absen->Keterangan === 'Terlambat' ? 'red' : 'green' }}">
                        {{ $absen->Keterangan }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        setInterval(() => {
            const now = new Date().toLocaleTimeString('en-US', { timeZone: 'Asia/Jakarta', hour12: false });
            document.getElementById('current-time').innerText = now;
        }, 1000); // Memperbarui waktu setiap detik
    </script>
@endsection
