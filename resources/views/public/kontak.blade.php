<!DOCTYPE html>
<html>
<head>
    <title>Testimoni</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">

@include('partials.navbar')

<!-- Tentang Kami -->
<section id="tentangkami" class="py-20 bg-gray-50">
  <div class="max-w-6xl mx-auto px-4 text-center">

    <h2 class="text-3xl md:text-4xl font-bold mb-4">Tentang Kami</h2>

    <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-10">
      <b>Restu Ibu Custom & Printing</b> adalah mitra terbaik Anda dalam mencetak kebutuhan bisnis maupun pribadi.
      Mulai dari standing banner, MMT, desain grafis, hingga meja lipat portable — kami hadir dengan kualitas terbaik,
      harga bersahabat, dan pelayanan ramah.
    </p>

    <!-- VISI MISI -->
    <div class="grid md:grid-cols-2 gap-6 text-left mt-12">

      <div class="rounded-2xl border bg-white p-6 shadow-sm">
        <h3 class="text-2xl font-semibold text-sky-600 mb-3">🎯 Visi</h3>
        <p class="text-gray-600">
          Menjadi penyedia layanan desain & percetakan terbaik di Surakarta dan sekitarnya,
          yang mendukung pertumbuhan UMKM dan bisnis lokal.
        </p>
      </div>

      <div class="rounded-2xl border bg-white p-6 shadow-sm">
        <h3 class="text-2xl font-semibold text-sky-600 mb-3">🚀 Misi</h3>
        <ul class="list-disc ml-6 text-gray-600 space-y-2">
          <li>Memberikan layanan terbaik & harga bersahabat</li>
          <li>Menggunakan bahan berkualitas</li>
          <li>Pelayanan cepat & profesional</li>
          <li>Mendukung UMKM lokal</li>
        </ul>
      </div>

    </div>

    <!-- NILAI -->
    <div class="grid md:grid-cols-3 gap-6 mt-12">

      <div class="rounded-2xl border bg-white p-6 shadow-sm">
        <h3 class="text-xl font-semibold text-sky-600 mb-2">🎨 Desain Kreatif</h3>
        <p class="text-gray-600">Konsep visual menarik & sesuai kebutuhan</p>
      </div>

      <div class="rounded-2xl border bg-white p-6 shadow-sm">
        <h3 class="text-xl font-semibold text-sky-600 mb-2">⚡ Produksi Cepat</h3>
        <p class="text-gray-600">Hasil cepat & rapi</p>
      </div>

      <div class="rounded-2xl border bg-white p-6 shadow-sm">
        <h3 class="text-xl font-semibold text-sky-600 mb-2">💎 Kualitas Terjamin</h3>
        <p class="text-gray-600">Bahan awet & berkualitas</p>
      </div>

    </div>

  </div>
</section>

<!-- KONTAK -->
<section id="kontak" class="py-16 bg-white">
  <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-12">

    <!-- INFO -->
    <div class="space-y-6">

      <h1 class="text-3xl md:text-4xl font-bold">
        Hubungi <span class="text-sky-600">Restu Ibu</span>
      </h1>

      <p class="text-gray-600">
        Kami siap membantu kebutuhan desain & cetak Anda.
      </p>

      <div class="rounded-2xl border bg-gray-50 p-6 space-y-3 text-gray-700">

        <p>📍 Jl. Tulang Bawang Utara 3 No.28, Surakarta</p>
        <p>📞 0895-3292-05090</p>
        <p>💬 <a href="https://wa.me/62895329205090" target="_blank" class="text-sky-600">WhatsApp</a></p>
        <p>📱 <a href="https://instagram.com/restuibu.printing" target="_blank" class="text-sky-600">@restuibu.printing</a></p>

      </div>

    </div>

    <!-- FORM -->
    <form class="rounded-2xl border bg-white p-6 shadow-sm space-y-5"
          onsubmit="return submitWA(event)">

      <div>
        <label class="text-sm font-semibold">Nama *</label>
        <input id="nama" class="mt-1 w-full border rounded-lg p-3" required>
      </div>

      <div>
        <label class="text-sm font-semibold">Email</label>
        <input id="email" type="email" class="mt-1 w-full border rounded-lg p-3">
      </div>

      <div>
        <label class="text-sm font-semibold">No. WA *</label>
        <input id="telepon" class="mt-1 w-full border rounded-lg p-3" required>
      </div>

      <div>
        <label class="text-sm font-semibold">Pesan *</label>
        <textarea id="pesan" rows="5"
          class="mt-1 w-full border rounded-lg p-3"
          required></textarea>
      </div>

      <button class="w-full py-3 bg-sky-600 text-white rounded-lg hover:bg-sky-700">
        Kirim via WhatsApp
      </button>

    </form>

  </div>
</section>

<script>
function submitWA(e){
  e.preventDefault();

  const nama = document.getElementById('nama').value;
  const email = document.getElementById('email').value;
  const telepon = document.getElementById('telepon').value;
  const pesan = document.getElementById('pesan').value;

  const nomor = '62895329205090';

  let text = `Halo, saya ${nama}\n`;
  if(email) text += `Email: ${email}\n`;
  text += `Telepon: ${telepon}\n\n${pesan}`;

  window.open(`https://wa.me/${nomor}?text=${encodeURIComponent(text)}`, '_blank');
}
</script>

  </div>
</section>
    </main>

    @include('partials.footer')  {{-- footer kamu --}}

  </div>
</body>