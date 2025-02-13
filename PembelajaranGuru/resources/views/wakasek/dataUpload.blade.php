@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">📚 Data Pengumpulan Mata Pelajaran</h1>

    <div class="row justify-content-center">
        @foreach ($mapels as $mapel)
            <div class="col-md-3"> <!-- Lebar dikurangi agar lebih kecil -->
                <div class="card shadow-lg border-0 p-2 mb-3 text-center"
                     style="background: #f8f9fa; transition: transform 0.3s ease-in-out; border-radius: 10px;">
                    
                    <div class="card-body p-3">
                        <!-- Mata Pelajaran Icon -->
                        @if ($mapel->logo)
                            <div class="d-flex justify-content-center mb-2">
                                <img src="{{ asset('storage/' . $mapel->logo) }}" 
                                     alt="Logo {{ $mapel->nama }}" 
                                     class="shadow-sm border p-1"
                                     style="width: 75px; height: 75px; object-fit: cover; border-radius: 10px;">
                            </div>
                        @endif

                        <!-- Nama Mata Pelajaran -->
                        <h6 class="card-title font-weight-bold text-primary mb-1">{{ $mapel->nama }}</h6>

                        <!-- Status Badge -->
                        @php
                            $totalPengumpulan = $mapel->dokumen()->count();
                        @endphp
                        <span class="badge {{ $totalPengumpulan > 0 ? 'bg-success' : 'bg-danger' }} px-2 py-1">
                            {{ $totalPengumpulan > 0 ? '✅ Ada' : '❌ Tidak Ada' }}
                        </span>

                        <!-- Tombol Lihat Pengumpulan -->
                        <div class="mt-2">
                            <a href="{{ route('wakasek.wakasek.mapel.show', $mapel->id) }}" 
                               class="btn btn-outline-primary btn-sm shadow-sm"
                               style="border-radius: 6px; padding: 5px 10px; font-size: 12px;">
                                📂 Lihat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Tambahkan efek hover -->
<style>
    .card:hover {
        transform: scale(1.02);
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.12);
    }
</style>
@endsection
