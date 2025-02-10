@extends('layouts.master')

@section('content')
<style>
.circle-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50px;
}

.circle {
    position: relative;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: conic-gradient(
        #28a745 {{ $uploadPercentage }}%, /* Green for uploaded */
        #dc3545 0% {{ 100 - $uploadPercentage }}% /* Red for not uploaded */
    );
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Adding a subtle shadow */
    transition: background 1s ease; /* Smooth transition */
}

.circle .percentage {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 2rem;
    font-weight: bold;
    color: white;
    font-family: 'Arial', sans-serif; /* A more modern font */
    letter-spacing: 1px;
}

.circle-label {
    text-align: center;
    font-size: 1.2rem;
    color: #666;
    font-family: 'Arial', sans-serif;
}


</style>
<div class="container mt-5">
  <!-- Title -->
  <h3 class="text-center mb-4">Persentase Guru yang Sudah Mengupload Dokumen</h3>

  <!-- Circular Progress Bar -->
  <div class="circle-container">
      <div class="circle">
          <div class="percentage">
              {{ round($uploadPercentage, 2) }}%
          </div>
      </div>
  </div>

  <!-- Additional Information -->
  <div class="circle-label mt-3">
      <p>{{ $teachersWithUploads }} dari {{ $totalTeachers }} guru telah mengupload dokumen.</p>
  </div>

  <!-- Extra Visual Elements (Optional) -->
  <div class="text-center mt-4">
      <p class="text-muted">Angka ini menunjukkan persentase guru yang sudah mengupload dokumen di sistem.</p>
  </div>
</div>
@endsection
