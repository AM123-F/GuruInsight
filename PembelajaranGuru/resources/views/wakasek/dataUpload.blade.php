@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Daftar Dokumen yang Diupload Guru</h1>

    <!-- Tabel Daftar Upload -->
    <div class="mt-5">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Judul Dokumen</th>
                    <th>File</th>
                    <th>Tanggal Upload</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($uploads as $upload)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ optional($upload->guru)->nama }}</td> <!-- Nama guru dari relasi -->
                    <td>{{ $upload->judul }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $upload->file_path) }}" download="{{ basename($upload->file_path) }}" class="btn btn-info btn-sm">
                            Download
                        </a>
                    </td>
                    <td>{{ $upload->created_at->format('d M Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada dokumen yang diupload.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
