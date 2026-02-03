<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <div class="max-w-2xl p-6 rounded-lg">
          <h3 class="text-lg font-semibold text-gray-900 mb-6">Laporan</h3>
              @if ($errors->any())
              <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-4">
                <label for="judul_laporan" class="block font-md text-sm text-gray-700 mb-2">Judul Laporan</label>
                <input type="text" name="judul_laporan" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
              </div>
              <div class="mb-4">
                <label for="isi_laporan" class="block font-md text-sm text-gray-700 mb-2">Isi Laporan</label>
                <input type="text" name="isi_laporan" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
              </div>
              <div class="mb-4">
                <label for="tanggal_laporan" class="block font-md text-sm text-gray-700 mb-2">Tanggal Laporan</label>
                <input type="date" name="tanggal_laporan" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
              </div>
              <div class="mb-4">
                <label for="id_kategori" class="block font-md text-sm text-gray-700 mb-2">Kategori Laporan</label>
                <select name="id_kategori" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                  <option value="">Pilih Kategori</option>
                  @foreach ($kategori as $kat)
                    <option value="{{ $kat->id_kategori }}">
                      {{ $kat->nama_kategori }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="mb-4">
                <label for="img" class="block font-md text-sm text-gray-700 mb-2">Bukti Foto</label>
                <input type="file" name="image" id="imageInput" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                <img id="preview" class="mt-3 w-128 h-128 object-cover rounded hidden">
              </input>
              </div>
              <div class="mt-6 mb-4 space-x-8">
                <button type="submit" class="px-8 py-3 min-w-[120px] text-center text-white bg-blue-500 border border-blue-500 rounded active:text-blue-500 hover:bg-transparent hover:text-blue-500 focus:outline-none focus:ring">Simpan</button>
                <a href="{{ route('admin.laporan') }}" class="px-8 py-3 min-w-[120px] text-center text-white bg-red-500 border border-red-500 rounded active:text-red-500 hover:bg-transparent hover:text-red-500 focus:outline-none focus:ring">Kembali</a>
              </div>
            </form>
        </div>
    </x-slot>
    <!-- Table -->
<div class="overflow-x-auto border mt-6">
  <table class="w-full">
      <thead class="bg-gray-50">
          <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul Laporan</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pelapor</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
          </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
          @forelse($laporan as $lap)
              <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                  @if ($lap->image)
                    <img src="{{ asset('storage/'.$lap->image) }}" class="w-16 h-16 object-cover rounded">
                  @else
                    <span class="text-gray-400">No Image</span>
                  @endif
                </td>
                  <td class="px-6 py-4 text-sm text-gray-900">{{ $lap->judul_laporan }}</td>
                  <td class="px-6 py-4 text-sm text-gray-900">{{ $lap->isi_laporan }}</td>
                  <td class="px-6 py-4 text-sm text-gray-900">{{ $lap->tanggal_laporan }}</td>
                  <td class="px-6 py-4 text-sm text-gray-900">{{ $lap->user->name ?? 'N/A' }}</td>
                  <td class="px-6 py-4 text-sm text-gray-900">{{ $lap->kategori->nama_kategori ?? 'N/A'}}</td>
              </tr>
          @empty
              <tr>
                  <td colspan="8" class="px-6 py-8 text-center text-gray-500">Tidak ada laporan</td>
              </tr>
          @endforelse
      </tbody>
  </table>
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
</x-app-layout>
