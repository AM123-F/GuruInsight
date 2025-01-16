@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Import Data Guru</h3>
        </div>
        <div class="card-body">
            <!-- Alert Success -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <!-- Alert Error -->
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Form Import -->
            <form action="{{ route('wakasek.dataGuru.storeImport') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Pilih File Excel</label>
                    <input type="file" id="file" name="file" class="form-control" required>
                    <small class="text-muted">Hanya file dengan format .xlsx atau .xls yang didukung.</small>
                </div>
                <button type="submit" class="btn btn-success w-100">
                    <i class="bi bi-upload"></i> Import Data
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
