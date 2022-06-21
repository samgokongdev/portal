@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Persuratan</a></li>
      <li>EDIT SURAT</li>
    </ul>
  </div>

  <div class="w-full p-4 bg-gray-100 shadow rounded-lg">
    <div class="font-bold">EDIT NASKAH DINAS : </div>
    <div class="flex space-x-5">
      <div class="w-4/6 space-y-2">
        <form method="post" action="{{ route('persuratan.update', $data->id) }}">
          @csrf
          @method('PUT')
          <div class="form-control">
            <label class="label">
              <span class="label-text">JENIS SURAT</span>
            </label>
            <input type="text" class="input input-bordered input-sm bg-gray-200" name="jenis"
              value="{{ $data->jenis }}" readonly required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">NOMOR NASKAH DINAS</span>
            </label>
            <input type="text" class="input input-bordered input-sm bg-gray-200" name="nomor"
              value="{{ $data->no }}" readonly required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">TUJUAN</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="tujuan" value="{{ $data->tujuan }}"
              required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">PERIHAL</span>
            </label>
            <textarea class="textarea rounded-xl textarea-bordered" name="perihal" required>{{ $data->perihal }}</textarea>
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">NOMOR SP2</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="sp2" value="{{ $data->sp2 }}" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">NOMOR SPHP</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="sphp" value="{{ $data->sphp }}" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">KONSEPTOR</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="konseptor" value="{{ $data->konseptor }}"
              required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">KELOMPOK</span>
            </label>
            <input type="text" class="input input-bordered input-sm" name="kelompok" value="{{ $data->kelompok }}"
              required />
          </div>

          <div class="form-control pt-4">
            <button type="submit" class="btn btn-block">UPDATE</button>
            {{-- <a href="{{ route('tunggakan.index') }}" class="btn btn-block btn-secondary">SUBMIT</button> --}}
          </div>

        </form>
        <a href="{{ route('persuratan.index') }}"
          class="btn btn-block bg-gray-100 hover:text-gray-100 text-gray-800">KEMBALI</a>
      </div>
      <div class="w-2/6 space-y-2 bg-white rounded-xl p-5">
        <article class="w-full prose lg:prose-sm">
          @if ($allow == 1)
            <h2>Atau ingin <span class="font-bold text-red-900">Hapus Surat ?</span> </h2>
            <p>silahkan tekan tombol berikut untuk menghapus surat</p>
            <form method="post" action="{{ route('persuratan.destroy', $data->id) }}">
              @csrf
              @method('DELETE')
              <input type="hidden" name="id" value="{{ $data->id }}">
              <button type="submit"
                class="btn btn-block btn-sm text-white bg-red-900 border-red-900 flex items-center justify-center">
                HAPUS
              </button>
            </form>
            <!-- ... -->
          @else
            <h4>Terdapat Sequence Nomor Setelah Ini <span class="font-bold text-red-900">Nomor Tidak Bisa Dihapus</span>
            </h4>
          @endif
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
