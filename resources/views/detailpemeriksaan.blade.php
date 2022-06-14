@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Monitoring Tunggakan</a></li>
      <li>Assign JT, FPP dan Progress Pemeriksaan</li>
    </ul>
  </div>

  <div class="w-full p-4 bg-gray-100 shadow rounded-lg">
    <div>Detail Pemeriksaan NP2 : </div>
    <div class="flex space-x-5">
      <div class="w-1/2 space-y-2">
        <form method="post" action="{{ route('tunggakan.store') }}">
          @csrf
          <div class="form-control">
            <label class="label">
              <span class="label-text">NP2</span>
            </label>
            <input type="text" class="input input-bordered input-sm bg-gray-100" name="np2" readonly
              value="{{ $data->np2 }}" />
          </div>
          <div class="flex space-x-4">
            <div class="form-control w-1/2">
              <label class="label">
                <span class="label-text">NPWP</span>
              </label>
              <input type="text" class="input input-bordered input-sm bg-gray-100" readonly value="{{ $data->npwp }}" />
            </div>
            <div class="form-control w-1/2">
              <label class="label">
                <span class="label-text">NAMA WP</span>
              </label>
              <input type="text" class="input input-bordered input-sm bg-gray-100" readonly
                value="{{ $data->nama_wp }}" />
            </div>
          </div>
          <div class="flex space-x-2">
            <div class="form-control w-1/2">
              <label class="label">
                <span class="label-text">KODE PEMERIKSAAN</span>
              </label>
              <input type="text" class="input input-bordered input-sm bg-gray-100" readonly
                value="{{ $data->kode_rik }}" />
            </div>
            <div class="form-control w-1/4">
              <label class="label">
                <span class="label-text">Periode 1</span>
              </label>
              <input type="text" class="input input-bordered input-sm bg-gray-100" readonly
                value="{{ $data->periode_1 }}" />
            </div>
            <div class="form-control w-1/4">
              <label class="label">
                <span class="label-text">Periode 2</span>
              </label>
              <input type="text" class="input input-bordered input-sm bg-gray-100" readonly
                value="{{ $data->periode_2 }}" />
            </div>
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Nomor SP2</span>
            </label>
            <input type="text" class="input input-bordered input-sm bg-gray-100" readonly value="{{ $data->sp2 }}" />
          </div>
          <div class="flex space-x-4">
            <div class="form-control w-1/3">
              <label class="label">
                <span class="label-text">Tanggal JT</span>
              </label>
              <input placeholder="contoh : 03" type="text" class="input input-bordered input-sm" name="tgl_jt"
                value="@if (!$data->jt) @else {{ date('d', strtotime($data->jt)) }} @endif" />
            </div>
            <div class="form-control w-1/3">
              <label class="label">
                <span class="label-text">Bulan JT</span>
              </label>
              <input placeholder="contoh : 07" type="text" class="input input-bordered input-sm" name="bln_jt"
                value="@if (!$data->jt) @else {{ date('m', strtotime($data->jt)) }} @endif" />
            </div>
            <div class="form-control w-1/3">
              <label class="label">
                <span class="label-text">Tahun JT</span>
              </label>
              <input placeholder="contoh : 2022" type="text" class="input input-bordered input-sm" name="thn_jt"
                value="@if (!$data->jt) @else {{ date('Y', strtotime($data->jt)) }} @endif" />
            </div>
          </div>
          <div class="flex space-x-2">
            <div class="form-control w-1/2">
              <label class="label">
                <span class="label-text">Supervisor</span>
              </label>
              <input type="text" class="input input-bordered input-sm" name="fpp1" value="{{ $data->fpp1 }}" />
            </div>
            <div class="form-control w-1/2">
              <label class="label">
                <span class="label-text">Ketua Tim</span>
              </label>
              <input type="text" class="input input-bordered input-sm" name="fpp2" value="{{ $data->fpp2 }}" />
            </div>
          </div>

          <div class="flex space-x-2">
            <div class="form-control w-1/2">
              <label class="label">
                <span class="label-text">Anggota 1</span>
              </label>
              <input type="text" class="input input-bordered input-sm" name="fpp3" value="{{ $data->fpp3 }}" />
            </div>
            <div class="form-control w-1/2">
              <label class="label">
                <span class="label-text">Anggota 2</span>
              </label>
              <input type="text" class="input input-bordered input-sm" name="fpp4" value="{{ $data->fpp4 }}" />
            </div>
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">PIC</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="pic" value="{{ $data->pic }}" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Progress</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="progress" value="{{ $data->progress }}" />
          </div>
          <div class="form-control pt-4">
            <button type="submit" class="btn btn-block">SUBMIT</button>
          </div>
        </form>
      </div>
      <div class="w-1/2 space-y-2 bg-white rounded-xl p-5">
        <article class="prose lg:prose-sm">
          <h2>Petunjuk Pengisian</h2>
          <p>Berikut petunjuk pengisian detail pemeriksaan pada aplikasi portalp3 v.2</p>
          <ul>
            <li>
              NP2 Berasal dari tarikan data ruang terbit
            </li>
            <li>
              SP2 Berasal dari tarikan data ruang terbit
            </li>
            <li>
              NAMA, NPWP WP, Kode, Periode, Bulan, dan Hari Berasal dari tarikan data ruang terbit
            </li>
            <li>
              Tanggal, Bulan, dan Tahun JT menggunakan format d-m-Y. Contoh 11-07-2000
            </li>
            <li>
              Data pemeriksa sesuaikan dengan pemeriksa yang bertanggung jawab atas pemeriksaan tersebut
            </li>
            <li>
              Diisi dengan progress tertulis terkait pemeriksaan. Dapat dikosongkan
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
      var date_input = $('input[id="date"]'); //our date input has the name "date"
      var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
      var options = {
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
  </script>
@endsection
