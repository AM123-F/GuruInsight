@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Dashboard Guru</h2>

    <!-- Informasi Utama -->
    <div class="row">
        <!-- Jadwal Hari Ini -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Jadwal Hari Ini
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        {{-- @forelse($jadwalHariIni as $jadwal) --}}
                            <li class="list-group-item">
                                {{-- <strong>{{ $jadwal->mata_pelajaran }}</strong> <br> --}}
                                Waktu
                            </li>
                        {{-- @empty --}}
                            <li class="list-group-item">Tidak ada jadwal untuk hari ini.</li>
                        {{-- @endforelse --}}
                    </ul>
                </div>
            </div>
        </div>

        <!-- Daftar Tugas -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Daftar Tugas
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        {{-- @forelse($tugas as $tugasItem) --}}
                            <li class="list-group-item">
                                {{-- <strong>{{ $tugasItem->judul }}</strong> <br> --}}
                                Deadline: 
                            </li>
                        {{-- @empty --}}
                            <li class="list-group-item">Belum ada tugas.</li>
                        {{-- @endforelse --}}
                    </ul>
                </div>
            </div>
        </div>

        <!-- Informasi Penting -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    Informasi Penting
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        {{-- @forelse($informasi as $info) --}}
                            <li class="list-group-item">
                                {{-- <strong>{{ $info->judul }}</strong> <br> --}}
                                
                            </li>
                        {{-- @empty --}}
                            <li class="list-group-item">Tidak ada informasi penting.</li>
                        {{-- @endforelse --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
