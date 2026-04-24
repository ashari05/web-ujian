@extends('admin.layouts.app')

@section('content')

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

    <div>
        <h1 class="text-2xl font-bold">Produk</h1>
        <p class="text-sm text-gray-500">
            Kelola produk, kategori, dan galeri produk
        </p>
    </div>

    <div class="flex flex-col sm:flex-row gap-2 items-center">

        {{-- FILTER --}}
        <form method="GET" class="flex gap-2 items-center">
            <select name="cat"
                class="border rounded-lg px-3 py-2 text-sm">
                <option value="0">
                    Semua Kategori
                </option>

                @foreach($allCats as $c)
                    <option value="{{ $c->id }}"
                        {{ $filterCat==$c->id ? 'selected' : '' }}>
                        {{ $c->nama }}
                    </option>
                @endforeach
            </select>

            <button
                class="px-4 py-2 border rounded-lg text-sm hover:bg-gray-50">
                Filter
            </button>
        </form>

        <a href="{{ route('admin.products.create') }}"
           class="px-4 py-2 bg-sky-600 text-white rounded-lg text-sm font-medium hover:bg-sky-700">
            + Tambah Produk
        </a>

    </div>

</div>


<div class="rounded-2xl border bg-white shadow-sm overflow-hidden">

<table class="min-w-full text-sm">

<thead class="bg-gray-50 border-b">
<tr>
    <th class="p-4 text-left">ID</th>
    <th class="p-4 text-left">Cover</th>
    <th class="p-4 text-left">Produk</th>
    <th class="p-4 text-left">Kategori</th>
    <th class="p-4 text-left">Harga</th>
    <th class="p-4 text-left">Status</th>
    <th class="p-4 text-left">Aksi</th>
</tr>
</thead>


<tbody>

@forelse($products as $p)

<tr class="border-t hover:bg-gray-50 align-top">

<td class="p-4 font-medium">
    #{{ $p->id }}
</td>


{{-- COVER + GALERI --}}
<td class="p-4">
<div class="flex gap-2 items-start">

@if($p->gambar)
<img
src="{{ asset('uploads/'.$p->gambar) }}"
class="w-14 h-18 object-cover rounded-lg border hover:scale-105 transition">
@else
<div class="w-14 h-18 rounded-lg border bg-gray-100 flex items-center justify-center text-xs text-gray-400">
No Img
</div>
@endif

@if(isset($p->galeri))
<div class="flex flex-col gap-1">
@foreach($p->galeri as $g)
<img
src="{{ asset('uploads/'.$g->filename) }}"
class="w-8 h-10 object-cover rounded border">
@endforeach
</div>
@endif

</div>
</td>


<td class="p-4">
<div class="font-semibold">
    {{ $p->nama }}
</div>

@if($p->deskripsi)
<p class="text-xs text-gray-500 mt-1 line-clamp-2">
    {{ Str::limit($p->deskripsi,60) }}
</p>
@endif

</td>


{{-- BADGE KATEGORI --}}
<td class="p-4">
@if($p->kategoris->count())

<div class="flex flex-wrap gap-2">

@php
$colors=[
'bg-sky-50 text-sky-700 border-sky-200',
'bg-green-50 text-green-700 border-green-200',
'bg-purple-50 text-purple-700 border-purple-200',
'bg-amber-50 text-amber-700 border-amber-200',
];
@endphp

@foreach($p->kategoris as $k)

<span class="
px-3 py-1
rounded-full
text-xs font-semibold
border
{{ $colors[$loop->index % 4] }}
">
{{ $k->nama }}
</span>

@endforeach

</div>

@else
<span class="text-gray-400">
—
</span>
@endif
</td>


<td class="p-4 font-medium">
Rp {{ number_format($p->harga) }}
</td>


<td class="p-4">
@if($p->is_active)
<span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">
Aktif
</span>
@else
<span class="px-3 py-1 rounded-full text-xs bg-gray-100 text-gray-600">
Nonaktif
</span>
@endif
</td>


<td class="p-4 whitespace-nowrap">
<div class="flex gap-3 text-sm">

<a href="{{ route('admin.products.edit',$p->id) }}"
class="text-sky-600 hover:underline">
Edit
</a>

<form
action="{{ route('admin.products.destroy',$p->id) }}"
method="POST"
onsubmit="return confirm('Hapus produk ini?')"
class="inline">

@csrf
@method('DELETE')

<button
type="submit"
class="text-red-600 hover:underline">
Hapus
</button>

</form>

</div>
</td>

</tr>

@empty

<tr>
<td colspan="7"
class="p-8 text-center text-gray-500">
Belum ada produk.
</td>
</tr>

@endforelse

</tbody>

</table>
</div>

@endsection