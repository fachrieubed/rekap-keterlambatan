
@extends('layout.apps')

@section('content')
<div class="p-2 grid items-center rounded-lg gap-3">
    <div class="justify-between flex">
        <h1 class="text-2xl lg:text-3xl font-semibold text-yellow-500 pb-3">
            <span style="border-bottom: 2px solid black;"><span>Data Siswa</span></span>
        </h1>
        <div class="text-left">
            @if (Auth::user()->role == "admin")
            <a href="{{ route('students.create') }}" class="bg-gray-900 text-white p-2 rounded-lg">
                Tambah Data
            </a>
            @endif
        </div>
    </div>
    <div class="table-responsive mt-1 overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="text-center">
                    <th class="border border-gray-200 px-4 py-2">No.</th>
                    <th class="border border-gray-200 px-4 py-2">NIS</th>
                    <th class="border border-gray-200 px-4 py-2">Name</th>
                    <th class="border border-gray-200 px-4 py-2">Rombel</th>
                    <th class="border border-gray-200 px-4 py-2">Rayon</th>
                    @if (Auth::user()->role == "admin")
                        <th class="border border-gray-200 px-4 py-2">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td class="border border-gray-200 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center">{{ $student->nis }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center">{{ $student->name }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center">{{ $student->rombel->rombel ?? 'N/A' }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center">{{ $student->rayon->rayon ?? 'N/A' }}</td>
                        @if (Auth::user()->role == "admin")
                            <td class="border border-gray-200 px-4 py-2 flex gap-2 justify-center">
                                <a href="{{ route('students.edit', $student->id) }}" class="bg-yellow-600 rounded-lg p-2 text-white">
                                    <i class="ri-edit-line"></i> Edit
                                </a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-black rounded-lg p-2 text-white" onclick="return confirm('Data akan dihapus permanen, apakah kamu yakin?')">
                                        <i class="ri-delete-bin-fill"></i> Delete
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="{{ Auth::user()->role == 'admin' ? '6' : '5' }}">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
</div>
@endsection

