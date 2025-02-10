@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Upload Blangko</h1>
    <a href="{{ route('wakasek.wakasek.blangkos.create') }}" class="btn btn-primary mb-3">Upload Blangko</a>

    <!-- Filter dan Pencarian -->
    <form method="GET" action="{{ route('wakasek.wakasek.blangkos.index') }}" class="mb-4 d-flex align-items-center">
        <!-- Filter Berdasarkan Jenis -->
        <select name="filter_jenis" class="form-control me-2">
            <option value="">-- Semua Jenis --</option>
            @foreach ($jenisOptions as $jenis)
                <option value="{{ $jenis }}" {{ request('filter_jenis') == $jenis ? 'selected' : '' }}>
                    {{ $jenis }}
                </option>
            @endforeach
        </select>
        
        <!-- Input Pencarian -->
        <input type="text" name="search" class="form-control me-2" placeholder="Cari blangko..." value="{{ request('search') }}">
        
        <!-- Tombol Search -->
        <button type="submit" class="btn btn-success me-2">
            <i class="fa fa-search"></i> Search
        </button>

        <!-- Tombol Reset Filter -->
        @if(request('filter_jenis') || request('search'))
            <a href="{{ route('wakasek.wakasek.blangkos.index') }}" class="btn btn-warning">
                <i class="fa fa-refresh"></i> Reset
            </a>
        @endif
    </form>

    <!-- Tabel Blangko -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>File</th>
                <th>Tanggal Unggah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($blangkos as $blangko)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $blangko->jenis }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $blangko->file_path) }}" download class="btn btn-info btn-sm">
                            Download
                        </a>
                    </td>
                    <td>{{ $blangko->created_at->format('d M Y H:i') }}</td>
                    <td>
                        <a href="{{ route('wakasek.wakasek.blangkos.edit', $blangko->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('wakasek.wakasek.blangkos.destroy', $blangko->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Tidak ada data ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
