<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password — Restu Ibu</title>

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md rounded-2xl border bg-white p-6 shadow-sm">

  <h1 class="text-xl font-bold mb-4">Reset Password</h1>

  {{-- ERROR --}}
  @if ($errors->any())
    <div class="mb-3 rounded border border-rose-300 bg-rose-50 text-rose-700 p-2 text-sm">
      {{ $errors->first() }}
    </div>
  @endif

  {{-- SUCCESS --}}
  @if (session('status'))
    <div class="mb-3 rounded border border-green-200 bg-green-50 text-green-700 p-2 text-sm">
      {{ session('status') }}
    </div>
  @endif

  <form method="POST" action="{{ route('password.store') }}" class="space-y-3">
    @csrf

    {{-- TOKEN (WAJIB) --}}
    <input type="hidden" name="token" value="{{ request()->route('token') }}">

    {{-- EMAIL --}}
    <input type="hidden" name="email" value="{{ request('email') }}">

    {{-- PASSWORD --}}
    <div>
      <label class="text-sm font-medium">Password Baru</label>
      <input name="password" type="password"
        class="mt-1 w-full border rounded px-3 py-2"
        required>
    </div>

    {{-- KONFIRMASI --}}
    <div>
      <label class="text-sm font-medium">Ulangi Password</label>
      <input name="password_confirmation" type="password"
        class="mt-1 w-full border rounded px-3 py-2"
        required>
    </div>

    <button
      class="w-full px-4 py-2 bg-sky-600 text-white rounded font-semibold hover:bg-sky-700">
      Ubah Password
    </button>
  </form>

  <p class="mt-4 text-sm text-gray-600">
    Kembali ke
    <a href="{{ route('login') }}" class="text-sky-700 hover:underline">
      Login
    </a>
  </p>

</div>

</body>
</html>