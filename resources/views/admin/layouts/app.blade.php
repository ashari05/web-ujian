<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin — Restu Ibu</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

<div class="min-h-screen grid lg:grid-cols-[240px_1fr]">

  <!-- SIDEBAR -->
  <aside class="bg-white border-r">
    <div class="h-14 px-4 flex items-center font-bold">
      Restu Ibu — Admin
    </div>

    <nav class="px-2 space-y-2 text-sm">

        <a href="{{ route('admin.products.index') }}"
            class="block px-3 py-2 rounded hover:bg-gray-100">
            🧾 Produk
        </a>

        <a href="{{ route('admin.products.create') }}"
          class="block px-3 py-2 rounded hover:bg-gray-100">
          ➕ Tambah Produk
        </a>

        <a href="{{ route('admin.penilaian.index') }}"
            class="block px-3 py-2 rounded hover:bg-gray-100">
            ⭐ Manajemen Penilaian
        </a>

        <a href="{{ route('admin.kategori.index') }}"
            class="block px-3 py-2 rounded hover:bg-gray-100">
            📂 Manajemen Kategori
        </a>

        <a href="{{ route('admin.pesanan.index') }}"
            class="block px-3 py-2 rounded hover:bg-gray-100">
            📂 Manajemen Pesanan
        </a>

    </nav>
  </aside>

  <!-- CONTENT -->
  <div>

    <!-- TOPBAR -->
    <header class="bg-white border-b">
      <div class="h-14 px-4 flex justify-between items-center">

        <h1 class="font-semibold">
          Admin Panel
        </h1>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="bg-red-500 text-white px-3 py-1 rounded">
            Logout
          </button>
        </form>

      </div>
    </header>

    <!-- MAIN -->
    <main class="p-6">
      @yield('content')
    </main>

  </div>

</div>

</body>
</html>

<link rel="stylesheet" href="https://unpkg.com/cropperjs@1.6.2/dist/cropper.min.css">
<script src="https://unpkg.com/cropperjs@1.6.2/dist/cropper.min.js"></script>