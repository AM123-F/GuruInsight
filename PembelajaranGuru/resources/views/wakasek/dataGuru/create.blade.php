@extends('layouts.master')

@section('content')
<style>
    .container {
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }

    form label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #555;
    }

    form input, form select, form button {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.3s ease;
    }

    form input:focus, form select:focus {
        border-color: #007bff;
    }

    form button {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        cursor: pointer;
        border: none;
    }

    form button:hover {
        background-color: #0056b3;
    }

    .error-message {
        color: #ff4d4d;
        font-size: 13px;
        margin-top: -15px;
        margin-bottom: 10px;
    }

    .error-global {
        background-color: #ffebeb;
        color: #d9534f;
        padding: 10px;
        border: 1px solid #d9534f;
        border-radius: 4px;
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <h1>Tambah Guru</h1>

    {{-- Display global errors if any --}}
    @if ($errors->any())
        <div class="error-global">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('wakasek.dataGuru.store') }}" method="POST">
        @csrf
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" required value="{{ old('nama') }}">
        @error('nama')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="nip">NIP</label>
        <input type="text" id="nip" name="nip" required value="{{ old('nip') }}">
        @error('nip')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="role">Role</label>
        <select id="role" name="role" required>
            <option value="Guru" {{ old('role') == 'Guru' ? 'selected' : '' }}>Guru</option>
        </select>
        @error('role')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        @error('password')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
