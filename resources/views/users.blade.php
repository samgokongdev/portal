@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Pengaturan User</a></li>
      <li>Daftar User</li>
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
        <h2 class="card-title font-bold">DAFTAR USER PORTALP3 PMA 4</h2>
        <div class="card-body bg-white rounded-lg">
          <div class="overflow-x-auto">
            <table class="table table-zebra w-full" id="tabel1" style="width: 100%">
              <!-- head -->
              <thead>
                <tr>
                  <th>NIP</th>
                  <th>NAMA</th>
                  <th>SEKSI</th>
                  <th>ROLES</th>
                  <th>STATUS</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $i)
                  <tr>
                    <td>{{ $i->username }}</td>
                    <td>{{ $i->name }}</td>
                    <td>
                      @if ($i->seksi == 1)
                        PPP
                      @elseif ($i->seksi == 2)
                        FPP
                      @else
                        LAINNYA
                      @endif
                    </td>
                    <td>
                      @if ($i->roles < 5)
                        USER
                      @elseif ($i->roles == 7)
                        KEPALA SEKSI P3
                      @elseif ($i->roles == 6)
                        PELAKSANA P3
                      @elseif ($i->roles == 8)
                        KEPALA KANTOR
                      @elseif ($i->roles == 9)
                        SUPERADMIN
                      @endif
                    </td>
                    <td>
                      @if ($i->status == 1)
                        <div class="badge badge-primary">AKTIF</div>
                      @else
                        <div class="badge badge-accent">TIDAK AKTIF</div>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('portaluser.show', $i->id) }}" class="btn btn-sm">GANTI ROLE</a>
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
