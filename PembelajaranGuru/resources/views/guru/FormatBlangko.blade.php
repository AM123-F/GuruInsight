@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">📄 Daftar Blangko</h1>

    </div>

    <!-- Table -->
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">List Blangko</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 35%">Judul</th>
                        <th style="width: 30%">File</th>
                        <th style="width: 30%">Tanggal Unggah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blangkos as $blangko)
                        <tr>
                            <td class="align-middle text-center">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $blangko->judul }}</td>
                            <td class="align-middle">
                                <a href="{{ asset('storage/' . $blangko->file_path) }}" download="{{ basename($blangko->file_path) }}" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </td>
                            <td class="align-middle">{{ $blangko->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">
                                <em>Belum ada blangko yang diunggah.</em>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
