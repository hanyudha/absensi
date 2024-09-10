<!DOCTYPE html>
<html>
<head>
    <title>Laporan Absensi</title>
    <style>
        body {
            background-size: contain; /* Mengatur gambar agar sesuai dengan kontainer */
            background-repeat: no-repeat;
            background-position: center; /* Menempatkan gambar di tengah */
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            height: 100vh; /* Memastikan tinggi body 100% dari viewport */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8); /* Transparansi latar belakang tabel */
            border: 1px solid black;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
        }

        th {
            background-color: rgba(0, 0, 255, 0.5); /* Biru transparan */
            color: white;
        }

        h2 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }
    </style>
</head>
<body>
    <h2>Laporan Absensi Karyawan Pustipanda</h2>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Tanggal</th>
                <th>Hari</th>
                <th>Waktu Masuk</th>
                <th>Waktu Keluar</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $absen)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $absen->user->name }}</td>
                    <td>{{ $absen->Tanggal }}</td>
                    <td>{{ $absen->Hari }}</td>
                    <td>{{ $absen->WaktuMasuk ?? 'Belum Absen Masuk' }}</td>
                    <td>{{ $absen->WaktuKeluar ?? 'Belum Absen Keluar' }}</td>
                    <td>{{ $absen->Keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
