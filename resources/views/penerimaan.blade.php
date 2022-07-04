@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Hasil Pemeriksaan</a></li>
      <li>Penerimaan PKM</li>
    </ul>
  </div>

  <div class="grid grid-cols-3 gap-4 mb-5">
    <div class="stats bg-green-900 text-white shadow">
      <div class="stat">
        <div class="stat-title font-bold">Penerimaan Total</div>
        <div class="stat-value">{{ number_format($sum_penerimaan) }}</div>
        <div class="stat-desc font-semibold">Penerimaan Dari Kegiatan Pemeriksaan dan Penagihan</div>
      </div>
    </div>

    <div class="stats bg-green-900 text-white shadow">
      <div class="stat">
        <div class="stat-title font-bold">Penerimaan Pemeriksaan</div>
        <div class="stat-value">{{ number_format($sum_penerimaan_pemeriksaan) }}</div>
        <div class="stat-desc font-semibold">Penerimaan Dari Kegiatan Pemeriksaan Tanpa Tindakan Penagihan</div>
      </div>
    </div>

    <div class="stats bg-red-900 text-white shadow">
      <div class="stat">
        <div class="stat-title">Penerimaan Penagihan</div>
        <div class="stat-value">{{ number_format($sum_penerimaan_penagihan) }}</div>
        <div class="stat-desc">Penerimaan dari produk hukum melalui tindakan penagihan</div>
      </div>
    </div>

    <div class="stats shadow">
      <div class="stat">
        <div class="stat-value">
          <form action="{{ route('penerimaan.store') }}" method="post">
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


  <div class="w-full mt-1" x-data="{ activeTab: 0 }">
    <div class="grid grid-cols-2 gap-4 mb-5">
      <button @click="activeTab = 0" class="btn btn-block btn-sm">Penerimaan Pemeriksaan</button>
      <button @click="activeTab = 1" class="btn btn-block btn-sm">Penerimaan Penagihan</button>
    </div>
    <div class="card w-full bg-gray-50 text-primary-content" x-show="activeTab === 0">
      <div class="card-body">
        <h2 class="card-title font-bold">Penerimaan {{ $tahun }} Dari Kegiatan Pemeriksaan</h2>
        <div class="card-body bg-white rounded-lg">
          <div class="overflow-x-auto">
            <table class="display nowrap" id="tabel1" style="width: 100%">
              <thead>
                <tr style="font-size : 12px">
                  <th>NPWP</th>
                  <th>KODEMAP/KJS</th>
                  <th>MASA PAJAK</th>
                  <th>TANGGAL SETOR</th>
                  <th>SKP</th>
                  <th>JUMLAH</th>
                  <th>SUMBER</th>
                  <th>NTPN</th>
                  <th>KETERANGAN</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($penerimaan_pemeriksaan as $l)
                  <tr style="font-size : 12px">
                    <td>{{ $l->npwp }}</td>
                    <td>{{ $l->kode_map }}/{{ $l->kjs }}</td>
                    <td>{{ $l->masa_pajak }}</td>
                    <td>{{ date('d-m-Y', strtotime($l->tanggal_gabung)) }}</td>
                    <td>{{ $l->no_skp }}</td>
                    <td>{{ number_format($l->jumlah) }}</td>
                    <td>{{ $l->sumber }}</td>
                    <td>{{ $l->ntpn }}</td>
                    <td>{{ $l->keterangan }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="card w-full bg-gray-50 text-primary-content" x-show="activeTab === 1">
      <div class="card-body">
        <h2 class="card-title font-bold">Penerimaan {{ $tahun }} Dari Kegiatan Penagihan</h2>
        <div class="card-body bg-white rounded-lg">
          <div class="overflow-x-auto">
            <table class="display nowrap" id="tabel3" style="width: 100%">
              <thead>
                <tr style="font-size : 12px">
                  <th>NPWP</th>
                  <th>KODEMAP/KJS</th>
                  <th>MASA PAJAK</th>
                  <th>TANGGAL SETOR</th>
                  <th>SKP</th>
                  <th>JUMLAH</th>
                  <th>SUMBER</th>
                  <th>NTPN</th>
                  <th>KETERANGAN</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($penerimaan_penagihan as $l)
                  <tr style="font-size : 12px">
                    <td>{{ $l->npwp }}</td>
                    <td>{{ $l->kode_map }}/{{ $l->kjs }}</td>
                    <td>{{ $l->masa_pajak }}</td>
                    <td>{{ date('d-m-Y', strtotime($l->tanggal_gabung)) }}</td>
                    <td>{{ $l->no_skp }}</td>
                    <td>{{ number_format($l->jumlah) }}</td>
                    <td>{{ $l->sumber }}</td>
                    <td>{{ $l->ntpn }}</td>
                    <td>{{ $l->keterangan }}</td>
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
        scrollX: false,
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
        order: false,
        scrollX: false,
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
      $('#tabel3').DataTable({
        order: false,
        scrollX: false,
        dom: 'Blfrtip',
        buttons: [
          'copy',
          'csvHtml5',
        ]
      });
    });
  </script>
@endsection
