@extends('layouts.master')

@section('content')
<div class="main-content" style="padding: 20px; font-family: Arial, sans-serif;">
  <div class="header" style="font-size: 1.5rem; font-weight: bold; margin-bottom: 20px;">Welcome, {{ Auth::user()->name }}</div>
  
  <div class="cards" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
    <div class="card" style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center;">
      <h3 style="font-size: 1.2rem; margin-bottom: 10px;">Total Guru</h3>
      <p style="font-size: 1rem; color: #555;">{{ $totalGuru }}</p>
  </div>
    <div class="card" style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center;">
      <h3 style="font-size: 1.2rem; margin-bottom: 10px;">#</h3>
      <p style="font-size: 1rem; color: #555;">45</p>
    </div>
    <div class="card" style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center;">
      <h3 style="font-size: 1.2rem; margin-bottom: 10px;">#</h3>
      <p style="font-size: 1rem; color: #555;">23</p>
    </div>
    <div class="card" style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center;">
      <h3 style="font-size: 1.2rem; margin-bottom: 10px;">#</h3>
      <p style="font-size: 1rem; color: #555;">$12,000</p>
    </div>
  </div>

  <div class="footer" style="margin-top: 20px; text-align: center; font-size: 0.9rem; color: #777;">
    © 2025 Admin Dashboard. All rights reserved.
  </div>
</div>
@endsection
