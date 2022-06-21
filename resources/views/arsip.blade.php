@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li><a>Hasil Pemeriksaan</a></li>
      <li>Arsip LHP</li>
    </ul>
  </div>

  <div class="flex space-x-2">
    <div class="w-1/2">
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text">NPWP</span>
        </label>
        <input type="text" readonly class="input input-sm bg-gray-300 input-bordered w-full" />
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text">NAMA WP</span>
        </label>
        <input type="text" readonly class="input input-sm bg-gray-300 input-bordered w-full" />
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text">NP2</span>
        </label>
        <input type="text" readonly class="input input-sm bg-gray-300 input-bordered w-full" />
      </div>
      <div class="form-control w-full">
        <label class="label">
          <span class="label-text">KODE PEMERIKSAAN</span>
        </label>
        <input type="text" readonly class="input input-sm bg-gray-300 input-bordered w-full" />
      </div>
    </div>
    <div class="w-1/2">

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
        buttons: [
          'copy',
          'csvHtml5',
        ]
      });
    });
  </script>
@endsection
