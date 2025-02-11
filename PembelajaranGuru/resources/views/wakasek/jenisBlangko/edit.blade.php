@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Edit Jenis Blangko</h2>
    <form action="{{ route('jenis_blangko.update', $jenisBlangko->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $jenisBlangko->nama }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('jenis_blangko.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
