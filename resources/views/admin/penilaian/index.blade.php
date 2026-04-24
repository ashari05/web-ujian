@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between mb-6">
<h1 class="text-2xl font-bold">
Manajemen Penilaian
</h1>

<form method="get">
<select
name="status"
class="border rounded p-2">

<option value="">
Semua
</option>

<option value="pending">
Pending
</option>

<option value="published">
Published
</option>

<option value="rejected">
Rejected
</option>

</select>

<button class="border px-3 py-2 rounded">
Filter
</button>
</form>

</div>


<div class="rounded-2xl border bg-white overflow-x-auto">

<table class="min-w-full text-sm">

<thead class="bg-gray-50">
<tr>

<th class="p-3">ID</th>
<th class="p-3">Produk</th>
<th class="p-3">Nama</th>
<th class="p-3">Komentar</th>
<th class="p-3">Status</th>
<th class="p-3">Aksi</th>

</tr>
</thead>

<tbody>

@forelse($rows as $r)

<tr class="border-t">

<td class="p-3">
{{ $r->id }}
</td>

<td class="p-3">
{{ $r->produk_nama ?? '-' }}
</td>

<td class="p-3">
{{ $r->nama }}
</td>

<td class="p-3 max-w-xs truncate">
{{ $r->komentar }}
</td>

<td class="p-3">

<form
method="POST"
action="{{ route('admin.penilaian.status',$r->id) }}"
class="flex gap-2">

@csrf

<select
name="status"
class="border rounded p-1">

<option
value="pending"
{{ $r->status=='pending'?'selected':'' }}>
Pending
</option>

<option
value="published"
{{ $r->status=='published'?'selected':'' }}>
Published
</option>

<option
value="rejected"
{{ $r->status=='rejected'?'selected':'' }}>
Rejected
</option>

</select>

<button
class="bg-sky-600 text-white px-2 rounded">
Simpan
</button>

</form>

</td>


<td class="p-3">

<form
method="POST"
action="{{ route('admin.penilaian.destroy',$r->id) }}"
onsubmit="return confirm('Hapus penilaian?')">

@csrf
@method('DELETE')

<button
class="text-red-600">
Hapus
</button>

</form>

</td>

</tr>

@empty

<tr>
<td colspan="6"
class="p-5 text-center text-gray-500">

Belum ada penilaian

</td>
</tr>

@endforelse

</tbody>

</table>

</div>

@endsection