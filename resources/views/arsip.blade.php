@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Hasil Pemeriksaan</a></li>
      <li>Arsip LHP</li>
    </ul>
  </div>

  <div class="grid grid-cols-4 gap-4">
    <div
      @if ($data_inti->nd_ply == '') class="stats bg-red-900 text-white"
    @else
    class="stats bg-green-900 text-white" @endif>
      <div class="stat">
        <div class="stat-title font-medium">Status Kirim Ke Pelayanan</div>
        <div class="stat-value">
          @if ($data_inti->nd_ply == '')
            BELUM KIRIM
          @else
            TERKIRIM
          @endif
        </div>
      </div>
    </div>

    <div class="stats bg-primary text-primary-content">
      <div class="stat">
        <div class="stat-title font-medium">JUMLAH SKPKB (IDR)</div>
        <div class="stat-value">Rp {{ number_format($jumlah_skpkb) }}</div>
      </div>
    </div>

    <div class="stats bg-red-900 text-white">
      <div class="stat">
        <div class="stat-title font-medium">JUMLAH SKPLB (IDR)</div>
        <div class="stat-value">Rp {{ number_format($jumlah_skplb) }}</div>
      </div>
    </div>

    <div class="stats bg-green-900 text-white">
      <div class="stat">
        <div class="stat-title font-medium">JUMLAH PEMBAYARAN (IDR)</div>
        <div class="stat-value">Rp {{ number_format($jumlah_pembayaran) }}</div>
        <div class="stat-desc font-semibold mt-2">
          @if ($jumlah_skpkb == $jumlah_pembayaran)
            MATCH
          @else
            UNMATCH
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-3 gap-4 mb-5">
    <div class="w-full mt-2 pt-3">
      <div class="card w-full bg-gray-100 text-primary-content">
        <div class="card-body">
          <h4 class="font-bold">Data Laporan Hasil Pemeriksaan</h4>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-xs">Nomor Laporan</span>
            </label>
            <input readonly type="text" class="input input-bordered w-full input-xs bg-gray-200"
              value="{{ $data_inti->lhp }}" />
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-xs">Tanggal Laporan</span>
            </label>
            <input readonly type="text" class="input input-bordered w-full input-xs bg-gray-200"
              value="{{ date('d-m-Y', strtotime($data_inti->tgl_lhp)) }}" />
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-xs">NPWP</span>
            </label>
            <input readonly type="text" class="input input-bordered w-full input-xs bg-gray-200"
              value="{{ $data_inti->npwp }}" />
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-xs">Nama WP</span>
            </label>
            <input readonly type="text" class="input input-bordered w-full input-xs bg-gray-200"
              value="{{ $data_inti->nama_wp }}" />
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-xs">SP2 </span>
            </label>
            <input readonly type="text" class="input input-bordered w-full input-xs bg-gray-200"
              value="{{ $data_inti->sp2 }}" />
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-xs">Tanggal SP2 </span>
            </label>
            <input readonly type="text" class="input input-bordered w-full input-xs bg-gray-200"
              value="{{ date('d-m-Y', strtotime($data_inti->tgl_sp2)) }}" />
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-xs">Tahun (Periode Pemeriksaan)</span>
            </label>
            <input readonly type="text" class="input input-bordered w-full input-xs bg-gray-200"
              value="{{ $data_inti->tahun_pemeriksaan }} ({{ $data_inti->periode_1 }}-{{ $data_inti->periode_2 }})" />
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-xs">Kode Pemeriksaan</span>
            </label>
            <input readonly type="text" class="input input-bordered w-full input-xs bg-gray-200"
              value="{{ $data_inti->kode_rik }}" />
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-xs">Single Tax / All Tax </span>
            </label>
            <input readonly type="text" class="input input-bordered w-full input-xs bg-gray-200"
              value="@if ($data_inti->jenis_kode == 1) ALL TAX @else SINGLE TAX @endif" />
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-xs">Supervisor </span>
            </label>
            <input readonly type="text" class="input input-bordered w-full input-xs bg-gray-200"
              value="{{ $data_inti->fpp1 }}" />
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-xs">Ketua Tim </span>
            </label>
            <input readonly type="text" class="input input-bordered w-full input-xs bg-gray-200"
              value="{{ $data_inti->fpp2 }}" />
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-xs">Anggota 1 </span>
            </label>
            <input readonly type="text" class="input input-bordered w-full input-xs bg-gray-200"
              value="{{ $data_inti->fpp3 }}" />
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text text-xs">Anggota 2 </span>
            </label>
            <input readonly type="text" class="input input-bordered w-full input-xs bg-gray-200"
              value="{{ $data_inti->fpp4 }}" />
          </div>
        </div>
      </div>
      <div class="card w-full bg-gray-100 text-primary-content mt-4">
        <div class="card-body">
          <form method="post" action="{{ route('lhp.update', $data_inti->np2) }}">
            @csrf
            @method('PUT')
            <h4 class="font-bold">Kirim Ke Pelayanan</h4>
            <input type="hidden" value="{{ $data_inti->np2 }}" />
            <div class="form-control w-full">
              <label class="label">
                <span class="label-text">Nomor Nota Dinas</span>
              </label>
              <input type="text" placeholder="Type here" class="input input-bordered w-full"
                value="{{ $data_inti->nd_ply }}" name="nd_ply" />
            </div>
            <div class="form-control w-full">
              <label class="label">
                <span class="label-text">Tanggal ND</span>
              </label>
              <input readonly id="datepicker" type="text" placeholder="Type here"
                class="input input-bordered w-full bg-gray-200" value="" name="tgl_nd_ply" />
            </div>
            <button type="submit" class="btn btn-block mt-4">KIRIM ND</button>
          </form>
        </div>
      </div>
    </div>
    <div class="w-full mt-2 pt-3 col-span-2">
      <div class="card w-full bg-gray-100 text-primary-content">
        <div class="card w-full bg-gray-100 text-primary-content">
          <div class="card-body">
            <form class="form" method="post" action="{{ route('file.store') }}" enctype="multipart/form-data">
              @csrf
              <h4 class="font-bold">Upload Scan</h4>
              <div class="form-control w-full">
                <input type="hidden" name="np2" value="{{ $data_inti->np2 }}" />
                <label class="label">
                  <span class="label-text">JENIS FILE <span class="text-red-900 font-bold">*</span></span>
                </label>
                <select class="select select-bordered" name="jenis_file" required>
                  <option value="LHP">LHP</option>
                  <option value="KKP">KKP</option>
                  <option value="DOKUMEN PHP">Dokumen Pembahasan Akhir (SPHP, BAPHP, Risalah Pembahasan)</option>
                  <option value="PERMINTAAN DOKUMEN">Permintaan Dokumen, Peringatan 1, Peringatan 2</option>
                  <option value="BAPK">Permintaan Keterangan</option>
                  <option value="LAINNYA">Lainnya</option>
                </select>
              </div>
              <div class="form-control">
                <label class="label">
                  <span class="label-text">KETERANGAN</span>
                </label>
                <textarea class="textarea textarea-bordered h-20" name="keterangan" required></textarea>
              </div>
              <div class="form-control w-full mt-2">
                <label class="block">
                  <span class="sr-only">Choose File</span>
                  <input type="file" required name="file"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-900 file:text-white hover:file:bg-gray-800" />
                </label>
              </div>
              <button type="submit" class="btn btn-block btn-md mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span class="ml-2">UPLOAD</span>
              </button>
            </form>
          </div>
        </div>
      </div>

      <div class="card w-full bg-gray-100 text-primary-content mt-4">
        <div class="card-body">
          <h4 class="card-title font-bold">Daftar Softcopy</h4>
          {{-- <span class="text-red-900 font-bold">Arsip Hasil Scan Masih dalam proses migrasi</span> --}}
          <div class="card-body bg-white rounded-lg">
            <div class="overflow-x-auto">
              <table class="table table-zebra w-full" id="tabel1" style="width: 100%">
                <!-- head -->
                <thead>
                  <tr style="font-size: 12px">
                    <th>NP2</th>
                    <th>Jenis</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($digifile as $d)
                    <tr style="font-size: 11px">
                      <td>{{ $d->np2 }}</td>
                      <td>{{ $d->jenis_file }}</td>
                      <td>{{ $d->keterangan }}</td>
                      <td>
                        <div class="flex space-x-2">
                          <a href="{{ route('file.show', $d->id) }}" class="btn btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                          </a>
                          <form method="post" action="{{ route('file.destroy', $d->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $d->id }}">
                            <button type="submit" class="btn btn-sm bg-red-900 text-white border-red-900">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg>
                            </button>
                          </form>
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

      <div class="card w-full bg-gray-100 text-primary-content mt-4">
        <div class="card-body">
          <h4 class="card-title font-bold">Daftar SKPKB</h4>
          {{-- <span class="text-red-900 font-bold">Arsip Hasil Scan Masih dalam proses migrasi</span> --}}
          <div class="card-body bg-white rounded-lg">
            <div class="overflow-x-auto">
              <table class="table table-zebra w-full" id="tabel2" style="width: 100%">
                <!-- head -->
                <thead>
                  <tr style="font-size: 12px">
                    <th>JENIS SKP</th>
                    <th>NOMOR SKP</th>
                    <th>TANGGAL SKP</th>
                    <th>MASA/TAHUN</th>
                    <th>MATA UANG</th>
                    <th>NILAI SKP</th>
                    <th>KURS</th>
                    <th>NILAI SKP (IDR)</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data_skpkb as $a)
                    <tr style="font-size: 11px">
                      <td>{{ $a->jns_skp }} {{ $a->pasal_skp }}</td>
                      <td>{{ $a->nomor_ket }}</td>
                      <td>{{ date('d-m-Y', strtotime($a->tgl_produk_hukum)) }}</td>
                      <td>{{ $a->masa_1 }}-{{ $a->masa_2 }} / {{ $a->tahun_pajak }}</td>
                      <td>{{ $a->mata_uang }}</td>
                      <td>{{ number_format($a->jumlah_ket) }}</td>
                      <td>{{ $a->kurs }}</td>
                      <td>{{ number_format($a->jumlah_ket_idr) }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="card w-full bg-gray-100 text-primary-content mt-4">
        <div class="card-body">
          <h4 class="card-title font-bold">Daftar SKPLB</h4>
          {{-- <span class="text-red-900 font-bold">Arsip Hasil Scan Masih dalam proses migrasi</span> --}}
          <div class="card-body bg-white rounded-lg">
            <div class="overflow-x-auto">
              <table class="table table-zebra w-full" id="tabel3" style="width: 100%">
                <!-- head -->
                <thead>
                  <tr style="font-size: 12px">
                    <th>JENIS SKP</th>
                    <th>NOMOR SKP</th>
                    <th>TANGGAL SKP</th>
                    <th>MASA/TAHUN</th>
                    <th>MATA UANG</th>
                    <th>NILAI SKP</th>
                    <th>KURS</th>
                    <th>NILAI SKP (IDR)</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data_skplb as $a)
                    <tr style="font-size: 11px">
                      <td>{{ $a->jns_skp }} {{ $a->pasal_skp }}</td>
                      <td>{{ $a->nomor_ket }}</td>
                      <td>{{ date('d-m-Y', strtotime($a->tgl_produk_hukum)) }}</td>
                      <td>{{ $a->masa_1 }}-{{ $a->masa_2 }} / {{ $a->tahun_pajak }}</td>
                      <td>{{ $a->mata_uang }}</td>
                      <td>{{ number_format($a->jumlah_ket) }}</td>
                      <td>{{ $a->kurs }}</td>
                      <td>{{ number_format($a->jumlah_ket_idr) }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="card w-full bg-gray-100 text-primary-content mt-4">
        <div class="card-body">
          <h4 class="card-title font-bold">Daftar PENCAIRAN</h4>
          {{-- <span class="text-red-900 font-bold">Arsip Hasil Scan Masih dalam proses migrasi</span> --}}
          <div class="card-body bg-white rounded-lg">
            <div class="overflow-x-auto">
              <table class="table table-zebra w-full" id="tabel4" style="width: 100%">
                <!-- head -->
                <thead>
                  <tr style="font-size: 12px">
                    <th>JENIS SKP</th>
                    <th>NOMOR SKP</th>
                    <th>TANGGAL SKP</th>
                    <th>NILAI SKP (IDR)</th>
                    <th>JUMLAH BAYAR (IDR)</th>
                    <th>TANGGAL BAYAR</th>
                    <th>NTPN</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pembayaran as $a)
                    <tr style="font-size: 11px">
                      <td>{{ $a->jns_skp }} {{ $a->pasal_skp }}</td>
                      <td>{{ $a->nomor_ket }}</td>
                      <td>{{ date('d-m-Y', strtotime($a->tgl_produk_hukum)) }}</td>
                      <td>{{ number_format($a->jumlah_ket_idr) }}</td>
                      <td>{{ number_format($a->jumlah) }}</td>
                      <td>{{ date('d-m-Y', strtotime($a->tanggal_gabung)) }}</td>
                      <td>{{ $a->ntpn }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
@endsection

@section('script')
  <script>
    $(function() {
      $("#datepicker").datepicker();
      $("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd");
      $('#datepicker').datepicker("setDate", "<?php echo $data_inti->tgl_nd_ply; ?>");
    });
  </script>

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

  <script>
    $(document).ready(function() {
      $('#tabel3').DataTable({
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
      $('#tabel4').DataTable({
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
