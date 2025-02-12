@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="title">Dashboard Guru</h2>

    <!-- Card Mapel -->
    <div class="card">
        <div class="card-header">📚 Daftar Mapel</div>
        <ul class="list-group">
            @foreach($gurus as $guru)
                <li class="list-group-item">
                    <div>
                        <strong>{{ $guru->nama }}</strong> <br>
                        <small>
                            {{ $guru->mapel->nama ?? 'Belum Ditentukan' }}
                        </small>
                    </div>
                    <span class="badge">{{ $guru->mapel ? '✅' : '⏳' }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Card Blangko dengan Checklist & Download -->
    <div class="card">
        <div class="card-header">📄 Daftar Blangko</div>
        <ul class="list-group">
            @foreach($blangkos as $blangko)
                <li class="list-group-item">
                    <label class="checkbox-container">
                        <input type="checkbox" class="checklist" data-id="{{ $blangko->id }}">
                        <span class="blangko-title">{{ $blangko->jenis->nama }}</span>
                    </label>

                    <div class="action-buttons">
                        <!-- Tombol Lihat -->
                        <a href="{{ asset('storage/' . $blangko->file_path) }}" target="_blank" class="btn-view">Lihat</a>

                        <!-- Tombol Download -->
                        <a href="{{ asset('storage/' . $blangko->file_path) }}" download class="btn-download">Download</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div> 

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let checkboxes = document.querySelectorAll(".checklist");

        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener("change", function () {
                let title = this.nextElementSibling;
                if (this.checked) {
                    title.classList.add("checked");
                } else {
                    title.classList.remove("checked");
                }
            });
        });
    });
</script>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 90%;
        max-width: 1200px;
        margin: 30px auto;
    }

    .title {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    .card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: scale(1.02);
    }

    .card-header {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 2px solid #ddd;
    }

    .list-group {
        list-style-type: none;
        padding: 0;
    }

    .list-group-item {
        padding: 12px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .list-group-item:last-child {
        border-bottom: none;
    }

    .badge {
        background: green;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
    }

    .btn-view, .btn-download {
        display: inline-block;
        text-decoration: none;
        background: #007bff;
        color: white;
        padding: 7px 14px;
        border-radius: 5px;
        font-size: 14px;
        transition: background 0.3s ease-in-out;
        margin-left: 5px;
    }

    .btn-download {
        background: #28a745;
    }

    .btn-view:hover {
        background: #0056b3;
    }

    .btn-download:hover {
        background: #218838;
    }

    .checkbox-container {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .checkbox-container input {
        margin-right: 10px;
        transform: scale(1.3);
    }

    .checked {
        text-decoration: line-through;
        color: gray;
    }

    .action-buttons {
        display: flex;
        gap: 5px;
    }
</style>
@endsection