@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Monitoring Tunggakan</a></li>
      <li>Daftar Tunggakan</li>
    </ul>
  </div>

  <div class="w-full mt-2 pt-3">
    <div class="card w-full bg-gray-100 text-primary-content">
      <div class="card-body">
        <h2 class="card-title font-bold">Rekapitulasi Tunggakan Pajak Per Kelompok</h2>
        <div class="card-body bg-white rounded-lg">
          <div class="overflow-x-auto">
            <table class="table table-zebra w-full" id="tabel1" style="width: 100%">
              <!-- head -->
              <thead>
                <tr>
                  <th>Nama SPV</th>
                  <th>Tunggakan PPN</th>
                  <th>Tunggakan Non PPN</th>
                  <th>Total Tunggakan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rekap_per_spv as $r)
                  <tr>
                    <td>
                      @if ($r->spv == '')
                        unnasign
                      @else
                        {{ $r->spv }}
                      @endif
                    </td>
                    <td>{{ $r->ppn }}</td>
                    <td>{{ $r->non_ppn }}</td>
                    <td>{{ $r->ppn + $r->non_ppn }}</td>
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
        <h2 class="card-title font-bold">Rekapitulasi Tunggakan Pajak Per Ketua Tim</h2>
        <div class="card-body bg-white rounded-lg">
          <div class="overflow-x-auto">
            <table class="table table-zebra w-full" id="tabel2" style="width: 100%">
              <!-- head -->
              <thead>
                <tr>
                  <th>PIC</th>
                  <th>Tunggakan PPN</th>
                  <th>Tunggakan Non PPN</th>
                  <th>Total Tunggakan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rekap_per_tim as $r)
                  <tr>
                    <td>
                      @if ($r->kt == '')
                        unnasign
                      @else
                        {{ $r->kt }}
                      @endif
                    </td>
                    <td>{{ $r->ppn }}</td>
                    <td>{{ $r->non_ppn }}</td>
                    <td>{{ $r->ppn + $r->non_ppn }}</td>
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
