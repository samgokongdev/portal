@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>SKP Hasil Pemeriksaan</a></li>
      <li>Rekap SKP</li>
    </ul>
  </div>

  <div class="grid grid-cols-3 gap-4 mb-5">
    <div class="stats shadow">
      <div class="stat">
        <div class="stat-value">
          <form action="{{ route('skp.rekap2') }}" method="post">
            @csrf
            <div class="form-control w-full">
              <label class="label">
                <span class="label-text">Masukkan Tahun paak</span>
              </label>
              <input value="{{ $tahun }}" name="tahun" type="text" placeholder="contoh: 2022"
                class="input input-bordered w-full" />
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
                  <th>PIC</th>
                  <th>SKPKB/SKPKBT/STP TERBIT (IDR)</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rekap_skpkb as $a)
                  <tr>
                    <td>{{ $a->kelompok }}</td>
                    <td>{{ $a->pic }}</td>
                    <td>{{ number_format($a->jumlah_ket_idr) }}</td>
                    <td>{{ $a->pic }}</td>
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
