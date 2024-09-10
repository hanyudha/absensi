@extends('patrial.template')
@section('content')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Detail Data Karyawan
        </h5>
        <div class="card">
          <div class="card-body">
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>{{ $user->jabatan->NamaJabatan }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $user->Tanggal_Lahir->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $user->Jenis_Kelamin }}</td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td>{{ $user->No_Telp }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $user->Alamat }}</td>
            </tr>
            <tr>
                <th>Tanggal Bergabung</th>
                <td>{{ $user->Tanggal_Bergabung->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $user->Status }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{ $user->role_as }}</td>
            </tr>
        </table>

        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
@endsection