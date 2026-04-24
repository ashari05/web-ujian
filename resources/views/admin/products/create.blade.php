@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>

<form method="POST"
      action="{{ route('admin.products.store') }}"
      enctype="multipart/form-data"
      class="grid md:grid-cols-2 gap-6">

@csrf

<!-- KIRI -->
<div class="bg-white p-5 rounded-2xl border space-y-4">

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
      @foreach($kategoris as $k)
        <option value="{{ $k->id }}">{{ $k->nama }}</option>
      @endforeach
    </select>
  </div>

  <label>
    <input type="checkbox" name="is_active"> Aktif
  </label>

</div>

<!-- KANAN -->
<div class="bg-white p-5 rounded-2xl border space-y-4">

  <label class="font-medium">Upload & Crop Gambar (multi)</label>

  <input type="file" id="inputImages" multiple accept="image/*"
         class="w-full border p-2 rounded">

  <!-- Cropper -->
  <div id="cropperBox" class="hidden mt-4">
    <img id="imagePreview" class="max-w-full">
    
    <div class="mt-3 flex gap-2">
      <button type="button" id="cropBtn"
              class="px-3 py-2 bg-sky-600 text-white rounded">
        Crop & Tambah
      </button>

      <button type="button" id="nextBtn"
              class="px-3 py-2 border rounded">
        Lewati
      </button>
    </div>
  </div>

  <!-- Preview hasil -->
  <div id="previewList" class="grid grid-cols-3 gap-3 mt-4"></div>

</div>

<!-- hidden input -->
<div id="hiddenInputs"></div>

<!-- BUTTON -->
<div class="md:col-span-2">
  <button class="px-4 py-2 bg-sky-600 text-white rounded">
    Simpan Produk
  </button>
</div>

</form>

<script>
let files = [];
let index = -1;
let cropper;

const input = document.getElementById('inputImages');
const img = document.getElementById('imagePreview');
const box = document.getElementById('cropperBox');
const preview = document.getElementById('previewList');
const hidden = document.getElementById('hiddenInputs');

input.addEventListener('change', function () {
    files = Array.from(this.files);
    index = -1;
    nextImage();
});

function nextImage() {
    index++;

    if (index >= files.length) {
        box.classList.add('hidden');
        return;
    }

    let file = files[index];
    let url = URL.createObjectURL(file);

    img.src = url;
    box.classList.remove('hidden');

    if (cropper) cropper.destroy();

    cropper = new Cropper(img, {
        aspectRatio: 4/6,
        viewMode: 1
    });
}

document.getElementById('cropBtn').onclick = function () {

    let canvas = cropper.getCroppedCanvas({
        width: 800,
        height: 1200
    });

    let data = canvas.toDataURL('image/jpeg', 0.9);

    // WRAPPER
    let wrapper = document.createElement('div');
    wrapper.className = 'relative border rounded overflow-hidden';

    // IMAGE
    let image = document.createElement('img');
    image.src = data;
    image.className = 'w-full aspect-[4/6] object-cover';

    // DELETE BUTTON
    let del = document.createElement('button');
    del.innerText = '✕';
    del.className = 'absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded';

    del.onclick = function () {
        wrapper.remove();
        hidden.removeChild(input);
    };

    // COVER RADIO
    let radio = document.createElement('input');
    radio.type = 'radio';
    radio.name = 'cover_index';
    radio.value = hidden.children.length;

    let label = document.createElement('div');
    label.className = 'absolute bottom-1 left-1 bg-white px-2 text-xs rounded';
    label.innerText = 'Cover';

    label.prepend(radio);

    // HIDDEN INPUT
    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'cropped_images[]';
    input.value = data;

    hidden.appendChild(input);

    wrapper.appendChild(image);
    wrapper.appendChild(del);
    wrapper.appendChild(label);

    preview.appendChild(wrapper);

    nextImage();
};

document.getElementById('nextBtn').onclick = nextImage;
</script>


@endsection