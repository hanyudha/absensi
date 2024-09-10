@extends('patrial.template')
@section('content')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Data Gaji</h5>
        <div class="card">
          <div class="card-body">
        <form method="POST" action="{{ route('gajis.store') }}">
            @csrf
            <div class="mb-3">
              <label for="UserID" class="form-label">Nama Karyawan</label>
              <select name="UserID" id="UserID" class="form-control" required>
              <option value="">--Pilih Karyawan--</option>
                  @foreach ($users as $user)
                      <option value="{{ $user->UserID }}">{{ $user->name }}</option>
                  @endforeach
              </select>
          </div>
            <div class="mb-3">
                <label for="No_Rekening" class="form-label">No. Rekening</label>
                <input type="text" class="form-control" id="No_Rekening" name="No_Rekening" value="{{ old('No_Rekening') }}" required>
              </div>
              <div class="mb-3">
                <label for="Npwp" class="form-label">Npwp</label>
                <input type="text" class="form-control" id="Npwp" name="Npwp" value="{{ old('Npwp') }}" required>
              </div>
              <div class="mb-3">
                <label for="Nominal" class="form-label">Nominal</label>
                <input type="number" class="form-control" id="Nominal" name="Nominal" value="{{ old('Nominal') }}" required>
              </div>
            <button type="submit" class="btn btn-primary">Buat</button>
            <a href="{{ route('gajis.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
  document.getElementById('create-gaji-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    var form = event.target;
    
    var formData = new FormData(form);
    fetch(form.action, {
      method: form.method,
      body: formData,
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
      }
    })
    .then(response => {
      if (response.ok) {
        window.location.href = "{{ route('gajis.index') }}";
      } else {
        // Handle error response here
        alert('Terjadi kesalahan saat menyimpan data.');
      }
    })
    .catch(error => {
      // Handle fetch error here
      alert('Terjadi kesalahan saat menyimpan data.');
    });
  });
</script>
@endsection