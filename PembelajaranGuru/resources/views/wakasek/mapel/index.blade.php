@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1>Daftar Mata Pelajaran</h1>
    <a href="{{ route('wakasek.mapel.create') }}" class="btn btn-primary mb-3">Tambah Mata Pelajaran</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mapels as $mapel)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mapel->nama }}</td>
                <td>
                    <a href="{{ route('wakasek.mapel.edit', $mapel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('wakasek.mapel.destroy', $mapel->id) }}" method="POST" class="d-inline">
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
