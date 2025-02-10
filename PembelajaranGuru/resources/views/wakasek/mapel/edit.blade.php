@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Mata Pelajaran</h1>
    <form action="{{ route('mapels.update', $mapel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Mata Pelajaran</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $mapel->nama }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
    </form>
</div>
@endsection
