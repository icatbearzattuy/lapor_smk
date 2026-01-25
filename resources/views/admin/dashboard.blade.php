@extends('layouts.admin')

@section('content')
<div class="px-6 py-4">
  <h1>Dashboard</h1>
</div> 

<div class="px-6">
  <div class="grid grid-cols-4 gap-6">
    <!-- Calendar Section -->
    <div class="col-span-3" id="app">
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
    
     {{-- Stats --}}
    <div class="col-span-1">
      <div class="space-y-4">
        <!-- Card 1: Notifications -->
        <div class="bg-white rounded-lg shadow-md p-4">
          <h3 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
            <span class="material-symbols-rounded text-blue-500 text-xl">query_stats</span>
            Statitik
          </h3>
          <ul class="space-y-2">
            <li class="text-sm text-gray-600 pb-2 border-b border-gray-100">
              <p class="font-medium text-gray-800">Laporan baru masuk</p>
              <p class="text-xs text-gray-400">2 menit yang lalu</p>
            </li>
            <li class="text-sm text-gray-600 pb-2 border-b border-gray-100">
              <p class="font-medium text-gray-800">Siswa baru terdaftar</p>
              <p class="text-xs text-gray-400">15 menit yang lalu</p>
            </li>
            <li class="text-sm text-gray-600">
              <p class="font-medium text-gray-800">Admin login</p>
              <p class="text-xs text-gray-400">1 jam yang lalu</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- table --}}
<!-- Table -->
<div class="overflow-x-auto">
  <table class="w-full">
      <thead class="bg-gray-50">
          <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bank</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nominal</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Duration</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Interest</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Final</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Time</th>
          </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
          @forelse($simulations as $sim)
              <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 text-sm text-gray-500"></td>
                  <td class="px-6 py-4 text-sm text-gray-900"></td>
                  <td class="px-6 py-4 text-sm font-medium text-gray-900"></td>
                  <td class="px-6 py-4 text-sm text-gray-900"></td>
                  <td class="px-6 py-4 text-sm text-gray-900"></td>
                  <td class="px-6 py-4 text-sm text-blue-600 font-medium"></td>
                  <td class="px-6 py-4 text-sm font-semibold text-green-600"></td>
                  <td class="px-6 py-4 text-sm text-gray-500"></td>
              </tr>
          @empty
              <tr>
                  <td colspan="8" class="px-6 py-8 text-center text-gray-500">No simulation data yet</td>
              </tr>
          @endforelse
      </tbody>
  </table>
</div>
@endsection