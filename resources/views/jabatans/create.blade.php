@extends('patrial.template')
@section('content')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Data Jabatan</h5>
        <div class="card">
          <div class="card-body">
        <form method="POST" action="{{ route('jabatans.store') }}">
            @csrf
            <div class="mb-3">
                <label for="NamaJabatan" class="form-label">Nama Jabatan</label>
                <input type="text" class="form-control" id="NamaJabatan" name="NamaJabatan" value="{{ old('NamaJabatan') }}" required>
              </div>
              <div class="mb-3">
                <label for="Keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="Keterangan" name="Keterangan" value="{{ old('Keterangan') }}" required>
              </div>
              <div class="mb-3">
                <label for="DepartemenID" class="form-label">Departemen</label>
                <select name="DepartemenID" id="DepartemenID" class="form-control" required>
                <option value="">--Pilih Departemen--</option>
                    @foreach ($departemens as $departemen)
                        <option value="{{ $departemen->DepartemenID }}">{{ $departemen->NamaDepartemen }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Buat</button>
            <a href="{{ route('jabatans.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
  document.getElementById('create-jabatan-form').addEventListener('submit', function(event) {
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
        window.location.href = "{{ route('jabatans.index') }}";
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