<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Akun — Restu Ibu</title>

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md rounded-2xl border bg-white p-6 shadow-sm">

  <h1 class="text-xl font-bold mb-4">Daftar Akun</h1>

  {{-- ERROR --}}
  @if ($errors->any())
    <div class="mb-3 rounded border border-red-300 bg-red-50 text-red-700 p-2 text-sm">
      {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('register') }}">
    @csrf

    {{-- Nama --}}
    <div class="mb-3">
      <label class="text-sm font-medium">Nama Lengkap</label>
      <input name="name" type="text"
        value="{{ old('name') }}"
        class="mt-1 w-full border rounded px-3 py-2"
        required>
    </div>

    {{-- Email --}}
    <div class="mb-3">
      <label class="text-sm font-medium">Email</label>
      <input name="email" type="email"
        value="{{ old('email') }}"
        class="mt-1 w-full border rounded px-3 py-2"
        required>
    </div>

    {{-- Phone (opsional tambahan) --}}
    <div class="mb-3">
      <label class="text-sm font-medium">No. WhatsApp (opsional)</label>
      <input name="phone" type="text"
        value="{{ old('phone') }}"
        class="mt-1 w-full border rounded px-3 py-2">
    </div>

    {{-- Password --}}
    <div class="mb-3">
      <label class="text-sm font-medium">Password</label>
      <input name="password" type="password"
        class="mt-1 w-full border rounded px-3 py-2"
        required>
    </div>

    {{-- Konfirmasi Password --}}
    <div class="mb-3">
      <label class="text-sm font-medium">Ulangi Password</label>
      <input name="password_confirmation" type="password"
        class="mt-1 w-full border rounded px-3 py-2"
        required>
    </div>

    <button
      class="w-full px-4 py-2 bg-sky-600 text-white rounded font-semibold hover:bg-sky-700">
      Daftar
    </button>
  </form>

  <p class="mt-4 text-sm text-gray-600">
    Sudah punya akun?
    <a href="{{ route('login') }}" class="text-sky-700 hover:underline">
      Login di sini
    </a>
  </p>

</div>

</body>
</html>