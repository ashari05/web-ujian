@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
Edit Produk
</h1>

<form
method="POST"
action="{{ route('admin.products.update',$product->id) }}"
enctype="multipart/form-data"
class="space-y-6">

@csrf

<div class="bg-white rounded-2xl border p-6 space-y-4">

<div>
<label>Nama</label>
<input
name="nama"
value="{{ $product->nama }}"
class="w-full border rounded p-2 mt-1">
</div>


<div>
<label>Deskripsi</label>
<textarea
name="deskripsi"
rows="5"
class="w-full border rounded p-2 mt-1"
>{{ $product->deskripsi }}</textarea>
</div>


<div>
<label>Harga</label>
<input
name="harga"
value="{{ $product->harga }}"
class="w-full border rounded p-2 mt-1">
</div>


<div>
<label>Kategori</label>

<select
name="kategori_ids[]"
multiple
class="w-full border rounded p-2 h-40">

@foreach($allCats as $cat)

<option
value="{{ $cat->id }}"
{{ $product->kategoris->contains($cat->id)
? 'selected':'' }}>
{{ $cat->nama }}
</option>

@endforeach

</select>
</div>



<label class="flex gap-2 items-center">
<input
type="checkbox"
name="is_active"
{{ $product->is_active ? 'checked':'' }}>
Aktif
</label>

</div>



{{-- GALERI --}}
<div class="bg-white rounded-2xl border p-6">

<h3 class="font-semibold mb-4">
Galeri Produk
</h3>

<div class="grid grid-cols-4 gap-4">

@foreach($product->images as $img)

<div class="border rounded-xl p-2">

<img
src="{{ asset('uploads/'.$img->filename) }}"
class="w-full h-32 object-cover rounded">

<label class="flex mt-2 gap-2 text-xs">

<input
type="radio"
name="cover_existing"
value="{{ $img->filename }}"
{{ $product->gambar==$img->filename
? 'checked':'' }}>

Jadikan Cover

</label>


<label class="flex mt-2 gap-2 text-xs text-red-600">

<input
type="checkbox"
name="hapus_foto[]"
value="{{ $img->id }}">

Hapus

</label>

</div>

@endforeach

</div>

</div>



{{-- upload baru --}}
<div class="bg-white rounded-2xl border p-6">

<label class="font-medium">
Tambah Gambar Baru
</label>

<input
type="file"
name="photos[]"
multiple
class="w-full border rounded p-2 mt-3">

</div>



<div class="flex gap-3">

<button
class="bg-sky-600 text-white px-5 py-2 rounded">
Update
</button>

<a
href="{{ route('admin.products.index') }}"
class="border px-5 py-2 rounded">
Batal
</a>

</div>


</form>

@endsection