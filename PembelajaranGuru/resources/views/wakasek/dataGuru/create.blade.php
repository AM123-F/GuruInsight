@extends('layouts.master')

@section('content')
<div class="container py-5">
    <h1 class="fw-bold mb-4">Tambah Guru</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('wakasek.dataGuru.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" name="nip" id="nip" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <div id="mapel-container">
                        <div class="d-flex mb-2">
                            <select name="mapel_id[]" class="form-control">
                                <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                @foreach ($mapels as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-success ms-2 add-mapel">+</button>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('wakasek.dataGuru.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector(".add-mapel").addEventListener("click", function() {
            let mapelContainer = document.getElementById("mapel-container");
            let newSelectDiv = document.createElement("div");
            newSelectDiv.classList.add("d-flex", "mb-2");

            newSelectDiv.innerHTML = `
                <select name="mapel_id[]" class="form-control">
                    <option value="" disabled selected>Pilih Mata Pelajaran</option>
                    @foreach ($mapels as $mapel)
                        <option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-danger ms-2 remove-mapel">-</button>
            `;

            mapelContainer.appendChild(newSelectDiv);

            newSelectDiv.querySelector(".remove-mapel").addEventListener("click", function() {
                newSelectDiv.remove();
            });
        });
    });
</script>
@endsection
