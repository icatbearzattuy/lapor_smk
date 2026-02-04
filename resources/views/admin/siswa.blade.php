@extends('layouts.admin')

@section('content')
<div class="px-6 py-4">
  <div class="flex justify-between">
    <h1>Admin Siswa Manajemen</h1>
    <a class="px-6 py-2 min-w-[120px] text-center text-white bg-blue-500 border border-blue-500 rounded active:text-blue-500 hover:bg-transparent hover:text-blue-500 focus:outline-none focus:ring"
    href="{{ route('admin.siswa.tambah') }}">
    + Tambah
  </a>
  </div>

  <!-- Table -->
  <div class="overflow-x-auto border mt-6">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Password</th>
                <th class="px-6 py-3 text-xs text-center font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($siswa as $sis)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $sis->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $sis->email }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $sis->password }}</td>
                    <td class="px-6 py-4">
                      <div class="flex items-center justify-center gap-2 text-sm">
                        {{-- Edit --}}
                        <a href="{{ route('admin.siswa.edit', $sis->id_user) }}"
                          class="px-3 py-1 bg-gray-200 rounded text-xs text-gray-900">
                          Edit
                        </a>
                        {{-- Delete --}}
                        <form action="{{ route('admin.siswa.destroy', $sis->id_user) }}" method="POST"
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
                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">Tidak ada Siswa</td>
                </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div> 

@endsection