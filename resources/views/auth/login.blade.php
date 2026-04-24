<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

<div class="max-w-md mx-auto mt-12 border rounded-xl p-6 bg-white">

  <h2 class="text-xl font-bold mb-4">Login</h2>

  {{-- ERROR --}}
  @if ($errors->any())
    <div class="text-red-600 bg-red-100 p-2 rounded mb-3">
      {{ $errors->first() }}
    </div>
  @endif

  {{-- FORM --}}
  <form method="POST" action="{{ route('login') }}">
    @csrf

    <label class="block mt-3 font-semibold text-sm">Email</label>
    <input type="email" name="email" required
      class="w-full border rounded p-2 mt-1"
      value="{{ old('email') }}">

    <label class="block mt-3 font-semibold text-sm">Password</label>
    <input type="password" name="password" required
      class="w-full border rounded p-2 mt-1">

    <button type="submit"
      class="w-full mt-4 bg-sky-700 text-white py-2 rounded font-bold">
      Masuk
    </button>
  </form>

  <p class="text-sm mt-4 text-gray-500 text-center">
    Lupa password?
    <a href="{{ route('password.request') }}" class="text-sky-700 hover:underline">
        Atur ulang
    </a>
    </p>

    <p class="text-sm mt-2 text-gray-600 text-center">
    Belum punya akun?
    <a href="{{ route('register') }}" class="text-sky-700 font-semibold hover:underline">
        Daftar di sini
    </a>
    </p>


</div>

</body>
</html>