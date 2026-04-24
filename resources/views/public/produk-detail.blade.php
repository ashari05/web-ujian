<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>{{ $product->nama }}</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
</head>

<body class="bg-gray-50 text-gray-800">

@include('partials.navbar')

<section class="py-10 md:py-14">
<div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-8">

{{-- GALERI --}}
<div>

@php
$cover = $product->gambar
? asset('uploads/'.$product->gambar)
: ($product->images->first()
    ? asset('uploads/'.$product->images->first()->filename)
    : asset('images/produk-default.jpg'));
@endphp

<div class="rounded-2xl overflow-hidden border bg-white">
<img
id="mainImg"
src="{{ $cover }}"
alt="{{ $product->nama }}"
class="w-full aspect-[4/6] object-cover"
style="aspect-ratio:4/6">
</div>


@if($product->images->count()>1)

<div class="mt-3 grid grid-cols-5 sm:grid-cols-6 gap-2">

@foreach($product->images as $img)

<button
type="button"
onclick="swapImg('{{ asset('uploads/'.$img->filename) }}',this)"
class="{{ $loop->first ? 'ring-1 ring-sky-400':'' }}
rounded-xl overflow-hidden border focus:ring-2 focus:ring-sky-500">

<img
src="{{ asset('uploads/'.$img->filename) }}"
class="w-full aspect-[4/6] object-cover"
style="aspect-ratio:4/6">

</button>

@endforeach

</div>

@endif

</div>



{{-- INFO PRODUK --}}
<div class="space-y-5">

<div>

<h1 class="text-2xl md:text-3xl font-bold">
{{ $product->nama }}
</h1>

@if($product->harga)
<p class="mt-1 text-2xl font-semibold text-gray-900">
Rp {{ number_format($product->harga) }}
</p>
@endif

</div>



{{-- kategori badge --}}
@if($product->kategoris->count())

<div class="flex flex-wrap gap-2">

@foreach($product->kategoris as $k)

<span class="
inline-block
text-xs
bg-sky-50
text-sky-700
border border-sky-200
rounded-full
px-2 py-1">

{{ $k->nama }}

</span>

@endforeach

</div>

@endif



<div class="rounded-2xl border bg-white p-5">

<h2 class="text-lg font-semibold">
Spesifikasi
</h2>

@if($product->deskripsi)

<div class="mt-2 text-gray-700 leading-relaxed">
{!! nl2br(e($product->deskripsi)) !!}
</div>

@else

<p class="mt-2 text-gray-500">
Belum ada spesifikasi.
</p>

@endif

</div>



<div class="flex flex-wrap items-center gap-3">

<a
href="https://wa.me/62895329205090?text=Halo,%20saya%20ingin%20pesan%20{{ urlencode($product->nama) }}%20hari%20ini%20apa%20bisa%20jadi?"
target="_blank"
class="
inline-flex
items-center
justify-center
px-5 py-3
rounded-lg
bg-sky-600
text-white
font-semibold
hover:bg-sky-700">

Order via WhatsApp

</a>


<a
href="{{ route('produk') }}"
class="
inline-flex
items-center
justify-center
px-5 py-3
rounded-lg
border
font-semibold
hover:bg-gray-100">

Kembali ke Produk

</a>

</div>



{{-- TESTIMONI UI (dummy tampilan, nanti bisa disambung data asli) --}}
<div class="rounded-2xl border bg-white p-5">

<h2 class="text-lg font-semibold mb-4">
Testimoni Pelanggan
</h2>

@forelse($product->penilaians as $review)

<article class="border-b pb-5 mb-5 last:border-0">

<div class="flex justify-between">

<h3 class="font-semibold">
{{ $review->nama }}
</h3>

<span class="text-xs text-gray-500">
{{ $review->created_at
? $review->created_at->format('d M Y')
: '' }}
</span>

</div>


@if($review->nama_usaha)

<p class="text-xs text-gray-500">
Usaha:
{{ $review->nama_usaha }}
</p>

@endif


@if($review->alamat_usaha)

<p class="text-xs text-gray-500">
Alamat:
{{ $review->alamat_usaha }}
</p>

@endif


<p class="mt-3 text-gray-700">
{{ $review->komentar }}
</p>


@if(isset($review->rating))

<div class="mt-3 text-amber-500">

@for($i=1;$i<=5;$i++)

{{ $i <= $review->rating ? '★':'☆' }}

@endfor

</div>

@endif

</article>

@empty

<p class="text-gray-500">
Belum ada testimoni untuk produk ini.
</p>

@endforelse

</div>
</section>



<script>
function swapImg(src,btn){

document.getElementById(
'mainImg'
).src=src;

document.querySelectorAll(
'button[onclick^="swapImg"]'
).forEach(
b=>b.classList.remove(
'ring-1',
'ring-sky-400'
)
);

btn.classList.add(
'ring-1',
'ring-sky-400'
);

}
</script>

@include('partials.footer')

</body>
</html>