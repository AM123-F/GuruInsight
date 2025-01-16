@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Guru</h1>
    <form action="{{ route('wakasek.dataGuru.update', $guru) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" required value="{{ $guru->nama }}">

        <label for="nip">NIP</label>
        <input type="text" id="nip" name="nip" required value="{{ $guru->nip }}">

        <label for="role">Role</label>
        <select id="role" name="role" required>
            <option value="Guru" {{ $guru->role == 'Guru' ? 'selected' : '' }}>Guru</option>
            <option value="Admin" {{ $guru->role == 'Admin' ? 'selected' : '' }}>Admin</option>
        </select>

        <label for="password">Password (kosongkan jika tidak diubah)</label>
        <input type="password" id="password" name="password">

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
