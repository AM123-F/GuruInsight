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
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="col-md-6">
                <label for="jenis" class="form-label">Jenis Dokumen</label>
                <select name="jenis_id" id="jenis_id" class="form-control" required>
                    <option value="">Pilih Jenis Blangko</option>
                    @foreach ($jenisOptions as $jenis)
                        <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="mb-4">
            <label for="file" class="form-label">Pilih File</label>
            <input type="file" class="form-control" id="file" name="file" required>
            <small class="text-muted">Format file yang diizinkan: .pdf, .docx, .xlsx, dll.</small>
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
                    <th>Jenis Dokumen</th>
                    <th>File</th>
                    <th>Tanggal Upload</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokumens as $dokumen)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $dokumen->jenis)) }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $dokumen->file_path) }}" download="{{ basename($dokumen->file_path) }}" class="btn btn-info btn-sm">
                            Download
                        </a>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($dokumen->created_at)->timezone('Asia/Jakarta')->format('d M Y H:i') }}</td>
                    <td>
                        <form action="{{ route('guru.guru.guru.upload.destroy', $dokumen->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
