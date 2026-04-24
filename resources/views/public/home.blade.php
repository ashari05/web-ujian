<!DOCTYPE html>
<html>
<head>
    <title>Restu Ibu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>

@include('partials.navbar')

<!-- HERO -->
<section id="home" class="relative">
  <div class="max-w-6xl mx-auto px-4 py-14 text-center">
    <div class="max-w-xl mx-auto">

      <h1 class="text-3xl md:text-5xl font-extrabold leading-tight">
        Custom & Printing untuk Bisnis 
        <span class="text-sky-600">Lebih Menonjol</span>
      </h1>

      <p class="mt-4 text-gray-600">
        Standing banner, MMT, desain grafis, meja lipat portable.<br>
        Kami bantu dari konsep sampai produksi.
      </p>

      <!-- tombol 1 -->
      <div class="mt-6 flex flex-wrap gap-3 justify-center">
        <a href="{{ url('/produk') }}"
           class="px-5 py-3 rounded-lg bg-sky-600 text-white font-semibold hover:bg-sky-700">
          Lihat Produk
        </a>

        <a href="{{ url('/testimoni') }}"
           class="px-5 py-3 rounded-lg bg-sky-600 text-white font-semibold hover:bg-sky-700">
          Lihat Testimoni
        </a>
      </div>

      <!-- tombol 2 -->
      <div class="mt-4">
        <a href="{{ url('/kontak') }}"
           class="px-5 py-3 rounded-lg bg-sky-600 text-white font-semibold hover:bg-sky-700">
          Hubungi Kami
        </a>
      </div>

    </div>
  </div>
</section>





<!-- Tentang Kami -->
<section id="tentangkami" class="py-20 bg-gray-50">
  <div class="max-w-6xl mx-auto px-4 text-center">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">Mengapa Memilih Kami ?</h2>
    <p class="text-lg text-muted-foreground max-w-3xl mx-auto mb-10">
      <b>Restu Ibu Custom & Printing</b> adalah mitra terbaik Anda dalam mencetak kebutuhan bisnis maupun pribadi.
      Mulai dari standing banner, MMT, desain grafis, hingga meja lipat portable — kami hadir dengan kualitas terbaik,
      harga bersahabat, dan pelayanan ramah.
    </p>

    <!-- Visi & Misi -->
    <div class="grid md:grid-cols-2 gap-6 text-left mt-12">
      <div class="rounded-2xl border bg-white p-6 shadow-sm">
        <h3 class="text-2xl font-semibold text-sky-600 mb-3">🎯 Visi</h3>
        <p class="text-gray-600">Menjadi penyedia layanan desain & percetakan terbaik di Surakarta dan sekitarnya,
          yang mendukung pertumbuhan UMKM dan bisnis lokal dengan media promosi yang kreatif dan berkualitas.</p>
      </div>
      <div class="rounded-2xl border bg-white p-6 shadow-sm">
        <h3 class="text-2xl font-semibold text-sky-600 mb-3">🚀 Misi</h3>
        <ul class="list-disc ml-6 text-gray-600 space-y-2">
          <li>Memberikan layanan desain & cetak dengan hasil terbaik dan harga bersahabat.</li>
          <li>Menggunakan bahan dan teknologi modern untuk kualitas yang konsisten.</li>
          <li>Melayani dengan cepat, ramah, dan profesional.</li>
          <li>Mendukung promosi bisnis lokal agar lebih dikenal luas.</li>
        </ul>
      </div>
    </div>

<!-- Mengapa Memilih Restu Ibu -->
<section id="why" class="py-16 bg-white">
  <div class="max-w-6xl mx-auto px-4">
    

    <div class="mt-10 grid md:grid-cols-3 gap-6">
      <article class="rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition">
        <h3 class="text-xl font-semibold mb-2 text-sky-600">Produk Berkualitas</h3>
        <p class="text-gray-600">
          Semua produk melalui seleksi bahan & proses cetak untuk hasil terbaik.
        </p>
      </article>

      <article class="rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition">
        <h3 class="text-xl font-semibold mb-2 text-sky-600">Pelayanan Ramah</h3>
        <p class="text-gray-600">
          Konsultasi desain & order mudah via WhatsApp; tim kami siap membantu.
        </p>
      </article>

      <article class="rounded-2xl border bg-white p-6 shadow-sm hover:shadow-md transition">
        <h3 class="text-xl font-semibold mb-2 text-sky-600">Harga Terjangkau</h3>
        <p class="text-gray-600">
          Penawaran bersahabat tanpa mengorbankan kualitas.
        </p>
      </article>
    </div>
  </div>
</section>


    <!-- Nilai Utama -->
    <div class="grid md:grid-cols-3 gap-6 mt-12">
      <div class="rounded-2xl border bg-white p-6 shadow-sm">
        <h3 class="text-xl font-semibold mb-2 text-sky-600">🎨 Desain Kreatif</h3>
        <p class="text-gray-600">Tim desain kami siap membantu membuat konsep visual yang menarik dan sesuai kebutuhan Anda.</p>
      </div>
      <div class="rounded-2xl border bg-white p-6 shadow-sm">
        <h3 class="text-xl font-semibold mb-2 text-sky-600">⚡ Produksi Cepat</h3>
        <p class="text-gray-600">Pesanan dicetak dengan mesin modern sehingga hasil rapi, berkualitas, dan pengerjaan cepat.</p>
      </div>
      <div class="rounded-2xl border bg-white p-6 shadow-sm">
        <h3 class="text-xl font-semibold mb-2 text-sky-600">💎 Kualitas Terjamin</h3>
        <p class="text-gray-600">Kami selalu menggunakan bahan yang awet dan berkualitas untuk kepuasan pelanggan.</p>
      </div>
    </div>

</section>

    

    <div class="mt-8 text-center">
      <a href="kontak" class="inline-flex items-center px-5 py-3 rounded-lg border font-semibold hover:bg-gray-100">
        Hubungi Kami
      </a>
    </div>
  </div>
  @include('partials.footer')
</section>


</body>
</html>