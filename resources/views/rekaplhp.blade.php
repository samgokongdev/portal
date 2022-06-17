@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Hasil Pemeriksaan</a></li>
      <li>Rekap Hasil Pemeriksaan</li>
    </ul>
  </div>

  <div class="w-full mt-2 pt-3">
    <div class="card w-full bg-gray-100 text-primary-content">
      <div class="card-body">
        <h2 class="card-title font-bold">Rekapitulasi Hasil Pemeriksaan Tahun {{ $tahun }}</h2>
        <div class="card-body bg-white rounded-lg">
          <div class="overflow-x-auto">
            <table class="table table-zebra w-full" id="tabel1" style="width: 100%">
              <!-- head -->
              <thead>
                <tr>
                  <th>KELOMPOK</th>
                  <th>Nama SPV</th>
                  <th>Jumlah LHP</th>
                  <th>Konversi</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rekap_per_spv as $r)
                  <tr>
                    <th>
                      @if (!$r->kelompok)
                        NON FPP
                      @else
                        {{ $r->kelompok }}
                      @endif
                    </th>
                    <td>{{ $r->fpp1 }}</td>
                    <td>{{ $r->jumlah_lhp }}</td>
                    <td>{{ $r->konversi }}</td>
                    <td>

                      <a class="btn btn-neutral btn-sm"
                        @if (!$r->fpp1) href="#"
                      @else
                      href="{{ route('lhp.detailperspv', $r->fpp1) }}" @endif>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                      </a>
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

  <div class="w-full mt-2 pt-3">
    <div class="card w-full bg-gray-100 text-primary-content">
      <div class="card-body">
        <h2 class="card-title font-bold">Rekapitulasi Hasil Pemeriksaan Tahun {{ $tahun }} (Per PIC)</h2>
        <div class="card-body bg-white rounded-lg">
          <div class="overflow-x-auto">
            <table class="table table-zebra w-full" id="tabel2" style="width: 100%">
              <!-- head -->
              <thead>
                <tr>
                  <th>KELOMPOK</th>
                  <th>PIC</th>
                  <th>Jumlah LHP</th>
                  <th>Konversi</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rekap_per_pic as $r)
                  <tr>
                    <th>
                      @if (!$r->kelompok)
                        NON FPP
                      @else
                        {{ $r->kelompok }}
                      @endif
                    </th>
                    <td>
                      @if (!$r->pic)
                        unnasign
                      @else
                        {{ $r->pic }}
                      @endif
                    </td>
                    <td>{{ $r->jumlah_lhp }}</td>
                    <td>{{ $r->konversi }}</td>
                    <td>
                      <a class="btn btn-neutral btn-sm"
                        @if (!$r->pic) href="#"
                      @else
                      href="{{ route('lhp.detailperpic', $r->pic) }}" @endif>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                      </a>
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

  <div class="h-10">

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

  <script>
    $(document).ready(function() {
      $('#tabel2').DataTable({
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
