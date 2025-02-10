@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="text-center m-0">Upload Blangko</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('wakasek.wakasek.blangkos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="jenis" class="form-label">Jenis Blangko</label>
                    <select name="jenis" id="jenis" class="form-control" required>
                        <option value="">Pilih Jenis Blangko</option>
                        @foreach ($jenisOptions as $jenis)
                            <option value="{{ $jenis }}">{{ $jenis }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="file" class="form-label">File Blangko</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>
@endsection
