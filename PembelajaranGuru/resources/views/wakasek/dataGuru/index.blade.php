@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Data Guru</h1>
        <div>
            <a href="{{ route('wakasek.dataGuru.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus me-2"></i> Tambah Guru
            </a>
            <button class="dropdown-item d-flex align-items-center dropdown-hover" onclick="openModal()">
                <i class="bi bi-upload me-2" style="font-size: 18px; color: #007bff;"></i> 
                <span>Import Excel</span>
            </button>
        </div>
    </div>

    <!-- Modal Import -->
    <div id="importModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <form action="{{ route('wakasek.dataGuruImport') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file" class="form-label">Import Data Guru File Excel</label>
                        <input type="file" class="form-control" name="file" id="file" required>
                        <small class="text-muted">Format file yang didukung: .xlsx, .xls</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Import</button>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 5%;" class="text-center">No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Mata Pelajaran</th>
                            <th style="width: 20%;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($gurus as $guru)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $guru->nip }}</td>
                            <td>{{ $guru->nama }}</td>
                            <td>{{ $guru->mapel ? $guru->mapel->nama : '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('wakasek.dataGuru.edit', $guru->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('wakasek.dataGuru.destroy', $guru->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">
                                        <i class="fas fa-trash-alt me-1"></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">Tidak ada data guru yang tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function openModal() {
        document.getElementById('importModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('importModal').style.display = 'none';
    }
</script>

@endsection
