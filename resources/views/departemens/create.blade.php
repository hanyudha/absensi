@extends('patrial.template')
@section('content')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Data Departemen</h5>
        <div class="card">
          <div class="card-body">
            <form id="create-department-form" method="POST" action="{{ route('departemens.store') }}">
              {{ csrf_field() }}
              <div class="mb-3">
                <label for="NamaDepartemen" class="form-label">Nama Departemen</label>
                <input type="text" class="form-control" id="NamaDepartemen" name="NamaDepartemen" required>
              </div>
              <button type="submit" class="btn btn-primary">Buat</button>
              <a href="{{ route('departemens.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('create-department-form').addEventListener('submit', function(event) {
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
        window.location.href = "{{ route('departemens.index') }}";
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
