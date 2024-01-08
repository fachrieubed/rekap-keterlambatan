@extends('layout.apps')

@section('content')
    <div class="row">
        <div class="col-span-full grid grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title card-title-dash text-2xl font-semibold">Edit Data Keterlambatan</h4>
                    <form method="post" action="{{ route('lates.update', ['late' => $late->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-600">Nama Siswa</label>
                            <input type="text" class="bg-transparent mt-1 p-2 w-full border rounded-md" id="name" name="name" value="{{ $late->name }}">
                        </div>

                        <div class="mb-4">
                            <label for="date_time_late" class="block text-sm font-medium text-gray-600">Tanggal & Waktu Keterlambatan</label>
                            <input type="datetime-local" class="bg-transparent mt-1 p-2 w-full border rounded-md" id="date_time_late" name="date_time_late" value="{{ \Carbon\Carbon::parse($late->date_time_late)->format('Y-m-d\TH:i') }}">
                        </div>

                        <div class="mb-4">
                            <label for="information" class="block text-sm font-medium text-gray-600">Informasi</label>
                            <textarea class="bg-transparent mt-1 p-2 w-full border rounded-md" id="information" name="information" rows="3">{{ $late->information }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="bukti" class="block text-sm font-medium text-gray-600">Bukti</label>
                            <input type="file" class="custom-file-input bg-transparent mt-1 p-2 w-full border rounded-md" id="bukti" name="bukti">
                            <img src="{{ asset('images/' . $late->bukti) }}" alt="Bukti" class="mt-3 max-w-full" style="max-width: 300px">
                        </div>

                        <button type="submit" class="text-white px-4 py-2 rounded-md" style="background-color: #eee72f;">
                            Update Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-file-input {
            width: 100%;
            overflow: hidden;
        }

        .custom-file-input::file-selector-button {
            background-color: transparent;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            outline: none;
            cursor: pointer;
            color: #0766AD;
            font-weight: 600;
        }
    </style>
@endsection
