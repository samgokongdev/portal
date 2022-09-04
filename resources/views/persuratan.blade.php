@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Persuratan</a></li>
      <li>Daftar Surat Seksi P3</li>
    </ul>
  </div>

  <div class="grid grid-cols-3 gap-4 mb-5">

    <div class="stats bg-green-900 text-white shadow">
      <div class="stat">
        <div class="stat-title font-bold">Nomor ND Terakhir</div>
        <div class="stat-value">
          @if (!$data1_terakhir)
            No Data
          @else
            {{ $data1_terakhir->no }}
          @endif
        </div>
        <div class="stat-desc font-semibold">
          @if (!$data1_terakhir)
          @else
            {{ $data1_terakhir->jenis }}-{{ $data1_terakhir->no }}/WPJ.07/KP.05/PaPj.2/{{ $data1_terakhir->tahun }}
          @endif
        </div>
        <div class="stat-actions">
          <button class="btn btn-sm btn-success"><a href="{{ route('persuratan.buat', 'ND') }}">Ambil Nomor</a></button>
        </div>
      </div>
    </div>

    <div class="stats bg-green-900 text-white shadow">
      <div class="stat">
        <div class="stat-title font-bold">Nomor SURAT Terakhir</div>
        <div class="stat-value">
          @if (!$data2_terakhir)
            No Data
          @else
            {{ $data2_terakhir->no }}
          @endif
        </div>
        <div class="stat-desc font-semibold">
          @if (!$data2_terakhir)
          @else
            {{ $data2_terakhir->jenis }}-{{ $data2_terakhir->no }}/WPJ.07/KP.05/PaPj.2/{{ $data2_terakhir->tahun }}
          @endif
        </div>
        <div class="stat-actions">
          <button class="btn btn-sm btn-success"><a href="{{ route('persuratan.buat', 'S') }}">Ambil Nomor</a></button>
        </div>
      </div>
    </div>

    <div class="stats bg-green-900 text-white shadow">
      <div class="stat">
        <div class="stat-title font-bold">Nomor UNDANGAN Terakhir</div>
        <div class="stat-value">
          @if (!$data3_terakhir)
            No Data
          @else
            {{ $data3_terakhir->no }}
          @endif
        </div>
        <div class="stat-desc font-semibold">
          @if (!$data3_terakhir)
          @else
            {{ $data3_terakhir->jenis }}-{{ $data3_terakhir->no }}/WPJ.07/KP.05/PaPj.2/{{ $data3_terakhir->tahun }}
          @endif
        </div>
        <div class="stat-actions">
          <button class="btn btn-sm btn-success"><a href="{{ route('persuratan.buat', 'UND') }}">Ambil
              Nomor</a></button>
        </div>
      </div>
    </div>



    {{-- <div class="stats shadow">
      <div class="stat">
        <div class="stat-value">
          <form action="{{ route('skp.store') }}" method="post">
            @csrf
            <div class="form-control w-full">
              <label class="label">
                <span class="label-text">Masukkan Tahun</span>
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
    </div> --}}
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success shadow">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('success') }}</span>
      </div>
    </div>
  @endif

  @if (session()->has('inputError'))
    <div class="alert alert-warning shadow">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('inputError') }}</span>
      </div>
    </div>
  @endif

  <div class="w-full mt-2 pt-3">
    <div class="card w-full bg-gray-50 text-primary-content">
      <div class="card-body">
        <h2 class="card-title font-bold">Daftar Nota Dinas (ND) Tahun {{ $tahun }}</h2>
        <div class="card-body bg-white rounded-lg">
          <div class="">
            <table class="display nowrap" id="tabel1" style="width: 100%">
              <thead>
                <tr style="font-size : 12px">
                  <th>NOMOR</th>
                  <th>TANGGAL</th>
                  <th>TUJUAN</th>
                  <th>PERIHAL</th>
                  <th>SP2</th>
                  {{-- <th>TANGGAL SP2</th> --}}
                  <th>SPHP</th>
                  {{-- <th>TANGGAL SPHP</th> --}}
                  <th>KONSEPTOR</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data1 as $d)
                  <tr>
                    <td>{{ $d->jenis }}-{{ $d->no }}/WPJ.07/KP.05/PaPj.2/{{ $d->tahun }}</td>
                    <td>{{ date('d M Y', strtotime($d->created_at)) }}</td>
                    <td>{{ $d->tujuan }}</td>
                    <td>{{ $d->perihal }}</td>
                    <td>{{ $d->sp2 }}</td>
                    <td>{{ $d->sphp }}</td>
                    <td>{{ $d->konseptor }} - Kelompok:{{ $d->kelompok }}</td>
                    <td>
                      <form method="post" action="{{ route('persuratan.cari') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $d->id }}">
                        <input type="hidden" name="jenis" value="{{ $d->jenis }}">
                        <button type="submit" class="btn btn-sm flex items-center justify-center">
                          EDIT
                        </button>
                      </form>
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
    <div class="card w-full bg-gray-50 text-primary-content">
      <div class="card-body">
        <h2 class="card-title font-bold">Daftar Surat Keluar (S) Tahun {{ $tahun }}</h2>
        <div class="card-body bg-white rounded-lg">
          <div class="">
            <table class="display nowrap" id="tabel2" style="width: 100%">
              <thead>
                <tr style="font-size : 12px">
                  <th>NOMOR</th>
                  <th>TANGGAL</th>
                  <th>TUJUAN</th>
                  <th>PERIHAL</th>
                  <th>SP2</th>
                  {{-- <th>TANGGAL SP2</th> --}}
                  <th>SPHP</th>
                  {{-- <th>TANGGAL SPHP</th> --}}
                  <th>KONSEPTOR</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data2 as $d)
                  <tr>
                    <td>{{ $d->jenis }}-{{ $d->no }}/WPJ.07/KP.05/PaPj.2/{{ $d->tahun }}</td>
                    <td>{{ date('d M Y', strtotime($d->created_at)) }}</td>
                    <td>{{ $d->tujuan }}</td>
                    <td>{{ $d->perihal }}</td>
                    <td>{{ $d->sp2 }}</td>
                    <td>{{ $d->sphp }}</td>
                    <td>{{ $d->konseptor }} - Kelompok:{{ $d->kelompok }}</td>
                    <td>
                      <form method="post" action="{{ route('persuratan.cari') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $d->id }}">
                        <input type="hidden" name="jenis" value="{{ $d->jenis }}">
                        <button type="submit" class="btn btn-sm flex items-center justify-center">
                          EDIT
                        </button>
                      </form>
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
    <div class="card w-full bg-gray-50 text-primary-content">
      <div class="card-body">
        <h2 class="card-title font-bold">Daftar Undangan (UND) Tahun {{ $tahun }}</h2>
        <div class="card-body bg-white rounded-lg">
          <div class="">
            <table class="display nowrap" id="tabel3" style="width: 100%">
              <thead>
                <tr style="font-size : 12px">
                  <th>NOMOR</th>
                  <th>TANGGAL</th>
                  <th>TUJUAN</th>
                  <th>PERIHAL</th>
                  <th>SP2</th>
                  {{-- <th>TANGGAL SP2</th> --}}
                  <th>SPHP</th>
                  {{-- <th>TANGGAL SPHP</th> --}}
                  <th>KONSEPTOR</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data3 as $d)
                  <tr>
                    <td>{{ $d->jenis }}-{{ $d->no }}/WPJ.07/KP.05/PaPj.2/{{ $d->tahun }}</td>
                    <td>{{ date('d M Y', strtotime($d->created_at)) }}</td>
                    <td>{{ $d->tujuan }}</td>
                    <td>{{ $d->perihal }}</td>
                    <td>{{ $d->sp2 }}</td>
                    <td>{{ $d->sphp }}</td>
                    <td>{{ $d->konseptor }} - Kelompok:{{ $d->kelompok }}</td>
                    <td>
                      <form method="post" action="{{ route('persuratan.cari') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $d->id }}">
                        <input type="hidden" name="jenis" value="{{ $d->jenis }}">
                        <button type="submit" class="btn btn-sm flex items-center justify-center">
                          EDIT
                        </button>
                      </form>
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
@endsection
