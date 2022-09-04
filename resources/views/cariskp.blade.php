@extends('layout.layout')

@section('konten')
  <div class="text-sm breadcrumbs">
    <ul>
      <li>Home</li>
      <li>Cari SKP</li>
    </ul>
  </div>


  @if (session()->has('Error'))
    <div class="alert alert-error shadow">
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('Error') }}</span>
      </div>
    </div>
  @endif

  <div class="flex flex-col items-center justify-center h-[60vh]">
    <form action="{{ route('skp.cariskp') }}" method="post">
      @csrf
      <label class="label">
        <span class="label-text font-bold">Nomor SKP :</span>
      </label>
      <div class="form-control w-[500px]">
        <input name="noskp" type="text" placeholder="contoh : 000021232205722"
          class="input input-bordered w-full max-w-xs" />
      </div>

      <div class="form-control w-full max-w-xs mt-5 space-y-1">
        <button type="submit" class="btn btn-block">CARI SKP</button>
      </div>
    </form>
  </div>
@endsection
