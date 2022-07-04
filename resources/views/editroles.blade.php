@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Pengaturan User</a></li>
      <li>Edit Roles</li>
    </ul>
  </div>

  <div class="w-full p-4 bg-gray-100 shadow rounded-lg">
    <div class="font-bold">EDIT ROLES USER PORTALP3 : </div>
    <div class="flex space-x-5">
      <div class="w-4/6 space-y-2">
        <form method="post" action="{{ route('portaluser.update', $id) }}">
          @csrf
          @method('PUT')
          <div class="form-control">
            <label class="label">
              <span class="label-text">USERNAME (NIP)</span>
            </label>
            <input type="text" class="input input-bordered input-sm bg-gray-200" name="username"
              value="{{ $user->username }}" readonly required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">NAMA USER</span>
            </label>
            <input type="text" class="input input-bordered input-sm bg-gray-200" name="name"
              value="{{ $user->name }}" readonly required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">SEKSI</span>
            </label>
            <select class="select select-sm w-full" name="seksi">
              <option value="{{ $user->seksi }}">
                @if ($user->seksi == 1)
                  PPP
                @elseif ($user->seksi == 2)
                  FPP
                @else
                  LAINNYA
                @endif
              </option>
              <option value="1">PPP</option>
              <option value="2">FPP</option>
              <option value="3">LAINNYA</option>
            </select>
          </div>

          <div class="form-control">
            <label class="label">
              <span class="label-text">ROLES</span>
            </label>
            <select class="select select-sm w-full" name="roles">
              <option value="{{ $user->roles }}">
                @if ($user->roles == 9)
                  SUPERADMIN
                @elseif ($user->roles == 8)
                  KEPALA KANTOR
                @elseif ($user->roles == 7)
                  KEPALA SEKSI P3
                @elseif ($user->roles == 6)
                  PELAKSANA SEKSI P3
                @else
                  USER
                @endif
              </option>
              <option value="9">SUPERADMIN</option>
              <option value="8">KEPALA KANTOR</option>
              <option value="7">KEPALA SEKSI P3</option>
              <option value="6">PELAKSANA SEKSI P3</option>
              <option value="0">USER</option>
            </select>
          </div>

          <div class="form-control">
            <label class="label">
              <span class="label-text">STATUS</span>
            </label>
            <select class="select select-sm w-full" name="status">
              <option value="{{ $user->roles }}">
                @if ($user->status == 1)
                  AKTIF
                @else
                  NON AKTIF
                @endif
              </option>
              <option value="1">AKTIF</option>
              <option value="0">NON AKTIF</option>
            </select>
          </div>


          <div class="form-control pt-4">
            <button type="submit" class="btn btn-block">UPDATE</button>
            {{-- <a href="{{ route('tunggakan.index') }}" class="btn btn-block btn-secondary">SUBMIT</button> --}}
          </div>

        </form>
        <a href="{{ route('portaluser.index') }}"
          class="btn btn-block bg-gray-100 hover:text-gray-100 text-gray-800">KEMBALI</a>
      </div>
    </div>


  </div>
@endsection

@section('script')
  <script>
    $(document).ready(function() {
      $('#tabel1').DataTable({
        order: [
          [0, 'asc']
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
