@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="text-center m-0">Upload Blangko</h3>
        </div>
        <div class="card-body">
            <!-- Notifikasi jika ada pesan sukses atau error -->
            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Upload -->
            <form action="{{ route('wakasek.wakasek.blangkos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul blangko" required>
                </div>
                <div class="mb-4">
                    <label for="file" class="form-label">File Blangko</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                    <small class="form-text text-muted">Format file yang diizinkan: .pdf, .docx, dll.</small>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fa fa-upload me-2"></i> Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
