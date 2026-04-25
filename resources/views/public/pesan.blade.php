<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width,initial-scale=1">

<title>Form Pemesanan</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet"
href="{{ asset('assets/styles.css') }}">
</head>


<body class="bg-gray-50 text-gray-800">

@include('partials.navbar')


<section class="py-14">

<div class="max-w-3xl mx-auto px-4">


<div class="flex items-center justify-between mb-8">

<h1 class="text-2xl md:text-3xl font-bold">
Form Pemesanan
</h1>

<a
href="{{ route('produk.detail',$product->id) }}"
class="text-sky-700 text-sm hover:underline">

← Kembali

</a>

</div>



@if($errors->any())

<div class="mb-6 p-4 rounded-xl border bg-red-50 text-red-700">

<ul class="list-disc ml-5">
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>

</div>

@endif



<div class="bg-white border rounded-2xl p-8 shadow-sm">


<div class="mb-6 pb-5 border-b">

<h2 class="text-xl font-semibold">
{{ $product->nama }}
</h2>

<p class="text-gray-500 mt-2">
Silakan isi data pemesanan produk.
</p>

@if($product->harga)
<p class="mt-3 text-lg font-semibold">
Rp {{ number_format($product->harga) }}
</p>
@endif

</div>



<form
method="POST"
action="{{ route('pesanan.store') }}"
class="space-y-5">

@csrf


<input
type="hidden"
name="produk_id"
value="{{ $product->id }}">



<div>
<label class="block font-medium mb-2">
Nama Pemesan
</label>

<input
name="nama_pelanggan"
value="{{ old('nama_pelanggan') }}"
class="w-full border rounded-lg p-3"
placeholder="Nama lengkap"
required>
</div>



<div>
<label class="block font-medium mb-2">
Nomor WhatsApp
</label>

<input
name="no_hp"
value="{{ old('no_hp') }}"
class="w-full border rounded-lg p-3"
placeholder="08xxxxxxxxxx"
required>
</div>



<div>
<label class="block font-medium mb-2">
Alamat
</label>

<textarea
name="alamat"
rows="4"
class="w-full border rounded-lg p-3"
placeholder="Alamat lengkap"
required>{{ old('alamat') }}</textarea>
</div>



<div>
<label class="block font-medium mb-2">
Jumlah Pesanan
</label>

<input
type="number"
name="jumlah"
value="1"
min="1"
class="w-full border rounded-lg p-3">
</div>



<div>
<label class="block font-medium mb-2">
Catatan
</label>

<textarea
name="catatan"
rows="3"
class="w-full border rounded-lg p-3"
placeholder="Opsional"></textarea>
</div>



<div class="pt-4 flex flex-wrap gap-3">

<button
class="px-6 py-3 rounded-lg bg-sky-600 text-white font-semibold hover:bg-sky-700">

Kirim Pesanan

</button>


<a
href="{{ route('produk.detail',$product->id) }}"
class="px-6 py-3 rounded-lg border font-semibold hover:bg-gray-100">

Batal

</a>


</div>

</form>

</div>


</div>

</section>


@include('partials.footer')

</body>
</html>