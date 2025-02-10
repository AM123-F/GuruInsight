@extends('layouts.master')

@section('content')
<div class="container py-5">
    <h1 class="fw-bold mb-4">Edit Data Guru</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('wakasek.dataGuru.update', $guru->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="{{ $guru->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" name="nip" id="nip" value="{{ $guru->nip }}" required>
                </div>
                <div class="mb-3">
                    <label for="mapel_id" class="form-label">Mata Pelajaran</label>
                    <select name="mapel_id" class="form-control">
                        @foreach ($mapels as $mapel)
                            <option value="{{ $mapel->id }}" {{ $guru->mapel_id == $mapel->id ? 'selected' : '' }}>
                                {{ $mapel->nama }}
                            </option>
                        @endforeach
                    </select>
                    
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('wakasek.dataGuru.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
