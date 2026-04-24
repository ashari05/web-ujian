@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between mb-6">

<h1 class="text-2xl font-bold">
Manajemen Kategori
</h1>

<a
href="{{ route('admin.kategori.create') }}"
class="bg-sky-600 text-white px-4 py-2 rounded">
+ Tambah Kategori
</a>

</div>


<div class="rounded-2xl border bg-white overflow-hidden">

<table class="min-w-full text-sm">

<thead class="bg-gray-50">
<tr>
<th class="p-3">ID</th>
<th class="p-3">Nama</th>
<th class="p-3">Slug</th>
<th class="p-3">Urutan</th>
<th class="p-3">Status</th>
<th class="p-3">Aksi</th>
</tr>
</thead>

<tbody>

@foreach($rows as $r)

<tr class="border-t">

<td class="p-3">
{{ $r->id }}
</td>

<td class="p-3 font-semibold">
{{ $r->nama }}
</td>

<td class="p-3">
{{ $r->slug }}
</td>

<td class="p-3">
{{ $r->urutan }}
</td>

<td class="p-3">
@if($r->is_active)

<span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">
Aktif
</span>

@else

<span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-full text-xs">
Nonaktif
</span>

@endif
</td>

<td class="p-3 flex gap-3">

<a
href="{{ route('admin.kategori.edit',$r->id) }}"
class="text-sky-600">
Edit
</a>

<form
method="POST"
action="{{ route('admin.kategori.destroy',$r->id) }}"
onsubmit="return confirm('hapus kategori?')">

@csrf
@method('DELETE')

<button class="text-red-600">
Hapus
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection