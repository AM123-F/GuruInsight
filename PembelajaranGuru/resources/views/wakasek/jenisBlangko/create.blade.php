@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Tambah Jenis Blangko</h2>
    <form action="{{ route('jenis_blangko.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('jenis_blangko.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
