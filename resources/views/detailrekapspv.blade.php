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
                  <th>Nama PIC</th>
                  <th>Kode Pemeriksaan</th>
                  <th>NOMOR LHP</th>
                  <th>TANGGAL LHP</th>
                  <th>KONVERSI</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_per_pic as $r)
                  <tr style="font-size: 12px">
                    <th>
                      @if (!$r->kelompok)
                        NON FPP
                      @else
                        {{ $r->kelompok }}
                      @endif
                    </th>
                    <td>
                      @if (!$r->pic)
                        UNNASIGN
                      @else
                        {{ $r->pic }}
                      @endif
                    </td>
                    <td>{{ $r->kode_rik }}</td>
                    <td>{{ $r->lhp }}</td>
                    <td>{{ $r->tgl_lhp }}</td>
                    <td>{{ $r->konversi }}</td>
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
