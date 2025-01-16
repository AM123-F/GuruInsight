@extends('layouts.master')

@section('content')
<style>
    .container {
        max-width: 800px;
        margin: 20px auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333333;
        margin-bottom: 20px;
    }

    .btn {
        display: inline-block;
        padding: 8px 12px;
        color: #ffffff;
        background: #007bff;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .btn-danger {
        background: #dc3545;
    }

    .btn-warning {
        background: #ffc107;
        color: #000;
    }

    .btn:hover {
        opacity: 0.9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    table th {
        background: #f4f4f4;
    }

    .alert {
        padding: 10px;
        margin-bottom: 15px;
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        border-radius: 5px;
    }
</style>

<div class="container">
    <h1>Daftar Guru</h1>
    <a href="{{ route('wakasek.dataGuru.create') }}" class="btn">Tambah Guru</a>
    <a href="{{ route('wakasek.dataGuru.import') }}" class="btn btn-warning">Import Data Guru</a>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Role</th>
                <th>NIP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gurus as $guru)
                <tr>
                    <td>{{ $guru->nama }}</td>
                    <td>{{ $guru->role }}</td>
                    <td>{{ $guru->nip }}</td>
                    <td>
                        <a href="{{ route('wakasek.dataGuru.edit', $guru) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('wakasek.dataGuru.destroy', $guru) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
