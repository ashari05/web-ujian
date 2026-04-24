@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>

<form method="POST" action="{{ route('admin.products.store') }}">
@csrf

<div class="grid md:grid-cols-2 gap-6">

    <!-- KIRI -->
    <div class="rounded-2xl border bg-white p-5 space-y-4">

        <div>
            <label>Nama</label>
            <input name="nama" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="w-full border p-2 rounded"></textarea>
        </div>

        <div>
            <label>Harga</label>
            <input type="number" name="harga" class="w-full border p-2 rounded">
        </div>

        <div>
            <label>Kategori</label>
            <select name="kategori_ids[]" multiple class="w-full border p-2 h-40">
                @foreach($cats as $c)
                    <option value="{{ $c->id }}">{{ $c->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <input type="checkbox" name="is_active" checked> Aktif
        </div>

    </div>

    <!-- KANAN -->
    <div class="rounded-2xl border bg-white p-5">
        <p class="text-sm text-gray-500">Upload & Crop Gambar</p>

        <input type="file" id="multi_input" multiple class="mt-2 border p-2 w-full">
    </div>

</div>

<!-- hidden crop -->
<div id="hiddenInputs"></div>

<button class="mt-4 px-4 py-2 bg-sky-600 text-white rounded">
    Simpan
</button>

</form>

@endsection