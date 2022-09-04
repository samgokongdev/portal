@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Surat Masuk</a></li>
      <li>Input Surat Masuk</li>
    </ul>
  </div>

  <div class="w-full p-4 bg-gray-100 shadow rounded-lg">
    <div class="font-bold">Tambah Surat Masuk Baru : </div>
    <div class="flex space-x-5">
      <div class="w-4/6 space-y-2">
        <form method="post" action="{{ route('suratmasuk.store') }}">
          @csrf
          <div class="form-control">
            <label class="label">
              <span class="label-text">Nomor Surat</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="nomor" required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Asal Surat</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="asal" required />
          </div>
          <div class="form-control w-full">
            <label class="label">
              <span class="label-text">Tanggal ND</span>
            </label>
            <input readonly id="datepicker" type="text" placeholder="Type here"
              class="input input-bordered w-full bg-gray-200" value="" name="tanggal" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">PERIHAL</span>
            </label>
            <textarea class="textarea rounded-xl textarea-bordered" name="perihal" required></textarea>
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
          <p>Berikut petunjuk pengisian surat masuk baru</p>
          <ul>
            <li>
              Nomor Surat diisi nomor lengkap dari surat
            </li>
            <li>
              Asal Surat diisi dengan pengirim surat
            </li>
            <li>
              Tanggal Surat dipilih menggunakan datepicker yang telah disediakan
            </li>
            <li>
              Perihal diisi perihal dari surat yang diterima
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
    $(function() {
      $("#datepicker").datepicker();
      $("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd");
    });
  </script>

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
