@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Monitoring Tunggakan</a></li>
      <li>Daftar Tunggakan</li>
    </ul>
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
        <h2 class="card-title font-bold">Daftar Permohonan Akses Hasil Pemeriksaan</h2>
        <div class="card-body bg-white rounded-lg">
          <div class="overflow-x-auto">
            <table class="table table-zebra w-full" id="tabel1" style="width: 100%">
              <!-- head -->
              <thead>
                <tr>
                  <th>STATUS</th>
                  <th>LIHAT</th>
                  <th>NP2</th>
                  <th>NPWP</th>
                  <th>NAMA WP</th>
                  <th>PERIODE</th>
                  <th>KODE PEMERIKSAAN</th>
                  <th>NOMOR LHP</th>
                  <th>TANGGAL LHP</th>
                  @if (Auth::user()->roles == 7)
                    <th>Persetujuan</th>
                  @else
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach ($data_permohonan as $i)
                  <tr>
                    <td>
                      @if ($i->is_approve == 0)
                        <div class="badge badge-warning gap-2">
                          Menunggu Persetujuan
                        </div>
                      @else
                        <div class="badge badge-success gap-2">
                          Disetujui
                        </div>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('lhp.arsiplhp', $i->np2) }}"
                        class="btn btn-sm flex items-center justify-center tooltip tooltip-left" data-tip="ARSIP">
                        LIHAT
                      </a>
                    </td>
                    <td>{{ $i->np2 }}</td>
                    <td>{{ $i->npwp }}</td>
                    <td>{{ $i->nama_wp }}</td>
                    <td>{{ $i->periode_1 }}-{{ $i->periode_2 }}</td>
                    <td>{{ $i->kode_rik }}</td>
                    <td>{{ $i->lhp }}</td>
                    <td>{{ date('d-m-Y', strtotime($i->tgl_lhp)) }}</td>
                    @if (Auth::user()->roles == 7)
                      <td>
                        @if ($i->is_approve == 0)
                          <form method="post" action="{{ route('lhp.approve') }}">
                            @csrf
                            <input type="hidden" value="{{ $i->id }}" name="id" />
                            <input type="hidden" value="1" name="is_approve" />
                            <button type="submit"
                              class="btn btn-xs bg-green-900 text-white border-none hover:bg-green-700">SETUJUI</button>
                          </form>
                        @else
                          <form method="post" action="{{ route('lhp.approve') }}">
                            @csrf
                            <input type="hidden" value="{{ $i->id }}" name="id" />
                            <input type="hidden" value="0" name="is_approve" />
                            <button type="submit"
                              class="btn btn-xs bg-red-900 border-none text-white hover:bg-red-800">BATAL</button>
                          </form>
                        @endif

                      </td>
                    @else
                    @endif
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
