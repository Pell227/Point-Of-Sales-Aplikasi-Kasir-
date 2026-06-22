@extends('layouts.main')

@section('title', 'report')

@section('content')

<div class="p-6">

    <div class="flex items-center justify-between mb-6">
     <div>
      <h1 class="text-2xl font-bold text-gray-800">Daftar Reports</h1>
      <p class="text-sm text-gray-500 mt-1">{{ $reports->count() }} laporan tersimpan</p>
     </div>

     <a href = "{{ route('Reports.create') }}"
        class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition"> + New Report 
      </a>
   </div>

   @if (session('success'))
      <div class="mb-4 px-4 py-3 rounded-lg bg-green-50 text-green-700 border border-green-200 text-sm">
        {{ session('success') }}
      </div>
    @endif

    @if($reports->isEmpty())
     <div class="text-center py-16 bg-white rounded-xl border border-gray-200">
      <p class="text-gray-500">No reports</p>
     </div>
    @else
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
      <table class="w-full text-sm" style="table-layout: fixed;">
        <thead class="bg-gray-50 border-b border-gray-200">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-10">No</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-32">Start Date</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-32">Finish Date</th>
            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-28">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @foreach ($reports as $r)
          <tr class="hover:bg-gray-50 transition">
            <td class="px-4 py-3 text-gray-400">{{ $loop->iteration }}</td>
            <td class="px-4 py-3">
              <a href="{{ route('Reports.show', $r) }}" class="font-medium text-gray-800 hover:text-blue-600 transition">
                {{ $r->title }}
              </a>
            </td>
          <td class="px-4 py-3 text-gray-500 truncate"> {{ Str::limit($r->description, 60) }} </td>
          <td class="px-4 py-3">
            <span class="inline-block bg-blue-50 text-blue-800 text-xs font-medium px-2 py-1 rounded-md">
                  {{ $r->start_date->format('d M Y') }}
            </span>
            </td>
            <td class="px-4 py-3">
                <span class="inline-block bg-blue-50 text-blue-800 text-xs font-medium px-2 py-1 rounded-md">
                      {{ $r->end_date->format('d M Y') }}
                </span>
            </td>
            <td class="px-4 py-3">
                <div class="flex items-center justify-center gap-2">
                 <a href="{{ route('Reports.edit', $r) }}"
                    class="bg-amber-50 text-amber-800 hover:bg-amber-100 text-xs font-medium px-3 py-1.5 rounded-md transition"> Edit
                 </a>
                      <form action="{{ route('Reports.destroy', $r) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus report ini?');">
                             @csrf
                             @method('DELETE')
                              <button type="submit" class="bg-red-50 text-red-800 hover:bg-red-100 text-xs font-medium px-3 py-1.5 rounded-md transition">
                                     Hapus
                              </button>
                        </form>
                  </div>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
</div>
@endsection