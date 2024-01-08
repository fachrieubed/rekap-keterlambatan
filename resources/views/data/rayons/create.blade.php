@extends('layout.apps')

@section('content')
        <div class="bg-white p-4 rounded-lg grid gap-4" id="overview" role="tabpanel" aria-labelledby="overview">
            <div>
                <h1 class="text-3xl font-semibold">Tambah Rayon</h1>
            </div>
                <form action="{{ route('rayons.store') }}" method="POST">
                @csrf
                    <div class="mb-3 grid items-center gap-3 pb-5">
                        <label for="user_id" class="col-sm-2 col-form-label font-semibold">Pembimbing : </label>
                            <div class="w-full">
                                <select class="w-full p-2 rounded-lg bg-gray-100" id="user_id" name="user_id" required>
                                    <option value="">Select Pembimbing Siswa</option>
                                    @foreach ($pembimbingSiswas as $pembimbingSiswa)
                                    <option value="{{ $pembimbingSiswa->id }}">{{ $pembimbingSiswa->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        <label for="rayon" class="col-sm-2 col-form-label font-semibold">Rayon : </label>
                            <div class="w-full">
                                <input type="text" class="w-full p-1 rounded-lg bg-gray-100" id="rayon" name="rayon">
                            </div>
                    </div>
                    <button type="submit" class="p-2 rounded-lg text-white bg-black">Add Rayon</button>
                </form>
            </div>
        </div>
@endsection
