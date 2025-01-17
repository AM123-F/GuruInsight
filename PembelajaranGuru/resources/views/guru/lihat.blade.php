@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Dokumen Tugas yang Dikerjakan</h1>

    @if($dokumenTugas->isEmpty())
        <p class="text-center">Belum ada dokumen yang diunggah untuk tugas ini.</p>
    @else
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>File</th>
                    <th>Tanggal Unggah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokumenTugas as $dokumen)
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
    @endif
</div>
@endsection
