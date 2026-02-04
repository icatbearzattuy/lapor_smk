@extends('layouts.admin')

@section('content')
<div class="px-6 py-4">
  <h1>Dashboard</h1>
</div> 

<div class="px-6">
  <div class="grid grid-cols-4 gap-6">
    <!-- Calendar Section -->
    <div class="col-span-3 border" id="app">
      <div class="bg-white rounded-lg shadow-md p-4">
        <el-calendar v-model="value"></el-calendar>
      </div>
    
      <script>
        Vue.use(ELEMENT, { locale: ELEMENT.lang.id });
    
        var Main = {
          data() {
            return {
              value: new Date()
            }
          }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
      </script>
    </div>
  </div>
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
@endsection