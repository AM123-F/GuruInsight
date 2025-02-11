@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Jenis Blangko</h2>
    <a href="{{ route('jenis_blangko.create') }}" class="btn btn-primary mb-3">Tambah Jenis Blangko</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenis_blangkos as $key => $jenis)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $jenis->nama }}</td>
                    <td>
                        <a href="{{ route('jenis_blangko.edit', $jenis->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('jenis_blangko.destroy', $jenis->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
