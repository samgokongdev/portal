@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Monitoring Tunggakan</a></li>
      <li>Assign JT, FPP dan Progress Pemeriksaan</li>
    </ul>
  </div>

  @if (session()->has('inputError'))
    <div class="alert alert-error shadow-lg">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('inputError') }}</span>
      </div>
    </div>
  @endif

  <div class="w-full p-4 bg-gray-100 shadow rounded-lg">
    <div>Detail Pemeriksaan NP2 : </div>
    <div class="flex space-x-5">
      <div class="w-4/6 space-y-2">
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
            <div class="form-control w-1/4">
              <label class="label">
                <span class="label-text">Tanggal SP2</span>
              </label>
              <select name="tgl_sp2" class="select select-sm w-full max-w-xs">
                <option
                  value="@if (!$data->tgl_sp2) @else
                                    {{ date('d', strtotime($data->tgl_sp2)) }} @endif">
                  @if (!$data->tgl_sp2)
                  @else
                    {{ date('d', strtotime($data->tgl_sp2)) }}
                  @endif
                </option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
            </div>
            <div class="form-control w-1/4">
              <label class="label">
                <span class="label-text">Bulan SP2</span>
              </label>
              <select name="bln_sp2" class="select select-sm w-full max-w-xs">
                <option
                  value="@if (!$data->tgl_sp2) @else
                                  {{ date('m', strtotime($data->tgl_sp2)) }} @endif">
                  @if (!$data->tgl_sp2)
                  @else
                    {{ date('m', strtotime($data->tgl_sp2)) }}
                  @endif
                </option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
            </div>
            <div class="form-control w-1/4">
              <label class="label">
                <span class="label-text">Tahun SP2</span>
              </label>
              <select name="thn_sp2" class="select select-sm w-full max-w-xs">
                <option
                  value="@if (!$data->tgl_sp2) @else
                                {{ date('Y', strtotime($data->tgl_sp2)) }} @endif">
                  @if (!$data->tgl_sp2)
                  @else
                    {{ date('Y', strtotime($data->tgl_sp2)) }}
                  @endif
                </option>
                <option value="{{ now()->year }}">{{ now()->year }}</option>
                <option value="{{ now()->year - 1 }}">{{ now()->year - 1 }}</option>
                <option value="{{ now()->year - 2 }}">{{ now()->year - 2 }}</option>
                <option value="{{ now()->year - 3 }}">{{ now()->year - 3 }}</option>
                <option value="{{ now()->year - 4 }}">{{ now()->year - 4 }}</option>
                <option value="{{ now()->year - 5 }}">{{ now()->year - 5 }}</option>
              </select>
            </div>
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Nilai LB</span>
            </label>
            <input type="number" class="input input-bordered input-sm" name="nilai_lb" value="{{ $data->nilai_lb }}" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Omset</span>
            </label>
            <input type="number" class="input input-bordered input-sm" name="omset" value="{{ $data->omset }}" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Potensi</span>
            </label>
            <input type="number" class="input input-bordered input-sm" name="potensi" value="{{ $data->potensi }}" />
          </div>
          <div class="flex space-x-4">
            <div class="form-control w-1/4">
              <label class="label">
                <span class="label-text">Tanggal JT</span>
              </label>
              <select name="tgl_jt" class="select select-sm w-full max-w-xs">
                <option
                  value="@if (!$data->jt) @else
                                      {{ date('d', strtotime($data->jt)) }} @endif">
                  @if (!$data->jt)
                  @else
                    {{ date('d', strtotime($data->jt)) }}
                  @endif
                </option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
              {{-- <input required maxlength="2" minlength="2" placeholder="contoh : 03" type="text"
                                class="input input-bordered input-sm" name="tgl_jt"
                                value="@if (!$data->jt) @else {{ date('d', strtotime($data->jt)) }} @endif" /> --}}
            </div>
            <div class="form-control w-1/4">
              <label class="label">
                <span class="label-text">Bulan JT</span>
              </label>
              <select name="bln_jt" class="select select-sm w-full max-w-xs">
                <option
                  value="@if (!$data->jt) @else
                                    {{ date('m', strtotime($data->jt)) }} @endif">
                  @if (!$data->jt)
                  @else
                    {{ date('m', strtotime($data->jt)) }}
                  @endif
                </option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
            </div>
            <div class="form-control w-1/4">
              <label class="label">
                <span class="label-text">Tahun JT</span>
              </label>
              <select name="thn_jt" class="select select-sm w-full max-w-xs">
                <option
                  value="@if (!$data->jt) @else
                                  {{ date('Y', strtotime($data->jt)) }} @endif">
                  @if (!$data->jt)
                  @else
                    {{ date('Y', strtotime($data->jt)) }}
                  @endif
                </option>
                <option value="{{ now()->year }}">{{ now()->year }}</option>
                <option value="{{ now()->year - 1 }}">{{ now()->year - 1 }}</option>
                <option value="{{ now()->year - 2 }}">{{ now()->year - 2 }}</option>
                <option value="{{ now()->year - 3 }}">{{ now()->year - 3 }}</option>
                <option value="{{ now()->year - 4 }}">{{ now()->year - 4 }}</option>
                <option value="{{ now()->year - 5 }}">{{ now()->year - 5 }}</option>
              </select>
            </div>
          </div>

          <div class="form-control">
            <label class="label">
              <span class="label-text">Nomor ND Penunjukan</span>
            </label>
            <input name="nd_penunjukan" required type="text" class="input input-bordered input-sm"
              value="{{ $data->nd_penunjukan }}" />
          </div>
          <div class="flex space-x-4">
            <div class="form-control w-1/4">
              <label class="label">
                <span class="label-text">Tanggal ND</span>
              </label>
              <select name="tgl_nd" class="select select-sm w-full max-w-xs">
                <option
                  value="@if (!$data->tgl_nd_penunjukan) @else
                                    {{ date('d', strtotime($data->tgl_nd_penunjukan)) }} @endif">
                  @if (!$data->tgl_nd_penunjukan)
                  @else
                    {{ date('d', strtotime($data->tgl_nd_penunjukan)) }}
                  @endif
                </option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
            </div>
            <div class="form-control w-1/4">
              <label class="label">
                <span class="label-text">Bulan ND</span>
              </label>
              <select name="bln_nd" class="select select-sm w-full max-w-xs">
                <option
                  value="@if (!$data->tgl_nd_penunjukan) @else
                                  {{ date('m', strtotime($data->tgl_nd_penunjukan)) }} @endif">
                  @if (!$data->tgl_nd_penunjukan)
                  @else
                    {{ date('m', strtotime($data->tgl_nd_penunjukan)) }}
                  @endif
                </option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
            </div>
            <div class="form-control w-1/4">
              <label class="label">
                <span class="label-text">Tahun ND</span>
              </label>
              <select name="thn_nd" class="select select-sm w-full max-w-xs">
                <option
                  value="@if (!$data->tgl_nd_penunjukan) @else
                                {{ date('Y', strtotime($data->tgl_nd_penunjukan)) }} @endif">
                  @if (!$data->tgl_nd_penunjukan)
                  @else
                    {{ date('Y', strtotime($data->tgl_nd_penunjukan)) }}
                  @endif
                </option>
                <option value="{{ now()->year }}">{{ now()->year }}</option>
                <option value="{{ now()->year - 1 }}">{{ now()->year - 1 }}</option>
                <option value="{{ now()->year - 2 }}">{{ now()->year - 2 }}</option>
                <option value="{{ now()->year - 3 }}">{{ now()->year - 3 }}</option>
                <option value="{{ now()->year - 4 }}">{{ now()->year - 4 }}</option>
                <option value="{{ now()->year - 5 }}">{{ now()->year - 5 }}</option>
              </select>
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
            {{-- <a href="{{ route('tunggakan.index') }}" class="btn btn-block btn-secondary">SUBMIT</button> --}}
          </div>

        </form>
        <a href="{{ route('tunggakan.index') }}"
          class="btn btn-block bg-gray-100 hover:text-gray-100 text-gray-800">KEMBALI</a>
      </div>
      <div class="w-2/6 space-y-2 bg-white rounded-xl p-5">
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
              TGL SP2 tidak terdapat dalam tarikan data. Silahkan Input Manual Sesuai Form Yang Disediakan
            </li>
            <li>
              NAMA, NPWP WP, Kode, Periode, Bulan, dan Hari Berasal dari tarikan data ruang terbit
            </li>
            <li>
              Tanggal, Bulan, dan Tahun JT menggunakan format d-m-Y. Contoh 11-07-2000
            </li>
            <li>
              Nilai LB diisi dengan nilai negatif lebih bayar dalam SPT Restitusi. Dapat dikosongkan jika pemeriksaan
              bukan
              merupakan pemeriksaan rutin lebih bayar tahunan badan. Contoh : -100000000
            </li>
            <li>
              Omset dan potensi diisi dengan nilai omset dari WP yang bersangkutan
            </li>
            <li>
              Nomor ND dan Tanggal ND diisi sesuai ND Penunjukan Supervisor
            </li>
            <li>
              SPV, Ketua Tim, dan Anggota diisi dengan nama lengkap. Kesalahan Penulisan nama akan berpengaruh pada
              rekapitulasi tunggakan per kelompok.
            </li>
            <li>
              PIC diisi dengan nama FPP yang menjadi PIC Utama. PIC akan tampil di halaman rekapitulasi tunggakan dan
              realisasi hasil pemeriksaan(LHP, Konversi, SKP).
            </li>
            <li>
              Progress diisi progress sebenarnya dari tahapan pemeriksaan.
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
