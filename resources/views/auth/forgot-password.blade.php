<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lupa Password — Restu Ibu</title>

  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md rounded-2xl border bg-white p-6 shadow-sm">

  <h1 class="text-xl font-bold mb-4">Lupa Password</h1>

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

  <form method="POST" action="{{ route('password.email') }}" class="space-y-3">
    @csrf

    <div>
      <label class="text-sm font-medium">Email Terdaftar</label>
      <input name="email" type="email"
        value="{{ old('email') }}"
        class="mt-1 w-full border rounded px-3 py-2"
        required>
    </div>

    <button
      class="w-full px-4 py-2 bg-sky-600 text-white rounded font-semibold hover:bg-sky-700">
      Kirim Instruksi Reset
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