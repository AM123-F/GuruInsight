@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Daftar Blangko</h1>
    <a href="{{ route('wakasek.wakasek.blangkos.create') }}" class="btn btn-primary">Upload Blangko</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>File</th>
                <th>Tanggal Unggah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blangkos as $blangko)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $blangko->judul }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $blangko->file_path) }}" download="{{ basename($blangko->file_path) }}" class="btn btn-info btn-sm">
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
            @endforeach
        </tbody>
    </table>
</div>
@endsection
