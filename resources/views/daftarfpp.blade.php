@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Monitoring Tunggakan</a></li>
      <li>Daftar Tunggakan</li>
    </ul>
  </div>

  <div class="grid grid-cols-3 gap-4 mb-5">
    <div class="stats shadow">
      <div class="stat">
        <div class="stat-title font-bold">Jumlah Kelompok</div>
        <div class="stat-value">{{ $jumlah_kelompok }} Kelompok</div>
        <div class="stat-desc">Jumlah total kelompok pemeriksa</div>
      </div>
    </div>

    <div class="stats shadow">
      <div class="stat">
        <div class="stat-title font-bold">FPP Non SPV</div>
        <div class="stat-value">{{ $spv_non_fpp }} Orang</div>
        <div class="stat-desc">Jumlah FPP Non Supervisor</div>
      </div>
    </div>
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

  <div class="w-full mt-2 pt-3">
    <div class="card w-full bg-gray-100 text-primary-content">
      <div class="card-body">
        <h2 class="card-title font-bold">Daftar Fungsional Pemeriksa Pajak</h2>
        <a class="btn btn-block" href="{{ route('daftarfpp.create') }}">Tambah</a>
        <div class="card-body bg-white rounded-lg">
          <div class="overflow-x-auto">
            <table class="table table-zebra w-full" id="tabel1" style="width: 100%">
              <!-- head -->
              <thead>
                <tr>
                  <th>KELOMPOK</th>
                  <th>KODE FPP</th>
                  <th>NAMA</th>
                  <th>POSISI</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($fpp as $f)
                  <tr>
                    <th>{{ $f->kelompok }}</th>
                    <td>{{ $f->kode_fpp }}</td>
                    <td>{{ $f->nama_fpp }}</td>
                    <td>
                      @if ($f->posisi == 0)
                        SUPERVISOR
                      @elseif($f->posisi == 1)
                        KETUA TIM
                      @else
                        ANGGOTA
                      @endif
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
        order: [
          [1, 'asc']
        ],
        scrollX: true,
        dom: 'Blfrtip',
        buttons: [
          'csvHtml5',
        ]
      });
    });
  </script>
@endsection
