@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Hasil Pemeriksaan</a></li>
      <li>SKP Hasil Pemeriksaan</li>
    </ul>
  </div>

  <div class="grid grid-cols-3 gap-4 mb-5">
    <div class="stats bg-green-900 text-white shadow">
      <div class="stat">
        <div class="stat-title font-bold">JUMLAH SKP STP</div>
        <div class="stat-value" style="font-size: 25px">{{ number_format($sum_skpkb, 0) }}</div>
        <div class="stat-desc font-semibold">Jumlah SKPKB/SKPKBT/STP Tahun {{ $tahun }}</div>
      </div>
    </div>

    <div class="stats bg-red-900 text-white shadow">
      <div class="stat">
        <div class="stat-title">JUMLAH SKPLB</div>
        <div class="stat-value" style="font-size: 25px">{{ number_format($sum_skplb, 0) }}</div>
        <div class="stat-desc">Jumlah SKPLB Tahun {{ $tahun }} </div>
      </div>
    </div>

    <div class="stats shadow">
      <div class="stat">
        <div class="stat-value">
          <form action="{{ route('skp.store') }}" method="post">
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
    <div class="card w-full bg-gray-50 text-primary-content">
      <div class="card-body">
        <h2 class="card-title font-bold">Daftar SKPKB/SKPKBT/SKPSTP Hasil Pemeriksaan {{ $tahun }}</h2>
        <div class="card-body bg-white rounded-lg">
          <div class="">
            <table class="display nowrap" id="tabel1" style="width: 100%">
              <thead>
                <tr style="font-size : 12px">
                  <th>NOMOR</th>
                  <th>TANGGAL KET</th>
                  <th>NPWP</th>
                  <th>NAMA WP</th>
                  <th>JENIS SKP</th>
                  <th>PASAL</th>
                  <th>MASA/TAHUN PAJAK</th>
                  <th>USD/IDR</th>
                  <th>JUMLAH_KET</th>
                  <th>KURS</th>
                  <th>JUMLAH_KET (IDR)</th>
                  <th>SUMBER DOKUMEN</th>
                  <th>SUPERVISOR</th>
                  <th>PIC</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_skpkb as $d)
                  <tr style="font-size : 12px">
                    <td>{{ $d->nomor_ket }}</td>
                    <td>{{ $d->tgl_produk_hukum }}</td>
                    <td>{{ $d->npwp }}</td>
                    <td>{{ $d->nama_wp }}</td>
                    <td>{{ $d->jns_skp }}</td>
                    <td>{{ $d->pasal_skp }}</td>
                    <td>{{ $d->masa_1 }}-{{ $d->masa_2 }}/{{ $d->tahun_pajak }}</td>
                    <td>{{ $d->mata_uang }}</td>
                    <td>{{ number_format($d->jumlah_ket) }}</td>
                    <td>{{ number_format($d->kurs) }}</td>
                    <td>{{ number_format($d->jumlah_ket_idr) }}</td>
                    <td>{{ $d->no_dok }}</td>
                    <td>{{ $d->fpp1 }}</td>
                    <td>{{ $d->pic }}</td>
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
    <div class="card w-full bg-gray-50 text-primary-content">
      <div class="card-body">
        <h2 class="card-title font-bold">Daftar SKPLB Hasil Pemeriksaan {{ $tahun }} </h2>
        <div class="card-body bg-white rounded-lg">
          <div class="">
            <table class="display nowrap" id="tabel2" style="width: 100%">
              <thead>
                <tr style="font-size : 12px">
                  <th>NOMOR</th>
                  <th>TANGGAL KET</th>
                  <th>NPWP</th>
                  <th>NAMA WP</th>
                  <th>JENIS SKP</th>
                  <th>PASAL</th>
                  <th>MASA/TAHUN PAJAK</th>
                  <th>USD/IDR</th>
                  <th>JUMLAH_KET</th>
                  <th>KURS</th>
                  <th>JUMLAH_KET (IDR)</th>
                  <th>SUMBER DOKUMEN</th>
                  <th>SUPERVISOR</th>
                  <th>PIC</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_skplb as $d)
                  <tr style="font-size : 12px">
                    <td>{{ $d->nomor_ket }}</td>
                    <td>{{ $d->tgl_produk_hukum }}</td>
                    <td>{{ $d->npwp }}</td>
                    <td>{{ $d->nama_wp }}</td>
                    <td>{{ $d->jns_skp }}</td>
                    <td>{{ $d->pasal_skp }}</td>
                    <td>{{ $d->masa_1 }}-{{ $d->masa_2 }}/{{ $d->tahun_pajak }}</td>
                    <td>{{ $d->mata_uang }}</td>
                    <td>{{ number_format($d->jumlah_ket) }}</td>
                    <td>{{ number_format($d->kurs) }}</td>
                    <td>{{ number_format($d->jumlah_ket_idr) }}</td>
                    <td>{{ $d->no_dok }}</td>
                    <td>{{ $d->fpp1 }}</td>
                    <td>{{ $d->pic }}</td>
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
