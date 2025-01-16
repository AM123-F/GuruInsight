@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Upload Blangko</h1>
    <form action="{{ route('wakasek.wakasek.blangkos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="file">File Blangko</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
