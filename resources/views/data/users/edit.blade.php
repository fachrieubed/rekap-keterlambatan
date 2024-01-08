

@extends('layout.apps')

@section('content')
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <h4 class="card-title card-title-dash"></h4>

                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3 grid items-center gap-3">
                                    <label for="name" class="font-semibold">Nama</label>
                                    <input type="text" class="w-full p-2 bg-gray-100 border rounded-lg" id="name" name="name" value="{{ $user->name }}" required>
                                </div>

                                <div class="mb-3 grid items-center gap-3">
                                    <label for="email" class="font-semibold">Email</label>
                                    <input type="text" class="w-full p-2 bg-gray-100 border rounded-lg" id="email" name="email" value="{{ $user->email }}" required>
                                </div>


                                <div class="mb-3 grid items-center gap-3">
                                    <label for="password" class="font-semibold">New Password (Biarkan kosong untuk menyimpan kata sandi yang ada)</label>
                                    <input type="password" class="w-full p-2 bg-gray-100 border rounded-lg" id="password" name="password" value="{{ $user->password }}" required>
                                </div>

                                <label for="role" class="col-sm-2 col-form-label font-semibold">Role : </label>
                                <div class="w-full pb-5">
                                    <select class="w-full p-2 rounded-lg border bg-blue-100" id="role" name="role" required>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="ps" {{ $user->role == 'ps' ? 'selected' : '' }}>PS</option>
                                    </select>
                                </div>


                                <div class="justify-end gap-2">
                                    <button type="submit" class="bg-yellow-500 p-2 rounded-lg text-white">Update User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

