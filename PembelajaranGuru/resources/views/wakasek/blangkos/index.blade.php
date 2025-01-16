@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Daftar Blangko</h1>
    <a href="{{ route('wakasek.blangkos.create') }}" class="btn btn-primary">Upload Blangko</a>
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
            @foreach ($blangkos as $blangko)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $blangko->judul }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $blangko->file_path) }}" target="_blank">Download</a>
                    </td>
                    <td>{{ $blangko->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
