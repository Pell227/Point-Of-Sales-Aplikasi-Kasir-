@extends('layouts.main')

@section('title', 'Staff')

@section('content')

<div class="p-6">

    <div class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-bold text-gray-800">Daftar Data Staff</h1>
      <a href="{{ route('Staff.create') }}"
        class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
        <span class="text-lg leading-none">+</span> Add Staff
      </a>
    </div>

    @if (session('success'))
        <div class="mb-4 px-4 py-3 rounded-lg bg-green-50 text-green-700 border border-green-200 text-sm">
          {{ session('success') }}
        </div>
    @endif

    @if ($staff->isEmpty())
        <div class="text-center py-16 bg-white rounded-xl border border-gray-200">
          <p class="text-gray-500">Tidak ada Data Staff</p>
        </div>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
          @foreach ($staff as $s)
          <button type="button" onclick="openStaffModal({{ $s->id }})" class="staff-card flex flex-col items-center text-center gap-2 bg-white border border-gray-200 rounded-xl p-4 hover:shadow-md hover:border-blue-300 transition cursor-pointer">
            <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-semibold text-lg">
              {{ strtoupper(substr($s->name, 0, 1)) }}
            </div>
            <div>
              <p class="font-medium text-gray-800 text-sm">{{ $s->name }}</p>
              <p class="text-xs text-gray-500">{{ $s->position }}</p>
            </div>
          </button>
          @endforeach
        </div>
        @endif
</div>

<div id="staffModalOverlay"
    class="hidden fixed inset-0 bg-black/40 z-40 flex items-center justify-center p-4"
    onclick="if (event.target === this) closeStaffModal()">
  <div class="bg-white rounded-xl border border-gray-200 w-full max-w-sm p-5 relative">
    <button type="button" onclick="closeStaffModal()"
            class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-xl leading-none">
            &times;
     </button>
  <div class="flex items-center gap-3 mb-4">
    <div id="modalAvatar"
      class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-semibold text-sm">
      ?
  </div>
  <div>
    <p id="modalName" class="font-medium text-gray-800 text-sm"></p>
    <p id="modalPosition" class="text-xs text-gray-500"></p>
  </div>
</div>

<div class="border-t border-gray-100 pt-3 space-y-2 text-sm">
  <div class="flex justify-between">
    <span class="text-gray-500">NIP</span>
    <span id="modalNip" class="font-medium text-gray-800"></span>
  </div>

  <div class="flex justify-between">
    <span class="text-gray-500">Email</span>
    <span id="modalEmail" class="font-medium text-gray-800"></span>
  </div>

  <div class="flex justify-between">
    <span class="text-gray-500">No Telp</span>
    <span id="modalNotelp" class="font-medium text-gray-800"></span>
  </div>
 </div>

<div class="flex gap-2 mt-4 border-t border-gray-100 pt-3">
  <a id="modalEdit" href="#"
    class="flex-1 text-center bg-amber-50 text-amber-600 hover:bg-amber-100 text-xs font-medium py-2 rounded-md transition">
    Edit
  </a>
  <form id="modalDelete" action="#" method="Post" class="flex-1" onsubmit="return confirm('Yakin untuk menghapus data staff ini?');">
  @csrf
  @method('DELETE')
  <button type="submit" class="w-full bg-red-50 text-red-600 hover:bg-red-100 text-xs font-medium py-2 rounded-md transition">Hapus</button>
  </form>
 </div>
</div>
</div>

<script>
  const staffData = {
    @foreach ($staff as $s)
    {{ $s->id }}: {
      name: @json($s->name),
      position: @json($s->position),
      NIP: @json($s->NIP),
      email: @json($s->email),
      phone: @json($s->phone_number),
      edit: @json(route('Staff.edit', $s)),
      delete: @json(route('Staff.destroy', $s)),
    },
    @endforeach
  };
  
  function openStaffModal(id) {
    const data = staffData[id];
    if(!data) return;

    document.getElementById('modalAvatar').textContent = data.name.charAt(0).toUpperCase();
    document.getElementById('modalName').textContent = data.name;
        document.getElementById('modalPosition').textContent = data.position;
        document.getElementById('modalNip').textContent = data.NIP;
        document.getElementById('modalEmail').textContent = data.email;
        document.getElementById('modalNotelp').textContent = data.phone;
        document.getElementById('modalEdit').setAttribute('href', data.edit);
        document.getElementById('modalDelete').setAttribute('action', data.delete);
        document.getElementById('staffModalOverlay').classList.remove('hidden');
  }

  function closeStaffModal() {
    document.getElementById('staffModalOverlay').classList.add('hidden');
  }

  document.addEventListener('keydown', function (e){
    if (e.key === 'Escape') closeStaffModal();
  });
</script>

@endsection