@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Import Data Guru</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('wakasek.dataGuru.storeImport') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Pilih File Excel</label>
        <input type="file" id="file" name="file" required>
        <button type="submit">Import</button>
    </form>
</div>
@endsection
