@extends('layouts.master')

@section('content')
<div class="container py-5">
    <h1 class="fw-bold">Edit Data Guru</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('wakasek.dataGuru.update', $guru->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="{{ $guru->nip }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $guru->nama }}" required>
                </div>

                <div class="mb-3">
                    <label for="mapels" class="form-label">Mata Pelajaran</label>
                    <select class="form-select" id="mapels" name="mapels[]" multiple required>
                        @foreach($mapels as $mapel)
                            <option value="{{ $mapel->id }}" {{ $guru->mapels->contains($mapel->id) ? 'selected' : '' }}>
                                {{ $mapel->nama }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">Tekan CTRL atau Command untuk memilih lebih dari satu.</small>
                </div>

                <div class="text-end">
                    <a href="{{ route('wakasek.dataGuru.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
