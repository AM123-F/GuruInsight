@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Guru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('wakasek.dataGuru.update', $guru) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="{{ $guru->nama }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" id="nip" name="nip" class="form-control" value="{{ $guru->nip }}" required>
                        </div>

                        <!-- Role diatur sebagai 'Guru' dengan input hidden -->
                        <input type="hidden" id="role" name="role" value="Guru">

                        <div class="mb-3">
                            <label for="password" class="form-label">Password <small>(kosongkan jika tidak diubah)</small></label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('wakasek.dataGuru.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
