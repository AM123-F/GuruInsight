@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Upload Dokumen</h1>

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

    <!-- Form Upload Dokumen -->
    <form action="{{ route('guru.guru.guru.upload.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="judul" class="form-label">Judul Dokumen</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul dokumen" required>
            </div>
            <div class="col-md-6">
                <label for="file" class="form-label">Pilih File</label>
                <input type="file" class="form-control" id="file" name="file" required>
                <small class="text-muted">Format file yang diizinkan: .pdf, .docx, .xlsx, dll.</small>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <!-- Tabel Dokumen yang Diupload -->
    <div class="mt-5">
        <h2 class="text-center mb-4">Dokumen yang Telah Diupload</h2>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Judul Dokumen</th>
                    <th>File</th>
                    <th>Tanggal Upload</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokumens as $dokumen)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dokumen->judul }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $dokumen->file_path) }}" download="{{ basename($dokumen->file_path) }}" class="btn btn-info btn-sm">
                            Download
                        </a>
                    </td>
                    <td>{{ $dokumen->created_at->format('d M Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
