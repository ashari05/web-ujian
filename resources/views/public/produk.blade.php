<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width,initial-scale=1">

<title>Produk - Restu Ibu</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet"
href="{{ asset('assets/styles.css') }}">
</head>

<body class="bg-gray-50 text-gray-800">

@include('partials.navbar')


<section class="py-14">

<div class="max-w-6xl mx-auto px-4">

<div class="flex items-center justify-between mb-8">

<h1 class="text-2xl md:text-3xl font-bold">
Produk
</h1>



</div>



@forelse($products as $product)

@if($loop->first)
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
@endif


<article class="rounded-2xl overflow-hidden border bg-white hover:shadow transition">

<a href="{{ route('produk.detail',$product->id) }}"
class="block">

@if($product->gambar)

<img
src="{{ asset('uploads/'.$product->gambar) }}"
alt="{{ $product->nama }}"
class="w-full aspect-[4/6] object-cover"
style="aspect-ratio:4/6">

@elseif($product->images->first())

<img
src="{{ asset('uploads/'.$product->images->first()->filename) }}"
class="w-full aspect-[4/6] object-cover"
style="aspect-ratio:4/6">

@else

<img
src="{{ asset('images/produk-default.jpg') }}"
class="w-full aspect-[4/6] object-cover"
style="aspect-ratio:4/6">

@endif

</a>



<div class="p-4">

<a href="{{ route('produk.detail',$product->id) }}"
class="font-semibold hover:underline">
{{ $product->nama }}
</a>


@if($product->harga)

<p class="text-sm text-gray-800 font-semibold mt-1">
Rp {{ number_format($product->harga) }}
</p>

@endif


</div>

</article>


@if($loop->last)
</div>
@endif


@empty

<div class="p-6 rounded-2xl border bg-white">
Belum ada produk.
</div>

@endforelse


</div>

</section>


@include('partials.footer')

</body>
</html>