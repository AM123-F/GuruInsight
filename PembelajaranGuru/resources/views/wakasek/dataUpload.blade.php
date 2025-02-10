@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Daftar Dokumen yang Diupload</h1>

    <!-- Filter Dokumen -->
    <div class="mt-3 mb-4">
        <form method="GET" action="#">
            <div class="row">
                <div class="col-md-6">
                    <label for="filter_jenis" class="form-label">Filter berdasarkan Jenis Dokumen</label>
                    <select class="form-control" id="filter_jenis" name="filter_jenis" onchange="this.form.submit()">
                        <option value="">Semua Jenis</option>
                        <option value="silabus">Silabus</option>
                        <option value="rpp">Rencana Pelaksanaan Pembelajaran</option>
                        <option value="prota">Program Tahunan</option>
                        <option value="promes">Program Semester</option>
                        <option value="kalender">Kalender Pendidikan</option>
                        <option value="rme">Rincian Minggu Efektif</option>
                        <option value="jadwal_mengajar">Jadwal Mengajar</option>
                        <option value="jadwal_pelajaran">Jadwal Pelajaran</option>
                        <option value="kkm">Kriteria Ketuntasan Minimal</option>
                        <option value="daftar_penilaian">Daftar Penilaian Pembelajaran</option>
                        <option value="lks">Lembar Kegiatan Siswa</option>
                        <option value="instrumen_evaluasi">Instrumen Evaluasi</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <!-- Tabel Daftar Dokumen -->
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Jenis Dokumen</th>
                <th>File</th>
                <th>Tanggal Upload</th>
                <th>Preview</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dokumens as $dokumen)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ optional($dokumen->guru)->name }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $dokumen->jenis)) }}</td>
                <td>
                    <a href="{{ asset('storage/' . $dokumen->file_path) }}" download class="btn btn-info btn-sm">Download</a>
                </td>
                <td>{{ \Carbon\Carbon::parse($dokumen->created_at)->timezone('Asia/Jakarta')->format('d M Y H:i') }}</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#previewModal{{ $dokumen->id }}">Preview</button>
                </td>
            </tr>
            <!-- Modal Preview -->
            <div class="modal fade" id="previewModal{{ $dokumen->id }}" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Preview Dokumen</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            @if(in_array(pathinfo($dokumen->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                <img src="{{ asset('storage/' . $dokumen->file_path) }}" class="img-fluid" alt="Preview Image">
                            @elseif(in_array(pathinfo($dokumen->file_path, PATHINFO_EXTENSION), ['pdf']))
                                <iframe src="{{ asset('storage/' . $dokumen->file_path) }}" width="100%" height="500px"></iframe>
                            @else
                                <p>Preview tidak tersedia untuk jenis file ini.</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
