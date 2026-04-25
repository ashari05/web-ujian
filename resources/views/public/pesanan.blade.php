<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Daftar Pesanan</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
</head>

<body class="bg-gray-50 text-gray-800">

@include('partials.navbar')

<section class="py-14">
<div class="max-w-6xl mx-auto px-4">

<div class="flex justify-between items-center mb-8">
<h1 class="text-3xl font-bold">
Daftar Pesanan
</h1>

<a href="{{ route('produk') }}"
class="text-sky-700 hover:underline">
← Kembali Produk
</a>
</div>


@if(session('success'))
<div class="mb-6 p-4 rounded-xl bg-green-50 border text-green-700">
{{ session('success') }}
</div>
@endif


<div class="bg-white border rounded-2xl overflow-x-auto">

<table class="min-w-full text-sm">

<thead class="bg-gray-50">
<tr>
<th class="p-4 text-left">No</th>
<th class="p-4 text-left">Nama</th>
<th class="p-4 text-left">No HP</th>
<th class="p-4 text-left">Tanggal</th>
<th class="p-4 text-left">Status</th>
<th class="p-4 text-left">Aksi</th>
</tr>
</thead>

<tbody>

@forelse($rows as $r)

<tr class="border-t">

<td class="p-4">
{{ $loop->iteration }}
</td>

<td class="p-4">
{{ $r->nama_pelanggan }}
</td>

<td class="p-4">
{{ $r->no_hp }}
</td>

<td class="p-4">
{{ $r->tanggal_pesan }}
</td>

<td class="p-4">

<span class="px-3 py-1 rounded-full text-xs bg-sky-50 text-sky-700">
{{ $r->status }}
</span>

</td>

<td class="p-4">

<div class="flex gap-2">

<a
href="{{ route('pesanan.edit',$r->id) }}"
class="px-3 py-1 bg-yellow-500 text-white rounded text-xs">
Edit
</a>


<form
method="POST"
action="{{ route('pesanan.destroy',$r->id) }}"
onsubmit="return confirm('Hapus pesanan?')">

@csrf
@method('DELETE')

<button
class="px-3 py-1 bg-red-600 text-white rounded text-xs">
Hapus
</button>

</form>

</div>

</td>

</tr>

@empty

<tr>
<td colspan="6"
class="text-center p-6 text-gray-500">
Belum ada pesanan
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>
</section>

@include('partials.footer')

</body>
</html>