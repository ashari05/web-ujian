@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
Edit Kategori
</h1>

<form
method="POST"
action="{{ route('admin.kategori.update',$kategori->id) }}"
class="bg-white border rounded-2xl p-6 space-y-4">

@csrf
@method('PUT')


<div>
<label class="block mb-1">
Nama
</label>

<input
name="nama"
value="{{ $kategori->nama }}"
class="w-full border rounded p-2">
</div>



<div>
<label class="block mb-1">
Urutan
</label>

<input
name="urutan"
value="{{ $kategori->urutan }}"
class="w-full border rounded p-2">
</div>



<label class="flex gap-2 items-center">

<input
type="checkbox"
name="is_active"
{{ $kategori->is_active ? 'checked':'' }}>

Aktif

</label>



<div class="flex gap-3">

<button
class="bg-sky-600 text-white px-5 py-2 rounded">
Update
</button>

<a
href="{{ route('admin.kategori.index') }}"
class="border px-5 py-2 rounded">
Batal
</a>

</div>

</form>

@endsection