@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Hasil Pemeriksaan</a></li>
      <li>Laporan Hasil Pemeriksaan</li>
    </ul>
  </div>

  <div class="grid grid-cols-3 gap-4 mb-5">
    <div class="stats bg-primary text-primary-content shadow">
      <div class="stat">
        <div class="stat-title font-bold">Jumlah LHP</div>
        <div class="stat-value">{{ $jumlah_lhp }} LHP</div>
        <div class="stat-desc font-semibold">Jumlah LHP Tahun {{ $tahun }}</div>
      </div>
    </div>

    <div class="stats shadow">
      <div class="stat">
        <div class="stat-title">Jumlah Konversi</div>
        <div class="stat-value">
          {{ $konversi }}
          {{-- @php
            $total = 0;
          @endphp
          @foreach ($list_lhp as $l)
            <div class="hidden">{{ $total += $l->konversi }}</div>
          @endforeach
          {{ $total }} --}}
        </div>
        <div class="stat-desc">Jumlah Konversi Atas Hasil Pemeriksaan</div>
      </div>
    </div>

    <div class="stats shadow">
      <div class="stat">
        <div class="stat-value">
          <form action="{{ route('lhp.store') }}" method="post">
            @csrf
            <div class="form-control w-full">
              <label class="label">
                <span class="label-text">Masukkan Tahun pajak</span>
              </label>
              <input value="{{ $tahun }}" name="tahun" type="text" placeholder="contoh: 2022"
                class="input w-full input-bordered" />
            </div>
            <button class="btn btn-gray-100 btn-sm mt-2 flex justify-center items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
              Search
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="w-full mt-2 pt-3">
    <div class="card w-full bg-gray-50 text-primary-content">
      <div class="card-body">
        <h2 class="card-title font-bold">Daftar Hasil Pemeriksaan Tahun {{ $tahun }}</h2>
        <div class="card-body bg-white rounded-lg">
          <div class="">
            <table class="display nowrap" id="tabel1" style="width: 100%">
              <thead>
                <tr style="font-size : 12px">
                  <th>NP2</th>
                  <th>NPWP</th>
                  <th>NAMA WP</th>
                  <th>KODE PEMERIKSAAN</th>
                  <th>PERIODE PEMERIKSAAN</th>
                  <th>NOMOR SP2</th>
                  <th>TGL SP2</th>
                  <th>NOMOR LHP</th>
                  <th>TGL LHP</th>
                  <th>SUPERVISOR</th>
                  <th>KETUA TIM</th>
                  <th>ANGGOTA 1</th>
                  <th>ANGGOTA 2</th>
                  <th>KONVERSI</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($list_lhp as $l)
                  <tr style="font-size : 12px">
                    <th>{{ $l->np2 }}</th>
                    <td>{{ $l->npwp }}</td>
                    <td>{{ $l->nama_wp }}</td>
                    <td>{{ $l->kode_rik }}</td>
                    <td>{{ $l->periode_1 }} - {{ $l->periode_2 }}</td>
                    <td>{{ $l->sp2 }}</td>
                    <td>
                      @if (!$l->tgl_sp2)
                        No Data
                      @else
                        {{ date('d-m-Y', strtotime($l->tgl_sp2)) }}
                      @endif
                    </td>
                    <td>{{ $l->lhp }}</td>
                    <td>
                      @if (!$l->tgl_lhp)
                        No Data
                      @else
                        {{ date('d-m-Y', strtotime($l->tgl_lhp)) }}
                      @endif
                    </td>
                    <td>
                      @if (!$l->spv)
                        No Data
                      @else
                        {{ $l->spv }}
                      @endif
                    </td>
                    <td>
                      @if (!$l->kt)
                        No Data
                      @else
                        {{ $l->kt }}
                      @endif
                    </td>
                    <td>
                      @if (!$l->ang_1)
                        No Data
                      @else
                        {{ $l->ang_1 }}
                      @endif
                    </td>
                    <td>
                      @if (!$l->ang_2)
                      @else
                        {{ $l->ang_2 }}
                      @endif
                    </td>
                    <td>
                      @if (!$l->konversi)
                        No Data
                      @else
                        {{ $l->konversi }}
                      @endif
                    </td>
                    <td>
                      <div class="flex space-x-2">
                        <a href="{{ route('lhp.arsiplhp', $l->np2) }}"
                          class="btn btn-sm flex items-center justify-center tooltip tooltip-left" data-tip="ARSIP">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                          </svg>
                        </a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    $(document).ready(function() {
      $('#tabel1').DataTable({
        order: false,
        scrollX: true,
        dom: 'Blfrtip',
        buttons: [
          'copy',
          'csvHtml5',
        ]
      });
    });
  </script>
@endsection
