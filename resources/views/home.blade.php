@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li>Home</li>
    </ul>
  </div>

  <div class="grid grid-cols-4 gap-4">
    <div class="stats bg-primary text-primary-content">
      <div class="stat">
        <div class="stat-title font-medium">Tunggakan Pemeriksaan</div>
        <div class="stat-value">{{ $rekap_tunggakan }} SP2</div>
        <div class="stat-actions">
          <button class="btn btn-sm btn-success">Lihat Detail</button>
        </div>
      </div>
    </div>

    <div class="stats bg-primary text-primary-content">
      <div class="stat">
        <div class="stat-title font-medium">NP2 Belum SP2</div>
        <div class="stat-value">{{ $np2_belum_sp2 }} NP2</div>
        <div class="stat-actions">
          <button class="btn btn-sm btn-success">Lihat Detail</button>
        </div>
      </div>
    </div>

    <div class="stats bg-primary text-primary-content">
      <div class="stat">
        <div class="stat-title">Tunggakan Pemeriksaan</div>
        <div class="stat-value">150 SP2</div>
        <div class="stat-actions">
          <button class="btn btn-sm btn-success">Lihat Detail</button>
        </div>
      </div>
    </div>

    <div class="stats bg-primary text-primary-content">
      <div class="stat">
        <div class="stat-title">Tunggakan Pemeriksaan</div>
        <div class="stat-value">150 SP2</div>
        <div class="stat-actions">
          <button class="btn btn-sm btn-success">Lihat Detail</button>
        </div>
      </div>
    </div>


  </div>
@endsection
