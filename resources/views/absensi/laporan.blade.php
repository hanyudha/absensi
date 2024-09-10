@extends('patrial.template')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absensi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
        .form-inline {
            margin-bottom: 20px;
        }
        .table th, .table td {
            text-align: center;
        }
        .btn-primary {
            margin-bottom: 20px;
        }
        .thead-custom {
            background-color: #003366; /* Warna biru tua Pustipanda */
            color: #ffffff; /* Warna teks putih untuk kontras yang baik */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Laporan Absensi</h1>

        <form method="GET" action="{{ route('absensi.laporan') }}" class="form-inline mb-4">
            <div class="form-group mb-2">
                <label for="tanggal" class="sr-only">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="bulan" class="sr-only">Bulan</label>
                <select id="bulan" name="bulan" class="form-control">
                    <option value="">Pilih Bulan</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ \Carbon\Carbon::create()->month($i)->format('F') }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Cari</button>
        </form>

        <a href="{{ route('absensi.laporan.pdf') }}" class="btn btn-success mb-4">Download PDF</a>

        <table class="table table-striped table-bordered">
            <thead class="thead-custom">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataAbsensi as $absensi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $absensi->user ? $absensi->user->name : 'Tidak ada nama' }}</td>
                        <td>{{ $absensi->Tanggal }}</td>
                        <td>{{ $absensi->WaktuMasuk }}</td>
                        <td>{{ $absensi->WaktuKeluar }}</td>
                        <td>{{ $absensi->Keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
