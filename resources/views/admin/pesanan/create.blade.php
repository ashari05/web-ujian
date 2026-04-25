@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
Tambah Pesanan
</h1>

<form
method="POST"
action="{{ route('admin.pesanan.store') }}"
class="bg-white border rounded-2xl p-6 space-y-4">

@csrf


<div>
<label>Nama Pelanggan</label>

<input
name="nama_pelanggan"
class="w-full border rounded p-3 mt-1"
required>
</div>



<div>
<label>No HP</label>

<input
name="no_hp"
class="w-full border rounded p-3 mt-1"
required>
</div>



<div>
<label>Alamat</label>

<textarea
name="alamat"
class="w-full border rounded p-3 mt-1"
required></textarea>

</div>



<div>
<label>Tanggal Pesan</label>

<input
type="date"
name="tanggal_pesan"
class="w-full border rounded p-3 mt-1"
required>
</div>



<div>
<label>Status</label>

<select
name="status"
class="w-full border rounded p-3 mt-1">

<option>Pending</option>
<option>Diproses</option>
<option>Selesai</option>

</select>

</div>



<div>
<label>Catatan</label>

<textarea
name="catatan"
class="w-full border rounded p-3 mt-1"></textarea>
</div>



<div class="flex gap-3 pt-3">

<button
class="bg-sky-600 text-white px-5 py-2 rounded">
Simpan
</button>

<a
href="{{ route('admin.pesanan.index') }}"
class="border px-5 py-2 rounded">
Batal
</a>

</div>


</form>

@endsection