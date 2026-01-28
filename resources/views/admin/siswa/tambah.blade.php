@extends('layouts.admin')

@section('content')
<div class="max-w-2xl p-6 rounded-lg">
  <h3 class="text-lg font-semibold text-gray-900 mb-6">Tambah Siswa</h3>
      @if ($errors->any())
      <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('admin.siswa.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
        <label for="nama_siswa" class="block font-md text-sm text-gray-700 mb-2">Nama Siswa</label>
        <input type="text" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
      </div>
      <div class="mb-4">
        <label for="email_siswa" class="block font-md text-sm text-gray-700 mb-2">Email Siswa</label>
        <input type="text" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
      </div>
      <div class="mb-4">
        <label for="password" class="block font-md text-sm text-gray-700 mb-2">Password Siswa</label>
        <input type="password" name="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
      </div>
      <div class="mt-6 mb-4 space-x-8">
        <button type="submit" class="px-8 py-3 min-w-[120px] text-center text-white bg-blue-500 border border-blue-500 rounded active:text-blue-500 hover:bg-transparent hover:text-blue-500 focus:outline-none focus:ring">Simpan</button>
        <a href="{{ route('admin.laporan') }}" class="px-8 py-3 min-w-[120px] text-center text-white bg-red-500 border border-red-500 rounded active:text-red-500 hover:bg-transparent hover:text-red-500 focus:outline-none focus:ring">Gajadi</a>
      </div>
    </form>
</div>

@endsection