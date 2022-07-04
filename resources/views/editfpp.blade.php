@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Daftar FPP</a></li>
      <li>Edit FPP</li>
    </ul>
  </div>

  <div class="w-full p-4 bg-gray-100 shadow rounded-lg">
    <div class="font-bold">EDIT DAFTAR FPP PORTALP3 : </div>
    <div class="flex space-x-5">
      <div class="w-4/6 space-y-2">
        <form method="post" action="{{ route('daftarfpp.update', $id) }}">
          @csrf
          @method('PUT')
          <div class="form-control">
            <label class="label">
              <span class="label-text">NIP</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="nip" value="{{ $fpp->nip }}" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">NAMA FPP</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="nama_fpp" value="{{ $fpp->nama_fpp }}" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">POSISI</span>
            </label>
            <select name="posisi" class="select select-bordered select-sm w-full">
              <option value="{{ $fpp->posisi }}">
                @if ($fpp->posisi == 0)
                  Supervisor
                @elseif ($fpp->posisi == 1)
                  Ketua Tim
                @else
                  Anggota
                @endif
              </option>
              <option value="0">Supervisor</option>
              <option value="1">Ketua Tim</option>
              <option value="2">Anggota</option>
            </select>
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">KELOMPOK</span>
            </label>
            <input type="number" class="input input-bordered input-sm" name="kelompok" value="{{ $fpp->kelompok }}" />
          </div>

          <div class="form-control">
            <label class="label">
              <span class="label-text">KODE FPP</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="kode_fpp" value="{{ $fpp->kode_fpp }}" />
          </div>

          <div class="form-control pt-4">
            <button type="submit" class="btn btn-block">EDIT</button>
            {{-- <a href="{{ route('tunggakan.index') }}" class="btn btn-block btn-secondary">SUBMIT</button> --}}
          </div>

        </form>
        <a href="{{ route('daftarfpp.index') }}"
          class="btn btn-block bg-gray-100 hover:text-gray-100 text-gray-800">KEMBALI</a>
      </div>
      <div class="w-2/6 space-y-2 bg-white rounded-xl p-5">
        <article class="w-full prose lg:prose-sm">
          <h2>Petunjuk Pengisian</h2>
          <p>Berikut petunjuk pengisian Daftar Fungsional Pemeriksa Pajak</p>
          <ul>
            <li>
              NIP FUNGSIONAL diisi dengan NIP Panjang FPP Tanpa Spasi. Contoh : 199001012020012001
            </li>
            <li>
              NAMA FPP diisi dengan Nama FPP. Pastikan pengisian benar karena akan berpengaruh pada rekapitulasi tunggakan
              dan realisasi.
            </li>
            <li>
              POSISI dipilih sesuai dropdown yang tersedia
            </li>
            <li>
              Kelompok diisi dengan nomor kelompok sesuai keputusan. Contoh : 3
            </li>
            <li>
              Kode Kelompok diisi sesuai ketentuan sebagai berikut :
              <ul>
                <li>
                  Untuk SUPERVISOR : KODE_KELOMPOK.0.0 CONTOH : 5.0.0
                </li>
                <li>
                  Untuk KETUA TIM : KODE_KELOMPOK.KODE_TIM.0 CONTOH : 5.1.0
                </li>
                <li>
                  Untuk ANGGOTA : KODE_KELOMPOK.KODE_TIM.KODE_ANGGOTA CONTOH : 5.1.2
                </li>
              </ul>
            </li>
          </ul>
          <!-- ... -->
        </article>
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
