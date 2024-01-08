{{-- resources/views/rombel/create.blade.php --}}

@extends('layout.apps')

@section('content')
        <div class="bg-white p-4 rounded-lg grid gap-4" id="overview" role="tabpanel" aria-labelledby="overview">
            <div>
                <h1 class="text-3xl font-semibold">Tambah Rombel</h1>
            </div>
                <form action="{{ route('rombels.store') }}" method="POST">
                @csrf
                    <div class="mb-3 grid items-center gap-3 pb-5">

                        <label for="rombel" class="col-sm-2 col-form-label font-semibold">Rombel : </label>
                            <div class="w-full">
                                <input type="text" class="w-full p-1 rounded-lg bg-gray-100" id="rombel" name="rombel">
                            </div>
                    </div>
                    <button type="submit" class="p-2 rounded-lg text-white bg-black">Add Rombel</button>
                </form>
            </div>
        </div>
@endsection

