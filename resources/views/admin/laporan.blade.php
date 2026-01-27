@extends('layouts.admin')

@section('content')
<div class="px-6 py-4">
  <div class="flex justify-between">
    <h1>Laporan</h1>
    <a class="px-6 py-2 min-w-[120px] text-center text-white bg-blue-500 border border-blue-500 rounded active:text-blue-500 hover:bg-transparent hover:text-blue-500 focus:outline-none focus:ring"
    href="{{ route('admin.laporan.tambah') }}">
    + Tambah
  </a>
  </div>

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
                <th class="px-6 py-3 text-xs text-center font-medium text-gray-500 uppercase">Aksi</th>
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
                    <td class="px-6 py-4">
                      <div class="flex items-center justify-center gap-2 text-sm">
                        {{-- Edit --}}
                        <a href="{{ route('admin.laporan.edit', $lap->id_laporan) }}"
                          class="px-3 py-1 bg-gray-200 rounded text-xs text-gray-900">
                          Edit
                        </a>
                        {{-- Delete --}}
                        <form action="{{ route('admin.laporan.destroy', $lap->id_laporan) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="px-3 py-1 bg-red-700 rounded text-white text-xs">
                            Hapus
                          </button>
                        </form>
                      </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-6 py-8 text-center text-gray-500">Tidak ada laporan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div> 

@endsection