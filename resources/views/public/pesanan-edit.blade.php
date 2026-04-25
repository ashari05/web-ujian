@include('partials.navbar')

<section class="py-14">
<div class="max-w-3xl mx-auto px-4">

<h1 class="text-3xl font-bold mb-8">
Edit Pesanan
</h1>

<form
method="POST"
action="{{ route('pesanan.update',$row->id) }}"
class="bg-white p-8 rounded-2xl border space-y-5">

@csrf

<input
name="nama_pelanggan"
value="{{ $row->nama_pelanggan }}"
class="w-full border rounded p-3">

<input
name="no_hp"
value="{{ $row->no_hp }}"
class="w-full border rounded p-3">

<textarea
name="alamat"
class="w-full border rounded p-3">{{ $row->alamat }}</textarea>

<input
type="number"
name="jumlah"
value="{{ $row->jumlah }}"
class="w-full border rounded p-3">

<textarea
name="catatan"
class="w-full border rounded p-3">{{ $row->catatan }}</textarea>


<div class="flex gap-3">

<button class="bg-sky-600 text-white px-5 py-2 rounded">
Update
</button>

<a
href="{{ route('pesanan.index') }}"
class="border px-5 py-2 rounded">
Batal
</a>

</div>

</form>

</div>
</section>

@include('partials.footer')