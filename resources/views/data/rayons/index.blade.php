@extends('layout.apps')

@section('content')
<div class="p-2 grid items-center rounded-lg gap-3">
    <div class="justify-between gap-2 flex">
        <h1 class="text-2xl lg:text-3xl font-semibold text-yellow-500 pb-3">
            <span style="border-bottom: 2px solid black;"><span>Data Rayon</span></span>
        </h1>
        <div class="text-left">
            @if (Auth::user()->role == "admin")
            <a href="{{ route('rayons.create') }}" class="bg-gray-900 text-white p-2 rounded-lg">
                Tambah Data
            </a>    
            @endif
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full sm:w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 border border-gray-200 text-center">No.</th>
                    <th class="px-4 py-2 border border-gray-200 text-center">User</th>
                    <th class="px-4 py-2 border border-gray-200 text-center">Rayon</th>
                    <th class="px-4 py-2 border border-gray-200 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rayons as $rayon)
                    <tr>
                        <td class="border border-gray-200 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center">{{ $rayon->pembimbingSiswa->name }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center">{{ $rayon->rayon }}</td>
                        <td class="border border-gray-200 px-4 py-2 flex gap-2 justify-center">
                            <a href="{{ route('rayons.edit', $rayon->id) }}" class="bg-yellow-600 rounded-lg p-2 text-white">
                                <i class="ri-edit-line"></i> Edit
                            </a>
                            <form action="{{ route('rayons.destroy', $rayon->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-black rounded-lg p-2 text-white" onclick="return confirm('Data akan dihapus permanen, apakah kamu yakin?')">
                                    <i class="ri-delete-bin-fill"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center py-2" colspan="4">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>    
    
</div>
@endsection
