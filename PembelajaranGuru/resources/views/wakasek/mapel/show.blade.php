@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-body">
            <h2 class="text-center mb-4">{{ $mapel->nama }}</h2>

            <h5 class="mb-3">Dokumen yang telah diunggah:</h5>

            @if ($mapel->dokumen->isEmpty())
                <p class="text-muted">Belum ada dokumen yang diunggah untuk mata pelajaran ini.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Judul Dokumen</th>
                                <th>Nama Guru</th>
                                <th>Tanggal Upload</th>
                                <th>File</th>
                                <th>Preview</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mapel->dokumen as $index => $dokumen)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $dokumen->judul }}</td>
                                    <td>{{ optional($dokumen->guru)->nama }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dokumen->created_at)->format('d M Y H:i') }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $dokumen->file_path) }}" download="{{ basename($dokumen->file_path) }}" class="btn btn-info btn-sm">
                                            Download
                                        </a>
                                    </td>
                                    <td>
                                        @if (in_array(pathinfo($dokumen->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                            <a href="{{ asset('storage/' . $dokumen->file_path) }}" target="_blank" class="btn btn-warning btn-sm">Lihat Gambar</a>
                                        @elseif (pathinfo($dokumen->file_path, PATHINFO_EXTENSION) === 'pdf')
                                            <a href="{{ asset('storage/' . $dokumen->file_path) }}" target="_blank" class="btn btn-warning btn-sm">Lihat PDF</a>
                                        @else
                                            <span class="text-muted">Preview Tidak Tersedia</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <a href="{{ route('wakasek.mapel.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
