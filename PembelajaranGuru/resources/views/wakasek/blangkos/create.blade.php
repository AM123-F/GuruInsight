@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="text-center m-0">Upload Blangko</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('wakasek.wakasek.blangkos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="jenis" class="form-label">Jenis Blangko</label>
                    <select name="jenis_id" id="jenis_id" class="form-control" required>
                        <option value="">Pilih Jenis Blangko</option>
                        @foreach ($jenisOptions as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
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
