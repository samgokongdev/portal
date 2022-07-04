@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li>Hasil Pemeriksaan</li>
    </ul>
  </div>
  <div class="flex flex-col items-center justify-center h-[75vh]">
    <div class="text-2xl text-gray-900 font-bold">UPS !!! Anda Belum Memiliki Akses Terhadap Laporan Ini</div>
    <div class="text-xl text-gray-900 font-bold">Silahkan Ajukan Permohonan Akses atau Menunggu Persetujuan dari Kasi P3
    </div>
    <form method="post" action="{{ route('lhp.ajukan') }}">
      @csrf
      <input type="hidden" value="{{ $id }}" name="np2" />
      <input type="hidden" value="{{ Auth::user()->username }}" name="pemohon" />
      <button type="submit" class="btn mt-4">AJUKAN PERMOHONAN</button>
    </form>
    <a href="{{ route('lhp.permohonan') }}"
      class="btn mt-4 bg-gray-100 text-primary-content hover:text-white hover:bg-gray-900">DAFTAR
      PERMOHONAN</a>
  </div>
@endsection
