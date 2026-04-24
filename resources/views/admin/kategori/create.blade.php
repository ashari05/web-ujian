@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
Tambah Kategori
</h1>

<form
method="POST"
action="{{ route('admin.kategori.store') }}"
class="bg-white border rounded-2xl p-6 space-y-4">

@csrf

<input
name="nama"
placeholder="Nama kategori"
class="w-full border p-2 rounded">

<input
name="urutan"
placeholder="Urutan"
class="w-full border p-2 rounded">

<label class="flex gap-2">
<input
type="checkbox"
name="is_active"
checked>
Aktif
</label>

<button
class="bg-sky-600 text-white px-5 py-2 rounded">
Simpan
</button>

</form>

@endsection