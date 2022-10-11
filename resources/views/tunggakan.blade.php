@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Monitoring Tunggakan</a></li>
      <li>Daftar Tunggakan</li>
    </ul>
  </div>

  <div class="grid grid-cols-3 gap-4 mb-5">
    <div class="stats bg-primary text-primary-content shadow">
      <div class="stat">
        <div class="stat-title font-bold">Jumlah Tunggakan</div>
        <div class="stat-value">{{ $rekap_tunggakan }} SP2</div>
        <div class="stat-desc font-semibold">Jumlah Tunggakan Pemeriksaan</div>
        <a class="btn btn-sm btn-success" href="{{ route('tunggakan.index') }}">Lihat Detail</a>
      </div>
    </div>

    <div class="stats shadow">
      <div class="stat">
        <div class="stat-title">NP2 Belum SP2</div>
        <div class="stat-value">{{ $np2_belum_sp2 }} NP2</div>
        <div class="stat-desc">Jumlah NP2 Belum ada SP2</div>
        <a class="btn btn-sm btn-success" href="{{ route('tunggakan.np2belumterbit') }}">Lihat Detail</a>
      </div>
    </div>

    <div class="stats bg-red-900 text-white  shadow">
      <div class="stat">
        <div class="stat-title">Tunggakan JT =< 14 Hari</div>
            <div class="stat-value">{{ $pemeriksaan_jt_dekat }} SP2</div>
            <div class="stat-desc">Jumlah SP2 dengan JT Kurang atau sama dengan 14 Hari Lagi</div>
            <a class="btn btn-sm btn-success" href="{{ route('tunggakan.jt') }}">Lihat Detail</a>
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

    @if ($whatsapp)
      <?php $number = 1; ?>
      <div tabindex="0" class="collapse border border-base-300 bg-base-100 rounded-box">
        <div class="collapse-title text-sm font-medium -mb-3">
          Broadcast Message (Klik di area lain untuk menyembunyikan):
        </div>
        <div class="collapse-content">
          <div class="mockup-code">
            <pre data-prefix="$">*Daftar Pemeriksaan JT =< 14* Hari</pre>
            <pre data-prefix="$"></pre>
            @foreach ($whatsapp as $w)
              <pre data-prefix="$"><code>*{{ $number }}. {{ $w->nama_wp }}* ({{ $w->periode_1 }} - {{ $w->periode_2 }}) => *JT {{ date('d M Y', strtotime($w->jt_daluarsa)) }}* ( {{ $w->sisa_hari }} Hari Lagi)</code></pre>
              <?php $number++; ?>
            @endforeach
          </div>
        </div>
      </div>
    @endif

    <div class="w-full mt-2 pt-3">
      <div class="card w-full bg-gray-50 text-primary-content">
        <div class="card-body">
          <h2 class="card-title font-bold">Daftar Tunggakan Pemeriksaan</h2>
          <div class="card-body bg-white rounded-lg">
            <div class="">
              <table class="display nowrap" id="tabel1" style="width: 100%">
                <thead>
                  <tr style="font-size : 12px">
                    <th>SISA HARI</th>
                    <th>NP2</th>
                    <th>NPWP</th>
                    <th>NAMA WP</th>
                    <th>KODE PEMERIKSAAN</th>
                    <th>PERIODE PEMERIKSAAN</th>
                    <th>Nomor SP2</th>
                    <th>JT</th>
                    <th>Supervisor</th>
                    <th>Ketua Tim</th>
                    <th>Anggota 1</th>
                    <th>Anggota 2</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($list_tunggakan as $l)
                    <tr style="font-size : 12px">
                      <td>
                        @if (is_null($l->sisa_hari))
                          No Data
                        @else
                          {{ $l->sisa_hari }}
                        @endif
                      </td>
                      <th>{{ $l->np2 }}</th>
                      <td>{{ $l->npwp }}</td>
                      <td>{{ $l->nama_wp }}</td>
                      <td>{{ $l->kode_rik }}</td>
                      <td>{{ $l->periode_1 }} - {{ $l->periode_2 }}</td>
                      <td>{{ $l->sp2 }}</td>
                      <td>
                        @if ($l->jt_daluarsa == '0000-00-00')
                          No Data
                        @else
                          {{ date('d-m-Y', strtotime($l->jt_daluarsa)) }}
                        @endif
                      </td>

                      <td>
                        @if (!$l->spv)
                          No Data
                        @else
                          {{ $l->spv }}
                        @endif
                      </td>
                      <td>
                        @if (!$l->kt)
                          No Data
                        @else
                          {{ $l->kt }}
                        @endif
                      </td>
                      <td>
                        @if (!$l->ang_1)
                          No Data
                        @else
                          {{ $l->ang_1 }}
                        @endif
                      </td>
                      <td>
                        @if (!$l->ang_2)
                        @else
                          {{ $l->ang_2 }}
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
          order: false,
          scrollX: true,
          dom: 'Blfrtip',
          buttons: [{
              extend: 'pdfHtml5',
              orientation: 'landscape',
              pageSize: 'LEGAL'
            },
            'copyHtml5',
            'excelHtml5',
            'csvHtml5'
          ]
        });
      });
    </script>
  @endsection
