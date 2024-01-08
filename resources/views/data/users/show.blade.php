
@extends('layout.apps')

@section('content')
<div class="p-2 grid items-center rounded-lg gap-3">
    <div class="justify-between gap-2 flex">
        <h1 class="text-2xl lg:text-3xl font-semibold text-yellow-500 pb-3">
            <span style="border-bottom: 2px solid black;"><span>Data User</span></span>
        </h1>
        <div class="text-left">
            @if (Auth::user()->role == "admin")
            <a href="{{ route('users.create') }}" class="bg-gray-900 text-white p-2 rounded-lg">
                Tambah Data
            </a>
            @endif
        </div>
    </div>
    <div class="table-responsive mt-1 overflow-x-auto">
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="text-center">
                    <th class="border border-gray-200 px-4 py-2">No.</th>
                    <th class="border border-gray-200 px-4 py-2">Nama</th>
                    <th class="border border-gray-200 px-4 py-2">Email</th>
                    <th class="border border-gray-200 px-4 py-2">Role</th>
                    <th class="border border-gray-200 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @forelse ($users as $user)
                    <tr class="text-center">
                        <td class="border border-gray-200 px-4 py-2">{{ $i++ }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $user->name }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $user->email }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $user->role }}</td>
                        <td class="border border-gray-200 px-4 py-2 flex gap-2 justify-center">
                            <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-600 rounded-lg p-2 text-white">
                                <i class="ri-edit-line"></i> Edit
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
                        <td class="text-center border-b" colspan="5">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>    
</div>
@endsection


