@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Persuratan</a></li>
      <li>Surat Masuk Seksi P3</li>
    </ul>
  </div>

  <div class="grid grid-cols-3 gap-4 mb-5">

    <div class="stats bg-green-900 text-white shadow">
      <div class="stat">
        <div class="stat-title font-bold">Jumlah Surat Masuk</div>
        <div class="stat-value">
          {{ $jumlahsuratmasuk }} Surat
        </div>
        <div class="stat-actions">
          <button class="btn btn-sm btn-success"><a href="{{ route('suratmasuk.create') }}">Input Surat
              Masuk</a></button>
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
        <h2 class="card-title font-bold">Daftar Surat Masuk </h2>
        <div class="card-body bg-white rounded-lg">
          <div class="">
            <table class="display nowrap" id="tabel1" style="width: 100%">
              <thead>
                <tr style="font-size : 12px">
                  <th>TANGGAL TERIMA</th>
                  <th>NOMOR</th>
                  <th>ASAL SURAT</th>
                  <th>TANGGAL SURAT</th>
                  <th>PERIHAL</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($suratmasuk as $s)
                  <tr>
                    <td>{{ date('d M Y', strtotime($s->created_at)) }}</td>
                    <td>{{ $s->nomor }}</td>
                    <td>{{ $s->asal }}</td>
                    <td>{{ date('d M Y', strtotime($s->tanggal)) }}</td>
                    <td>{{ $s->perihal }}</td>
                    <td>
                      <a class="btn btn-sm btn-primary text-white">
                        <svg style="margin-right: 5px" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>Cetak</a>

                      <a href="{{ route('suratmasuk.show', $s->id) }}"
                        class="btn btn-sm bg-blue-900 border-blue-900 text-white">
                        <svg style="margin-right: 5px" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>Edit</a>

                      <a class="btn btn-sm bg-red-900 border-red-900 text-white">
                        <svg style="margin-right: 5px" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>Hapus</a>
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
