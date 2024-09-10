@extends('patrial.template')
@section('content')
<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Data Departemen</h5>
        <div class="card">
          <div class="card-body">
        <form method="POST" action="{{ route('departemens.update', $departemen->DepartemenID) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put" />
            <div class="mb-3">
                <label for="NamaDepartemen" class="form-label">Nama Departemen</label>
                <input type="text" class="form-control" id="NamaDepartemen" name="NamaDepartemen" value="{{ $departemen->NamaDepartemen }}" required> 
              </div>
            <button type="submit" class="btn btn-primary">Memperbarui</button>
            <a href="{{ route('departemens.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection