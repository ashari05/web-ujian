<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Tulis Testimoni</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
</head>

<body class="bg-gray-50 text-gray-800">

@include('partials.navbar')


<section class="py-14">
<div class="max-w-3xl mx-auto px-4">

<div class="flex items-center justify-between mb-6">
<h1 class="text-3xl font-bold">
Tulis Testimoni
</h1>

<a href="{{ route('testimoni') }}"
class="text-sm text-sky-700 hover:underline">
← Kembali
</a>

</div>


@if(session('success'))
<div class="mb-6 p-4 rounded-xl border bg-green-50 text-green-700">
{{ session('success') }}
</div>
@endif


@if($errors->any())
<div class="mb-6 p-4 rounded-xl border bg-red-50 text-red-700">
<ul class="list-disc ml-5">
@foreach($errors->all() as $e)
<li>{{ $e }}</li>
@endforeach
</ul>
</div>
@endif



<div class="rounded-2xl border bg-white p-6">

<h2 class="text-lg font-semibold mb-5">
Form Testimoni
</h2>


<form
method="POST"
action="{{ route('testimoni.store') }}"
enctype="multipart/form-data"
class="grid md:grid-cols-2 gap-5">

@csrf


{{-- PRODUK --}}
<div class="md:col-span-2">

<label class="block text-sm font-medium">
Pilih Produk
</label>

<select
name="produk_id"
class="mt-1 w-full border rounded p-2">

<option value="">
— Pilih Produk —
</option>

@foreach($products as $product)

<option
value="{{ $product->id }}">

{{ $product->nama }}

</option>

@endforeach

</select>

</div>



<div>
<label class="block text-sm font-medium">
Nama Anda *
</label>

<input
name="nama"
value="{{ old('nama') }}"
class="mt-1 w-full border rounded p-2"
required>

</div>



<div>
<label class="block text-sm font-medium">
Nama Usaha
</label>

<input
name="nama_usaha"
value="{{ old('nama_usaha') }}"
class="mt-1 w-full border rounded p-2">

</div>



<div>
<label class="block text-sm font-medium">
Alamat Usaha
</label>

<input
name="alamat_usaha"
value="{{ old('alamat_usaha') }}"
class="mt-1 w-full border rounded p-2">

</div>



<div>
<label class="block text-sm font-medium">
Rating
</label>

<select
name="rating"
class="mt-1 w-full border rounded p-2">

<option value="5">★★★★★</option>
<option value="4">★★★★</option>
<option value="3">★★★</option>
<option value="2">★★</option>
<option value="1">★</option>

</select>

</div>



<div class="md:col-span-2">

<label class="block text-sm font-medium">
Komentar *
</label>

<textarea
name="komentar"
rows="6"
required
class="mt-1 w-full border rounded p-2"
placeholder="Ceritakan pengalaman Anda...">{{ old('komentar') }}</textarea>

<p class="text-xs text-gray-500 mt-1">
Komentar akan ditinjau admin.
</p>

</div>



{{-- MULTI SARAN --}}
<div class="md:col-span-2">

<label class="block text-sm font-medium">
Penilaian
</label>

<div class="mt-3 grid sm:grid-cols-2 gap-2">

<label class="flex gap-2 text-sm">
<input type="checkbox" name="saran[]" value="Desain memuaskan">
Desain memuaskan
</label>

<label class="flex gap-2 text-sm">
<input type="checkbox" name="saran[]" value="Pengerjaan cepat">
Pengerjaan cepat
</label>

<label class="flex gap-2 text-sm">
<input type="checkbox" name="saran[]" value="Pengerjaan selesai tepat waktu">
Pengerjaan selesai tepat waktu
</label>

<label class="flex gap-2 text-sm">
<input type="checkbox" name="saran[]" value="Penjual ramah">
Penjual ramah
</label>

<label class="flex gap-2 text-sm">
<input type="checkbox" name="saran[]" value="Bahan awet dan berkualitas">
Bahan awet dan berkualitas
</label>

</div>

</div>



{{-- FOTO --}}
<div class="md:col-span-2">

<label class="block text-sm font-medium">
Upload Foto (opsional)
</label>

<input
type="file"
multiple
name="fotos[]"
accept="image/*"
class="mt-1 w-full border rounded p-2">

</div>



<div class="md:col-span-2 pt-2">

<button
class="px-5 py-3 bg-sky-600 text-white rounded-lg hover:bg-sky-700">

Kirim Testimoni

</button>

</div>

</form>

</div>

</div>
</section>


@include('partials.footer')

</body>
</html>