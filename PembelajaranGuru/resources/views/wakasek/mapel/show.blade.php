@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-body">
            <h2 class="text-center mb-4">{{ $mapel->nama }}</h2>

            <h5 class="mb-3">Dokumen yang telah diunggah:</h5>
            
            <form method="GET" action="{{ route('wakasek.wakasek.mapel.show', $mapel->id) }}" class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <select name="jenis_blangko" class="form-control" onchange="this.form.submit()">
                            <option value="">-- Pilih Jenis Blangko --</option>
                            @foreach ($jenisBlangko as $jenis)
                                <option value="{{ $jenis->id }}" {{ request('jenis_blangko') == $jenis->id ? 'selected' : '' }}>
                                    {{ $jenis->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>

            @if ($dokumen->isEmpty())
                <p class="text-muted">Belum ada dokumen yang diunggah untuk mata pelajaran ini.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Judul Dokumen</th>
                                <th>Jenis Blangko</th>
                                <th>Nama Guru</th>
                                <th>Tanggal Upload</th>
                                <th>File</th>
                                <th>Preview</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokumen as $index => $doc)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $doc->judul }}</td>
                                    <td>{{ $doc->jenis->nama ?? 'Tidak ada' }}</td>
                                    <td>{{ optional($doc->guru)->nama }}</td>
                                    <td>{{ \Carbon\Carbon::parse($doc->created_at)->timezone('Asia/Jakarta')->format('d M Y H:i') }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $doc->file_path) }}" download="{{ basename($doc->file_path) }}" class="btn btn-info btn-sm">
                                            Download
                                        </a>
                                    </td>
                                    <td>
                                        @if (in_array(pathinfo($doc->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                            <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="btn btn-warning btn-sm">Lihat Gambar</a>
                                        @elseif (pathinfo($doc->file_path, PATHINFO_EXTENSION) === 'pdf')
                                            <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="btn btn-warning btn-sm">Lihat PDF</a>
                                        @else
                                            <span class="text-muted">Preview Tidak Tersedia</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <a href="{{ route('wakasek.mapel.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
