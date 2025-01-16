@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1>Data Guru</h1>
    
    <!-- Tombol Tambah Guru dan Import -->
    <div class="mb-3">
        <a href="{{ route('wakasek.dataGuru.create') }}" class="btn btn-primary">Tambah Guru</a>
        <a href="{{ route('wakasek.dataGuru.import') }}" class="btn btn-success" data-toggle="modal" data-target="#importModal">Import Data</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel Data Guru -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gurus as $guru)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $guru->nama }}</td>
                <td>{{ $guru->nip }}</td>
                <td>
                    <a href="{{ route('wakasek.dataGuru.edit', $guru->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('wakasek.dataGuru.destroy', $guru->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal untuk Import Data -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('wakasek.dataGuru.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Data Guru</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload File Excel</label>
                        <input type="file" class="form-control" name="file" id="file" required>
                        <small class="text-muted">Format file harus .xlsx atau .xls</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
