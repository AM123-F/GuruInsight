@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white text-center">
                    <h4 class="mb-0">Import Data Guru</h4>
                    <small class="text-light">Unggah file Excel untuk menambahkan data guru</small>
                </div>
                <div class="card-body">
                    <!-- Alert Success -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Alert Error -->
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Form Import -->
                    <form action="{{ route('wakasek.dataGuru.storeImport') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="file" class="form-label fw-bold">Pilih File Excel</label>
                            <input type="file" id="file" name="file" class="form-control form-control-lg" required>
                            <div class="form-text">Hanya file .xlsx atau .xls yang diperbolehkan.</div>
                        </div>

                        <!-- Progress bar -->
                        <div class="mb-3">
                            <div class="progress" style="height: 25px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 0%;" id="uploadProgress">
                                    0%
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-upload"></i> Upload File
                        </button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small class="text-muted">Pastikan file yang diunggah sesuai format</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Simulasi progress bar (opsional, jika ada fitur upload progress di backend)
    const form = document.querySelector('form');
    const progressBar = document.getElementById('uploadProgress');
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        let progress = 0;
        const interval = setInterval(() => {
            progress += 10;
            progressBar.style.width = `${progress}%`;
            progressBar.innerText = `${progress}%`;
            if (progress >= 100) {
                clearInterval(interval);
                form.submit();
            }
        }, 300);
    });
</script>
@endsection
