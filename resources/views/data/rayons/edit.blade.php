@extends('layout.apps')

@section('content')
    <div class="bg-white p-4 rounded grid gap-4">
                <div>
                    <h4 class="font-semibold text-3xl">Edit Rayon</h4>
                </div>

                    <form action="{{ route('rayons.update', $rayon->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                            <div class="grid gap-2 items-center ">
                                <div class="mb-3 grid items-center gap-3">
                                    <label for="user_id" class="font-semibold">Pembimbing Siswa</label>
                                    <select class="w-full p-2 bg-gray-100 border rounded-lg" id="user_id" name="user_id" required>
                                        @foreach ($pembimbingSiswas as $pembimbingSiswa)
                                            <option value="{{ $pembimbingSiswa->id }}" @if ($pembimbingSiswa->id == $rayon->user_id) selected @endif>
                                                {{ $pembimbingSiswa->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 grid items-center gap-3">
                                    <label for="rayon" class="font-semibold">Rayon</label>
                                    <input type="text" class="w-full p-2 bg-gray-100 border rounded-lg" id="rayon" name="rayon" value="{{ $rayon->rayon }}" required>
                                </div>

                                <div class="justify-end">
                                    <button type="submit" class="bg-yellow-500 p-2 rounded-lg text-white">Update Rayon</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
