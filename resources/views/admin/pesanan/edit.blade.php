@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
Edit Pesanan
</h1>

<form
method="POST"
action="{{ route('admin.pesanan.update',$row->id) }}"
class="bg-white border rounded-2xl p-6 space-y-4">

@csrf


<div>
<label>Nama Pelanggan</label>

<input
name="nama_pelanggan"
value="{{ $row->nama_pelanggan }}"
class="w-full border rounded p-3 mt-1">
</div>



<div>
<label>No HP</label>

<input
name="no_hp"
value="{{ $row->no_hp }}"
class="w-full border rounded p-3 mt-1">
</div>



<div>
<label>Alamat</label>

<textarea
name="alamat"
class="w-full border rounded p-3 mt-1">{{ $row->alamat }}</textarea>

</div>



<div>
<label>Tanggal Pesan</label>

<input
type="date"
name="tanggal_pesan"
value="{{ $row->tanggal_pesan }}"
class="w-full border rounded p-3 mt-1">

</div>



<div>
<label>Status</label>

<select
name="status"
class="w-full border rounded p-3 mt-1">

<option
value="Pending"
{{ $row->status=='Pending'?'selected':'' }}>
Pending
</option>

<option
value="Diproses"
{{ $row->status=='Diproses'?'selected':'' }}>
Diproses
</option>

<option
value="Selesai"
{{ $row->status=='Selesai'?'selected':'' }}>
Selesai
</option>

</select>

</div>



<div>
<label>Catatan</label>

<textarea
name="catatan"
class="w-full border rounded p-3 mt-1">{{ $row->catatan }}</textarea>

</div>



<div class="flex gap-3 pt-3">

<button
class="bg-sky-600 text-white px-5 py-2 rounded">
Update
</button>


<a
href="{{ route('admin.pesanan.index') }}"
class="border px-5 py-2 rounded">
Batal
</a>

</div>


</form>

@endsection