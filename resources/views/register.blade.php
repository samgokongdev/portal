<!DOCTYPE html>
<html lang="en" data-theme="business">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PORTALP3 PMA 4</title>
  <!-- <script src="./tailwind3.js"></script> -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="font-[Poppins]">
  <div class="h-screen flex flex-col items-center justify-center">
    <div class="text-white flex border-gray-700 flex-col items-center w-1/4">
      <img class="w-72 pb-5" src="{{ asset('/assets/png/Vector.png') }}" />
      <div class="space-y-1">
        @error('name')
          <div class="alert alert-error shadow-lg">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>{{ $message }}</span>
            </div>
          </div>
        @enderror
        @error('username')
          <div class="alert alert-error shadow-lg">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>{{ $message }}</span>
            </div>
          </div>
        @enderror
        @error('password')
          <div class="alert alert-error shadow-lg">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>{{ $message }}</span>
            </div>
          </div>
        @enderror
        @error('seksi')
          <div class="alert alert-error shadow-lg">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>{{ $message }}</span>
            </div>
          </div>
        @enderror
        @if (session()->has('success'))
          <div class="alert alert-success shadow-lg">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span>{{ session('success') }}</span>
            </div>
          </div>
        @endif
      </div>

      {{-- <div class="alert alert-error shadow-lg">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span>Error! Registrasi Tidak Berhasil</span>
        </div>
      </div>

      <div class="alert alert-success shadow-lg">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span>Berhasil! Silahkan Login</span>
        </div>
      </div> --}}

      <form action="{{ route('register.store') }}" method="post">
        @csrf
        <input type="hidden" name="roles" value="0" />
        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Nama User</span>
          </label>
          <input type="text" name="name" placeholder="ex : 060001234" class="input input-bordered w-full max-w-xs" />
        </div>

        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Username</span>
          </label>
          <input type="text" name="username" placeholder="ex : 060001234"
            class="input input-bordered w-full max-w-xs" />
        </div>

        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Tipe User</span>
          </label>
          <select name="seksi" class="select select-bordered">
            <option disabled selected>Pilih Satu</option>
            <option value="1">PPP</option>
            <option value="2">FPP</option>
            <option value="3">Lainnya</option>
          </select>
        </div>

        <div class="form-control w-full max-w-xs">
          <label class="label">
            <span class="label-text">Buat Password</span>
          </label>
          <input name="password" type="password" placeholder="ex : 060001234"
            class="input input-bordered w-full max-w-xs" />
        </div>

        <div class="form-control w-full max-w-xs mt-5 gap-2">
          <button type="submit" class="btn btn-block">Register</button>
          <a href="{{ route('login.index') }}" class="btn btn-ghost hover:bg-secondary">Sudah Terdaftar ? Silahkan
            Login</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
