@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Blangko</h1>
    <form action="{{ route('wakasek.wakasek.blangkos.update', $blangko->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $blangko->judul }}" required>
        </div>

        <div class="form-group">
            <label for="file">File Blangko</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
