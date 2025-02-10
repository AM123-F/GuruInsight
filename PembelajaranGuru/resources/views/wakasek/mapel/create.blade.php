@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Tambah Mata Pelajaran</h1>
    <form action="{{ route('wakasek.mapel.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Mata Pelajaran</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
