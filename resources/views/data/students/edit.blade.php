@extends('layout.apps')

@section('content')
    <div class="bg-white p-4 rounded-lg">
        <div>
            <h1 class="text-3xl font-semibold">Edit Student</h1>
        </div>

        <form action="{{ route('students.update', $student->id) }}" method="POST" class="grid gap-4 pb-5">
            @csrf
            @method('PUT')

            <div class="mb-3 grid items-center gap-3">
                <label for="rombel_id" class="col-form-label font-semibold">Rombel : </label>
                <div class="w-full">
                    <select class="w-full p-2 rounded-lg bg-gray-100" id="rombel_id" name="rombel_id" required>
                        <option value="">Select Rombel</option>
                        @foreach ($rombels as $rombel)
                            <option value="{{ $rombel->id }}" @if($student->rombel_id == $rombel->id) selected @endif>{{ $rombel->rombel }}</option>
                        @endforeach
                    </select>
                </div>

                <label for="rayon_id" class="col-form-label font-semibold">Rayon : </label>
                <div class="w-full">
                    <select class="w-full p-2 rounded-lg bg-gray-100" id="rayon_id" name="rayon_id" required>
                        <option value="">Select Rayon</option>
                        @foreach ($rayons as $rayon)
                            <option value="{{ $rayon->id }}" @if($student->rayon_id == $rayon->id) selected @endif>{{ $rayon->rayon }}</option>
                        @endforeach
                    </select>
                </div>

                <label for="nis" class="col-form-label font-semibold">NIS : </label>
                <div class="w-full">
                    <input type="text" class="w-full p-1 rounded-lg bg-gray-100" id="nis" name="nis" value="{{ $student->nis }}" required>
                </div>

                <label for="name" class="col-form-label font-semibold">Nama : </label>
                <div class="w-full">
                    <input type="text" class="w-full p-1 rounded-lg bg-gray-100" id="name" name="name" value="{{ $student->name }}" required>
                </div>
            </div>
            <button type="submit" class="p-2 rounded-lg text-white bg-yellow-500">Update Student</button>
        </form>
    </div>
@endsection
