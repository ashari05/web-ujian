<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width,initial-scale=1">

<title>Testimoni</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet"
href="{{ asset('assets/styles.css') }}">
</head>


<body class="bg-gray-50 text-gray-800">

@include('partials.navbar')


<section class="py-14">

<div class="max-w-6xl mx-auto px-4">


<div class="flex justify-between items-center mb-6">

<h1 class="text-2xl md:text-3xl font-bold">
Testimoni Pelanggan
</h1>


<a href="{{ url('/produk') }}"
class="text-sm text-sky-700 hover:underline">
← Kembali ke Produk
</a>

</div>



<div class="mb-10">

<a href="{{ route('testimoni.create') }}"
class="px-4 py-2 bg-sky-600 text-white rounded hover:bg-sky-700">

✍️ Tulis Testimoni

</a>

</div>



@if($rows->isEmpty())

<div class="p-6 border bg-white rounded-2xl">
Belum ada testimoni
</div>

@else


<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-5">

@foreach($rows as $r)

@php
$initial = strtoupper(substr($r->nama,0,1));
@endphp


<article class="border bg-white p-5 rounded-2xl shadow-sm">

{{-- HEADER --}}
<div class="flex gap-3">

<div class="w-10 h-10 rounded-full bg-sky-100
flex items-center justify-center
font-semibold text-sky-700">

{{ $initial }}

</div>


<div>

<div class="font-semibold">
{{ $r->nama }}
</div>


<div class="text-xs text-gray-500">

{{ $r->created_at->format('d M Y H:i') }}

@if($r->produk)
| Produk:
{{ $r->produk->nama }}
@endif

</div>

</div>

</div>



{{-- RATING --}}
@if($r->rating)

<div class="mt-3 text-amber-500 text-lg">

@for($i=1;$i<=5;$i++)
{{ $i <= $r->rating ? '★':'☆' }}
@endfor

</div>

@endif



{{-- BADGE SARAN --}}
@if(!empty($r->saran))

<div class="mt-3">

<span class="text-xs text-gray-500">
Penilaian:
</span>

<span class="inline-block ml-2 px-2 py-1 text-xs rounded-full bg-sky-50 text-sky-700">
{{ $r->saran }}
</span>

</div>

@endif



@if($r->nama_usaha)

<div class="mt-3 text-sm text-gray-500">
Usaha:
{{ $r->nama_usaha }}
</div>

@endif



@if($r->alamat_usaha)

<div class="text-sm text-gray-500">
{{ $r->alamat_usaha }}
</div>

@endif



@if($r->komentar)

<div class="mt-4 text-gray-800 leading-relaxed">
{{ $r->komentar }}
</div>

@endif

@if($r->fotos->count())

<div class="mt-4 flex flex-wrap gap-2">

@foreach($r->fotos as $foto)

<a
href="{{ asset('uploads/testimoni/'.$foto->filename) }}"
target="_blank">

<img
src="{{ asset('uploads/testimoni/'.$foto->filename) }}"
class="w-24 h-24 object-cover rounded-xl border hover:scale-105 transition">

</a>

@endforeach

</div>

@endif

</article>

@endforeach

</div>

@endif


</div>

</section>


@include('partials.footer')

</body>
</html>