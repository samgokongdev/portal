@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li>Hasil Pencarian SKP</li>
    </ul>
  </div>

  <div class="flex flex-col w-72  h-[60vh]">
    <div class="form-control">
      <label class="label">
        <span class="label-text">Nomor SKP</span>
      </label>
      <input type="text" class="input input-bordered input-xs bg-gray-100" readonly value="{{ $hasil->nomor_ket }}" />
    </div>

    <div class="form-control">
      <label class="label">
        <span class="label-text">Jenis SKP</span>
      </label>
      <input type="text" class="input input-bordered input-xs bg-gray-100" readonly
        value="{{ $hasil->jns_skp }} | {{ $hasil->pasal_skp }}" />
    </div>

    <div class="form-control">
      <label class="label">
        <span class="label-text">Tanggal SKP</span>
      </label>
      <input type="text" class="input input-bordered input-xs bg-gray-100" readonly
        value="{{ date('d-m-Y', strtotime($hasil->tahun_ket)) }}" />
    </div>

    <div class="form-control">
      <label class="label">
        <span class="label-text">Jumlah Ket</span>
      </label>
      <input type="text" class="input input-bordered input-xs bg-gray-100" readonly value="{{ $hasil->jumlah_ket }}" />
    </div>

    <div class="form-control">
      <label class="label">
        <span class="label-text">Jumlah Ket (IDR)</span>
      </label>
      <input type="text" class="input input-bordered input-xs bg-gray-100" readonly
        value="{{ $hasil->jumlah_ket_idr }}" />
    </div>

    <div class="form-control">
      <label class="label">
        <span class="label-text">Dokumen Sumber</span>
      </label>
      <input type="text" class="input input-bordered input-xs bg-gray-100" readonly value="{{ $hasil->no_dok }}" />
    </div>

    <div class="form-control">
      <label class="label">
        <span class="label-text">Supervisor</span>
      </label>
      <input type="text" class="input input-bordered input-xs bg-gray-100" readonly value="{{ $hasil->fpp1 }}" />
    </div>

    <div class="form-control">
      <label class="label">
        <span class="label-text">PIC</span>
      </label>
      <input type="text" class="input input-bordered input-xs bg-gray-100" readonly value="{{ $hasil->pic }}" />
    </div>
  </div>
@endsection
