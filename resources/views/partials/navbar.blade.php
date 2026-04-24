<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <title>{{ $title ?? 'Restu Ibu — Custom & Printing' }}</title>
  <meta name="description" content="{{ $desc ?? '' }}">

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
  <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body class="bg-gray-50 text-gray-800">

<header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b">
  <nav class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">

    <!-- Brand -->
    <a href="{{ url('/dashboard') }}" class="flex items-center gap-2 font-semibold">
      <img src="{{ asset('assets/images/ridp.png') }}" class="h-8 w-8">
      <span>Restu Ibu</span>
    </a>

    <!-- Desktop Menu -->
    <ul class="hidden md:flex gap-6 text-sm">

      <li>
        <a href="{{ url('/dashboard') }}"
           class="{{ request()->is('/') ? 'text-sky-600 font-bold' : 'hover:text-sky-600' }}">
           Beranda
        </a>
      </li>



      <li>
        <a href="{{ url('/produk') }}"
           class="{{ request()->is('produk') ? 'text-sky-600 font-bold' : 'hover:text-sky-600' }}">
           Produk
        </a>
      </li>

      <li>
        <a href="{{ url('/testimoni') }}"
           class="{{ request()->is('testimoni') ? 'text-sky-600 font-bold' : 'hover:text-sky-600' }}">
           Testimoni
        </a>
      </li>

      <li>
        <a href="{{ url('/kontak') }}"
           class="{{ request()->is('kontak') ? 'text-sky-600 font-bold' : 'hover:text-sky-600' }}">
           Hubungi Kami
        </a>
      </li>

      @auth
      <li>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="text-red-600 font-semibold">
           Logout ({{ auth()->user()->name }})
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
      </li>
      @endauth

    </ul>

    <!-- Mobile -->
    <details class="md:hidden relative">
      <summary class="list-none p-2 border rounded cursor-pointer">
        Menu
      </summary>

      <ul class="absolute right-0 mt-2 w-52 rounded-xl border bg-white shadow-lg">

        <li><a href="{{ url('/home') }}" class="block px-4 py-2">Beranda</a></li>
        <li><a href="{{ url('/produk') }}" class="block px-4 py-2">Produk</a></li>
        <li><a href="{{ url('/testimoni') }}" class="block px-4 py-2">Testimoni</a></li>
        <li><a href="{{ url('/kontak') }}" class="block px-4 py-2">KHubungi Kami</a></li>

        @auth
        <li>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="block w-full text-left px-4 py-2 text-red-600">
              Logout
            </button>
          </form>
        </li>
        @endauth

      </ul>
    </details>

  </nav>
</header>