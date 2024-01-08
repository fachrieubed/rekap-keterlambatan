{{-- @extends('layout.apps')

@section('content')
<div class="tab-content tab-content-basic">
    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
        <div class="row">
            <div class="col-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <div class="col-span-full">
                    <div class="card card-rounded bg-white shadow-md p-6">
                        <h4 class="text-xl font-semibold mb-4">Tambah Data Keterlambatan</h4>

                        <form action="{{ route('lates.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-600">Nama Siswa</label>
                                <input type="text" class="mt-1 p-2 w-full border rounded-md" id="name" name="name" required>
                            </div>

                            <div class="mb-4">
                                <label for="date_time_late" class="block text-sm font-medium text-gray-600">Waktu Keterlambatan</label>
                                <input type="datetime-local" class="mt-1 p-2 w-full border rounded-md" id="date_time_late" name="date_time_late" required>
                            </div>

                            <div class="mb-4">
                                <label for="information" class="block text-sm font-medium text-gray-600">Informasi Keterlambatan</label>
                                <textarea class="mt-1 p-2 w-full border rounded-md" id="information" name="information" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="bukti" class="block text-sm font-medium text-gray-600">Bukti Keterlambatan</label>
                                <input type="file" class="mt-1 p-2 w-full border rounded-md" id="bukti" name="bukti" required accept="image/*">
                            </div>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">
                                Tambah Data Keterlambatan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layout.apps')

@section('content')
<div class="tab-content tab-content-basic">
    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
        <div class="row">
            <div class="col-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <div class="col-span-full">
                    <div class="card card-rounded bg-white shadow-md p-6">
                        <h4 class="text-xl font-semibold mb-4">Tambah Data Keterlambatan</h4>

                        <form action="{{ route('lates.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-600">Nama Siswa</label>
                                <select class="mt-1 p-2 w-full border rounded-md" id="name" name="name" required>
                                    <option value="" disabled selected>Select Nama Siswa</option>
                                    @foreach($siswas as $siswa)
                                        <option value="{{ $siswa->name }}">{{ $siswa->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="date_time_late" class="block text-sm font-medium text-gray-600">Waktu Keterlambatan</label>
                                <input type="datetime-local" class="mt-1 p-2 w-full border rounded-md" id="date_time_late" name="date_time_late" required>
                            </div>

                            <div class="mb-4">
                                <label for="information" class="block text-sm font-medium text-gray-600">Informasi Keterlambatan</label>
                                <textarea class="mt-1 p-2 w-full border rounded-md" id="information" name="information" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="bukti" class="block text-sm font-medium text-gray-600">Bukti Keterlambatan</label>
                                <input type="file" class="mt-1 p-2 w-full border rounded-md" id="bukti" name="bukti" required accept="image/*">
                            </div>

                            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">
                                Tambah Data Keterlambatan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
