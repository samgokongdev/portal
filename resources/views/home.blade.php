@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li>Home</li>
    </ul>
  </div>

  @if (Auth::user()->roles < 5)
    <div class="flex flex-col items-center justify-center h-[60vh]">
      <div class="text-2xl text-gray-900 font-bold">SELAMAT DATANG DI APLIKASI PORTALP3</div>
      <div class="text-xl text-gray-900 font-bold">KANTOR PELAYANAN PAJAK PENANAMAN MODAL ASING EMPAT</div>
      <a href="{{ route('lhp.permohonan') }}" class="btn mt-4">DAFTAR PERMOHONAN</a>
    </div>
  @else
    <div class="grid grid-cols-3 gap-4">
      <div class="stats bg-primary text-primary-content">
        <div class="stat">
          <div class="stat-title font-medium">Tunggakan Pemeriksaan</div>
          <div class="stat-value">{{ $rekap_tunggakan }} SP2</div>
          <div class="stat-actions">
            <button class="btn btn-sm btn-success"><a href="{{ route('tunggakan.index') }}">Lihat Detail</a></button>
          </div>
        </div>
      </div>

      <div class="stats bg-primary text-primary-content">
        <div class="stat">
          <div class="stat-title font-medium">NP2 Belum SP2</div>
          <div class="stat-value">{{ $np2_belum_sp2 }} NP2</div>
          <div class="stat-actions">
            <button class="btn btn-sm btn-success"><a href="{{ route('tunggakan.np2belumterbit') }}">Lihat
                Detail</a></button>
          </div>
        </div>
      </div>

      <div class="stats bg-primary text-primary-content">
        <div class="stat">
          <div class="stat-title font-medium">SP2 Belum SPPL</div>
          <div class="stat-value">{{ $belumsppl }} SP2</div>
          <div class="stat-actions">
            <button class="btn btn-sm btn-success"><a href="{{ route('tunggakan.belumsppl') }}">Lihat
                Detail</a></button>
          </div>
        </div>
      </div>

      <div class="stats bg-primary text-primary-content">
        <div class="stat">
          <div class="stat-title font-medium">SP2 Target SPHP Bulan ini</div>
          <div class="stat-value">{{ $sphpbulanini }} SP2</div>
          <div class="stat-actions">
            <button class="btn btn-sm btn-success"><a href="{{ route('tunggakan.sphpbulanini') }}">Lihat
                Detail</a></button>
          </div>
        </div>
      </div>

      <div class="stats bg-primary text-primary-content">
        <div class="stat">
          <div class="stat-title font-medium">SP2 Target LHP Bulan ini</div>
          <div class="stat-value">{{ $lhpbulanini }} SP2</div>
          <div class="stat-actions">
            <button class="btn btn-sm btn-success"><a href="{{ route('tunggakan.lhpbulanini') }}">Lihat
                Detail</a></button>
          </div>
        </div>
      </div>

      <div class="stats bg-red-900 text-white">
        <div class="stat">
          <div class="stat-title font-medium">Pemeriksaan JT < 14 hari</div>
              <div class="stat-value">{{ $pemeriksaan_jt_dekat }} SP2</div>
              <div class="stat-actions">
                <button class="btn btn-sm btn-success"><a href="{{ route('tunggakan.jt') }}">Lihat
                    Detail</a></button>
              </div>
          </div>
        </div>

        <div class="stats bg-green-900 text-white">
          <div class="stat">
            <div class="stat-title font-medium">Pemeriksaan Selesai</div>
            <div class="stat-value">{{ $lhp }} LHP</div>
            <div class="stat-actions">
              <button class="btn btn-sm btn-success"><a href="{{ route('lhp.index') }}">Lihat
                  Detail</a></button>
            </div>
          </div>
        </div>

        <div class="stats bg-green-900 text-ora text-white">
          <div class="stat">
            <div class="stat-title font-medium">Konversi</div>
            <div class="stat-value">{{ $konversi }}</div>
            <div class="stat-actions">
              <button class="btn btn-sm btn-success"><a href="{{ route('lhp.index') }}">Lihat
                  Detail</a></button>
            </div>
          </div>
        </div>

        <div class="stats bg-green-900 text-ora text-white">
          <div class="stat">
            <div class="stat-title font-medium">SKPKB & STP</div>
            <div class="stat-value" style="font-size: 24px">Rp {{ number_format($sum_skpkb) }}</div>
            <div class="stat-actions">
              <button class="btn btn-sm btn-success"><a href="{{ route('skp.index') }}">Lihat
                  Detail</a></button>
            </div>
          </div>
        </div>

        <div class="stats bg-red-900 text-ora text-white">
          <div class="stat">
            <div class="stat-title font-medium">SKPLB</div>
            <div class="stat-value" style="font-size: 24px">Rp {{ number_format($sum_skplb * -1) }}</div>
            <div class="stat-actions">
              <button class="btn btn-sm btn-success"><a href="{{ route('skp.index') }}">Lihat
                  Detail</a></button>
            </div>
          </div>
        </div>

        <div class="stats bg-green-900 text-ora text-white">
          <div class="stat">
            <div class="stat-title font-medium">Penerimaan Pemeriksaan</div>
            <div class="stat-value" style="font-size: 24px">{{ number_format($sum_penerimaan_pemeriksaan) }}</div>
            <div class="stat-actions">
              <button class="btn btn-sm btn-success"><a href="{{ route('penerimaan.index') }}">Lihat
                  Detail</a></button>
            </div>
          </div>
        </div>

        <div class="stats bg-green-900 text-ora text-white">
          <div class="stat">
            <div class="stat-title font-medium">Penerimaan Penagihan</div>
            <div class="stat-value" style="font-size: 24px">{{ number_format($sum_penerimaan_penagihan) }}</div>
            <div class="stat-actions">
              <button class="btn btn-sm btn-success"><a href="{{ route('penerimaan.index') }}">Lihat
                  Detail</a></button>
            </div>
          </div>
        </div>

      </div>
  @endif
@endsection
