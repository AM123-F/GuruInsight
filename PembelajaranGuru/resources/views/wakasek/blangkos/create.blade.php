@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Upload Blangko</h1>

    <!-- Menampilkan error jika ada -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('wakasek.blangkos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="judul">Judul Blangko</label>
        <input type="text" id="judul" name="judul" required value="{{ old('judul') }}">

        <!-- Menampilkan error untuk 'judul' -->
        @error('judul')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="file">Pilih File</label>
        <input type="file" id="file" name="file" required>

        <!-- Menampilkan error untuk 'file' -->
        @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Unggah Blangko</button>
    </form>

</div>
@endsection
