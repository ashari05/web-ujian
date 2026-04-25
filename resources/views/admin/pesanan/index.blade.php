@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between mb-6">
<h1 class="text-2xl font-bold">
Pesanan
</h1>

<a href="{{ route('admin.pesanan.create') }}"
class="bg-sky-600 text-white px-4 py-2 rounded">
Tambah Pesanan
</a>
</div>


<table class="w-full bg-white border rounded-xl">
<thead class="bg-gray-50">
<tr>
<th class="p-3">Nama</th>
<th>No HP</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

@foreach($rows as $r)

<tr class="border-t">
<td class="p-3">
{{ $r->nama_pelanggan }}
</td>

<td>
{{ $r->no_hp }}
</td>

<td>
{{ $r->status }}
</td>

<td class="flex gap-2 p-3">

<a href="{{ route('admin.pesanan.edit',$r->id) }}"
class="px-3 py-1 bg-yellow-500 text-white rounded">
Edit
</a>

<form method="POST"
action="{{ route('admin.pesanan.destroy',$r->id) }}">

@csrf
@method('DELETE')

<button class="px-3 py-1 bg-red-600 text-white rounded">
Hapus
</button>

</form>

</td>
</tr>

@endforeach

</tbody>
</table>

@endsection