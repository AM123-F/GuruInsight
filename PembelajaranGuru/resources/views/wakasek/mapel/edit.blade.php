@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Tambah Mata Pelajaran</h1>

    <div class="card shadow-lg p-4">
        <form action="{{ route('wakasek.mapel.update', $mapel->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mata Pelajaran</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Upload Logo Mata Pelajaran</label>
                <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
