<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Absen</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-9pBMrDmxDZOu5Bu6eg1w2eGw8A1fXhP7YO05nd2TNsiNXI6cUzEd8w5iK6ZwKlsyoZ/YuizETl/Efgl2U5r+eg==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
</head>
<body class="bg-gray-200">
    <div class="flex items-center justify-center h-screen p-5 lg:p-10">
        <div class="bg-transparen grid grid-cols-1 lg:grid-cols-12 gap-2 max-w-6xl">
            <div class="bg-white satu rounded-lg lg:col-span-7 py-10">
                <div class="p-5 lg:p-10">
                    <div class="pb-5">
                        <h2 class="text-xl font-semibold">Web <span class="text-yellow-500">Rekapitulasi</span></h2>
                    </div>
                    <div class="pb-10">
                        <h1 class="text-4xl lg:text-6xl font-bold">
                            <span class="border-b border-yellow-500">Rekapi</span><span class="border-b border-black text-yellow-500">Siswa</span>
                        </h1>
                    </div>
                    <div class="pb-10">
                        <p>Selamat datang di Web Rekapitulasi Keterlambatan Siswa, sebuah platform yang dirancang untuk membantu sekolah dan lembaga pendidikan dalam memantau dan menganalisis data keterlambatan siswa.</p>
                    </div>
                </div>
            </div>
            <div class="dua bg-black rounded-lg lg:col-span-5 py-10">
                <div class="p-5 lg:p-10">
                    <div class="p-5">
                        <div class="p-2 rounded-lg">
                            <div class="text-center">
                                <h1 class="text-2xl lg:text-4xl font-semibold text-white">Hello<span class="text-yellow-500">!</span></h1>
                                <p class="font-semibold text-gray-500">Selamat datang di <span class="text-white">Rekapi</span><span class="text-yellow-500">Siswa</span>. Silahkan login terlebih dahulu.</p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto my-8">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="email" class="block text-sm font-medium text-yellow-500">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="mt-1 p-2 w-full border rounded-md @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="text-red-500 text-sm mt-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="block text-sm font-medium text-gray-100">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="mt-1 p-2 w-full border rounded-md @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="text-red-500 text-sm mt-1" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-0">
                                        <button type="submit" class="w-full bg-yellow-500 text-white p-2 rounded-md">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
