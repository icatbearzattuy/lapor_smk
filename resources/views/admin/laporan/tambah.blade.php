@extends('layouts.admin')

@section('content')
<div class="max-w-2xl p-6 rounded-lg">
  <h3 class="text-lg font-semibold text-gray-900 mb-6">Tambah Laporan</h3>
    <form action="{{ route('admin.laporan.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
        <label for="judul_laporan" class="block font-md text-sm text-gray-700 mb-2">Judul Laporan</label>
        <input type="text" name="judul_laporan" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
      </div>
      <div class="mb-4">
        <label for="isi_laporan" class="block font-md text-sm text-gray-700 mb-2">Isi Laporan</label>
        <input type="textarea" name="isi_laporan" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
      </div>
      <div class="mb-4">
        <label for="tanggal_laporan" class="block font-md text-sm text-gray-700 mb-2">Tanggal Laporan</label>
        <input type="date" name="tanggal_laporan" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
      </div>
      <div class="mb-4">
        <label for="img" class="block font-md text-sm text-gray-700 mb-2">Bukti Foto</label>
        <input type="file" name="image" id="imageInput" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
        <img id="preview" class="mt-3 w-128 h-128 object-cover rounded hidden">
      </input>
      </div>
      <div class="mt-6 mb-4 space-x-8">
        <button type="submit" class="px-8 py-3 min-w-[120px] text-center text-white bg-blue-500 border border-blue-500 rounded active:text-blue-500 hover:bg-transparent hover:text-blue-500 focus:outline-none focus:ring">Simpan</button>
        <a href="{{ route('admin.laporan') }}" class="px-8 py-3 min-w-[120px] text-center text-white bg-red-500 border border-red-500 rounded active:text-red-500 hover:bg-transparent hover:text-red-500 focus:outline-none focus:ring">Gajadi</a>
      </div>
    </form>
</div>

{{-- Preview --}}
<script>
  document.getElementById('imageInput').addEventListener('change', function(e){
    const file = e.target.files[0];
    if (file) {
      const preview = document.getElementById('preview');
      preview.src = URL.createObjectURL(file);
      preview.classList.remove('hidden');
    }
  });
</script>

@endsection