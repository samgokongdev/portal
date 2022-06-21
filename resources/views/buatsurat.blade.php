@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Persuratan</a></li>
      <li>Buat Surat</li>
    </ul>
  </div>

  <div class="w-full p-4 bg-gray-100 shadow rounded-lg">
    <div class="font-bold">Ambil Nomor Naskah Dinas Baru : </div>
    <div class="flex space-x-5">
      <div class="w-4/6 space-y-2">
        <form method="post" action="{{ route('persuratan.store') }}">
          @csrf
          <div class="form-control">
            <label class="label">
              <span class="label-text">JENIS SURAT</span>
            </label>
            <input type="text" class="input input-bordered input-sm bg-gray-200" name="jenis"
              value="{{ $id }}" readonly required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">TUJUAN</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="tujuan" required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">PERIHAL</span>
            </label>
            <textarea class="textarea rounded-xl textarea-bordered" name="perihal" required></textarea>
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">NOMOR SP2</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="sp2" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">NOMOR SPHP</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="sphp" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">KONSEPTOR</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="konseptor" required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">KELOMPOK</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="kelompok" required />
          </div>

          <div class="form-control pt-4">
            <button type="submit" class="btn btn-block">SUBMIT</button>
            {{-- <a href="{{ route('tunggakan.index') }}" class="btn btn-block btn-secondary">SUBMIT</button> --}}
          </div>

        </form>
        <a href="{{ route('persuratan.index') }}"
          class="btn btn-block bg-gray-100 hover:text-gray-100 text-gray-800">KEMBALI</a>
      </div>
      <div class="w-2/6 space-y-2 bg-white rounded-xl p-5">
        <article class="w-full prose lg:prose-sm">
          <h2>Petunjuk Pengisian</h2>
          <p>Berikut petunjuk pengisian Daftar Fungsional Pemeriksa Pajak</p>
          <ul>
            <li>
              Jenis Surat terisi otomatis
            </li>
            <li>
              Tujuan Surat Diisi dengan nama WP atau tujuan surat yang lain
            </li>
            <li>
              Perihal diisi dengan perihal surat yang akan dikirim
            </li>
            <li>
              Nomor SP2 dan SPHP <span class="font-bold">tidak wajib</span>
            </li>
            <li>
              Konseptor Diisi sesuai nama FPP
            </li>
            <li>
              Kelompok diisi dengan kelompok FPP dalam format angka. Contoh : <span class="font-bold"> 3 </span>
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
