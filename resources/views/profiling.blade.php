@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Cari WP</a></li>
      <li>Hasil Pencarian</li>
    </ul>
  </div>

  <div class="grid grid-cols-5 gap-4 mb-5" x-data="{ activeTab: 0 }">
    <div class="card w-full rounded-none space-y-2">
      <button class="btn btn-block" @click="activeTab = 0">Profil Utama</button>
      <button class="btn btn-block" @click="activeTab = 1">Peta Pemeriksaan</button>
      <button class="btn btn-block" @click="activeTab = 2">Pemeriksaan All Tax (Selesai)</button>
      <button class="btn btn-block" @click="activeTab = 3">Pemeriksaan Single Tax (Selesai)</button>
      <button class="btn btn-block" @click="activeTab = 4">Tunggakan Pemeriksaan</button>
    </div>
    <div class="card w-full col-span-4 text-primary-content">
      <div x-show="activeTab === 0" x-transition>
        <div class="card w-full bg-gray-100 text-primary-content shadow-sm">
          <div class="card-body">
            <p class="font-bold text-xs">NPWP</p>
            <h2 class="card-title font-bold">{{ $data->npwp }}</h2>
            <p class="font-bold text-xs">NAMA WP</p>
            <h2 class="card-title font-bold">{{ $data->nama_wp }}</h2>
            <p class="font-bold text-xs">NAMA WP</p>
            <h2 class="card-title font-bold">
              {{ $data->alamat }}, {{ $data->kelurahan }}, {{ $data->kecamatan }}, {{ $data->kabupaten }},
              {{ $data->propinsi }}
            </h2>
            <p class="font-bold text-xs">JENIS WP (BENTUK HUKUM)</p>
            <h2 class="card-title font-bold">
              {{ $data->jenis_wp }} ({{ $data->bentuk }})
            </h2>
            <p class="font-bold text-xs">KLU</p>
            <h2 class="card-title font-bold">
              {{ $data->klu }}
            </h2>
            <p class="font-bold text-xs">NOMOR TELP</p>
            <h2 class="card-title font-bold">
              {{ $data->no_telp }}
            </h2>
            <p class="font-bold text-xs">STATUS</p>
            <h2 class="card-title font-bold">
              {{ $data->status }}
            </h2>
            <p class="font-bold text-xs">Account Representative</p>
            <h2 class="card-title font-bold">
              {{ $data->ar }}
            </h2>
          </div>
        </div>
      </div>
      <div x-show="activeTab === 1" x-transition>
        <div class="w-full col-span-2">
          <div class="card w-full bg-gray-100 text-primary-content">
            <div class="card-body">
              <h2 class="card-title font-bold">PETA PEMERIKSAAN (ALL TAXES) TAHUN PAJAK {{ date('Y') - 5 }} s.d.
                {{ date('Y') }}</h2>
              {{-- <span class="text-red-900 font-bold">Arsip Hasil Scan Masih dalam proses migrasi</span> --}}
              <div class="card-body bg-white rounded-lg">
                <div class="overflow-x-auto">
                  <table class="table w-full" id="" style="width: 100%">
                    <!-- head -->
                    <thead>
                      <tr>
                        <th>Jenis</th>
                        <th>{{ DATE('Y') - 5 }}</th>
                        <th>{{ DATE('Y') - 4 }}</th>
                        <th>{{ DATE('Y') - 3 }}</th>
                        <th>{{ DATE('Y') - 2 }}</th>
                        <th>{{ DATE('Y') - 1 }}</th>
                        <th>{{ DATE('Y') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Pemeriksaan Selesai</td>
                        @if ($tahun_5 == 0)
                          <td class="bg-red-600">{{ $tahun_5 }}</td>
                        @else
                          <td class="bg-green-600">{{ $tahun_5 }}</td>
                        @endif

                        @if ($tahun_4 == 0)
                          <td class="bg-red-600">{{ $tahun_4 }}</td>
                        @else
                          <td class="bg-green-600">{{ $tahun_4 }}</td>
                        @endif

                        @if ($tahun_3 == 0)
                          <td class="bg-red-600">{{ $tahun_3 }}</td>
                        @else
                          <td class="bg-green-600">{{ $tahun_3 }}</td>
                        @endif

                        @if ($tahun_2 == 0)
                          <td class="bg-red-600">{{ $tahun_2 }}</td>
                        @else
                          <td class="bg-green-600">{{ $tahun_2 }}</td>
                        @endif

                        @if ($tahun_1 == 0)
                          <td class="bg-red-600">{{ $tahun_1 }}</td>
                        @else
                          <td class="bg-green-600">{{ $tahun_1 }}</td>
                        @endif

                        @if ($tahun_ini == 0)
                          <td class="bg-red-600">{{ $tahun_ini }}</td>
                        @else
                          <td class="bg-green-600">{{ $tahun_ini }}</td>
                        @endif
                      </tr>
                      <tr>
                        <td>Tunggakan Pemeriksaan</td>
                        @if ($tunggakan_t5 == 0)
                          <td class="bg-red-600">{{ $tunggakan_t5 }}</td>
                        @else
                          <td class="bg-green-600">{{ $tunggakan_t5 }}</td>
                        @endif

                        @if ($tunggakan_t4 == 0)
                          <td class="bg-red-600">{{ $tunggakan_t4 }}</td>
                        @else
                          <td class="bg-green-600">{{ $tunggakan_t4 }}</td>
                        @endif

                        @if ($tunggakan_t3 == 0)
                          <td class="bg-red-600">{{ $tunggakan_t3 }}</td>
                        @else
                          <td class="bg-green-600">{{ $tunggakan_t3 }}</td>
                        @endif

                        @if ($tunggakan_t2 == 0)
                          <td class="bg-red-600">{{ $tunggakan_t2 }}</td>
                        @else
                          <td class="bg-green-600">{{ $tunggakan_t2 }}</td>
                        @endif

                        @if ($tunggakan_t1 == 0)
                          <td class="bg-red-600">{{ $tunggakan_t1 }}</td>
                        @else
                          <td class="bg-green-600">{{ $tunggakan_t1 }}</td>
                        @endif

                        @if ($tunggakan_t0 == 0)
                          <td class="bg-red-600">{{ $tunggakan_t0 }}</td>
                        @else
                          <td class="bg-green-600">{{ $tunggakan_t0 }}</td>
                        @endif
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div x-show="activeTab === 2" x-transition>
        <div class="w-full">
          <div class="card w-full bg-gray-100 text-primary-content">
            <div class="card-body">
              <h2 class="card-title font-bold">Daftar Hasil Pemeriksaan (All Tax) </h2>
              <div class="card-body bg-white rounded-lg">
                <div class="overflow-x-auto">
                  <table class="table table-zebra" id="tabel1" style="width: 100%">
                    <!-- head -->
                    <thead>
                      <tr>
                        <th>NOMOR LHP</th>
                        <th>PERIODE</th>
                        <th>KODE PEMERIKSAAN</th>
                        <th>SUPERVISOR</th>
                        <th>KETUA TIM</th>
                        <th>ANGGOTA 1</th>
                        <th>ANGGOTA 2</th>
                        <th>AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($lhp as $f)
                        <tr style="font-size :12px">
                          <td>{{ $f->lhp }}</td>
                          <td>{{ $f->periode_1 }}-{{ $f->periode_2 }}</td>
                          <td>{{ $f->kode_rik }}</td>
                          <td>
                            @if (!$f->fpp1)
                              Unnasign
                            @else
                              {{ $f->fpp1 }}
                            @endif
                          </td>
                          <td>
                            @if (!$f->fpp2)
                              Unnasign
                            @else
                              {{ $f->fpp2 }}
                            @endif
                          </td>
                          <td>
                            @if (!$f->fpp3)
                              Unnasign
                            @else
                              {{ $f->fpp3 }}
                            @endif
                          </td>
                          <td>
                            @if (!$f->fpp4)
                              Unnasign
                            @else
                              {{ $f->fpp4 }}
                            @endif
                          </td>
                          <td><a href="{{ route('lhp.arsiplhp', $f->np2) }}" class="btn btn-xs">Lihat Arsip</a></td>
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
      <div x-show="activeTab === 3" x-transition>
        <div class="w-full">
          <div class="card w-full bg-gray-100 text-primary-content">
            <div class="card-body">
              <h2 class="card-title font-bold">Daftar Hasil Pemeriksaan (Single Tax) </h2>
              <div class="card-body bg-white rounded-lg">
                <div class="overflow-x-auto">
                  <table class="table table-zebra" id="tabel2" style="width: 100%">
                    <!-- head -->
                    <thead>
                      <tr>
                        <th>NOMOR LHP</th>
                        <th>PERIODE</th>
                        <th>KODE PEMERIKSAAN</th>
                        <th>SUPERVISOR</th>
                        <th>KETUA TIM</th>
                        <th>ANGGOTA 1</th>
                        <th>ANGGOTA 2</th>
                        <th>AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($lhp2 as $f)
                        <tr style="font-size :12px">
                          <td>{{ $f->lhp }}</td>
                          <td>{{ $f->periode_1 }}-{{ $f->periode_2 }}</td>
                          <td>{{ $f->kode_rik }}</td>
                          <td>
                            @if (!$f->fpp1)
                              Unnasign
                            @else
                              {{ $f->fpp1 }}
                            @endif
                          </td>
                          <td>
                            @if (!$f->fpp2)
                              Unnasign
                            @else
                              {{ $f->fpp2 }}
                            @endif
                          </td>
                          <td>
                            @if (!$f->fpp3)
                              Unnasign
                            @else
                              {{ $f->fpp3 }}
                            @endif
                          </td>
                          <td>
                            @if (!$f->fpp4)
                              Unnasign
                            @else
                              {{ $f->fpp4 }}
                            @endif
                          </td>
                          <td><a href="{{ route('lhp.arsiplhp', $f->np2) }}" class="btn btn-xs">Lihat Arsip</a></td>
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
      <div x-show="activeTab === 4" x-transition>
        <div class="w-full">
          <div class="card w-full bg-gray-50 text-primary-content">
            <div class="card-body">
              <h2 class="card-title font-bold">Daftar Tunggakan Pemeriksaan</h2>
              <div class="card-body bg-white rounded-lg overflow-x-auto">
                <table cellspacing="0" class="table table-striped table-hover" id="tabel5" width="100%">
                  <thead>
                    <tr style="font-size : 12px">
                      <th>SISA HARI</th>
                      <th>NPWP</th>
                      <th>NAMA WP</th>
                      <th>KODE PEMERIKSAAN</th>
                      <th>PERIODE PEMERIKSAAN</th>
                      <th>Nomor SP2</th>
                      <th>JT</th>
                      <th>Supervisor</th>
                      <th>PIC</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tunggakan as $l)
                      <tr style="font-size : 12px">
                        <td>
                          @if (is_null($l->sisa_waktu))
                            No Data
                          @else
                            {{ $l->sisa_waktu }}
                          @endif
                        </td>
                        <td>{{ $l->npwp }}</td>
                        <td>{{ $l->nama_wp }}</td>
                        <td>{{ $l->kode_rik }}</td>
                        <td>{{ $l->periode_1 }} - {{ $l->periode_2 }}</td>
                        <td>{{ $l->sp2 }}</td>
                        <td>
                          @if (!$l->jt)
                            No Data
                          @else
                            {{ date('d-m-Y', strtotime($l->jt)) }}
                          @endif
                        </td>

                        <td>
                          @if (!$l->fpp1)
                            No Data
                          @else
                            {{ $l->fpp1 }}
                          @endif
                        </td>
                        <td>
                          @if (!$l->pic)
                            No Data
                          @else
                            {{ $l->pic }}
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
      $('#tabel5').DataTable({
        order: false,
        scrollX: false,
        // fixedHeader: true,
        dom: 'Blfrtip',
        buttons: [
          'copy',
          'csvHtml5',
        ]
      });
    });
  </script>
@endsection
