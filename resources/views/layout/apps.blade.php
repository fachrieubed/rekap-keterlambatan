
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
<body class="bg-gray-50">

    <!-- Navbar -->
    <div id="navbar" class="fixed top-0 left-[-270px] bg-yellow-500 overflow-x-hidden transition duration-500 ease-in-out pt-0 text-black w-64 h-full z-10 shadow-2xl">


        <div class="flex items-center pt-6 pb-10 mx-4 px-4 justify-between">
            <a href="" class="font-semibold text-3xl"><span class="text-black">Rekapi</span><span class="text-white">Siswa</span></a>

            <!-- Tombol Toggle -->
        </div>


        <div onclick="toggleNavbar()" class="flex items-center py-3 mx-4 px-4 rounded-lg transition duration-300 ease-in-out hover:scale-105 cursor-pointer">
            <i class="ri-home-3-fill text-2xl text-black" style="text-shadow: 2px 2px 4px rgba(225, 225, 225, 1);"></i>
            <a href="{{ route('dashboard') }}" class="ml-4 text-decoration-none text-black font-semibold" style="text-shadow: 2px 2px 4px rgba(225, 225, 225, 1);">Dashboard</a>
        </div>


        <div class="flex items-center py-3 mx-4 px-4 rounded-lg transition duration-300 ease-in-out hover:scale-105" id="navbarToggle">
            <div class="flex w-full items-center">
                <i class="ri-contacts-book-2-fill text-2xl text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);"></i>
                <span class="text-[15px] ml-4 text-white font-semibold" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);">Data Master</span>

            </div>
        </div>


        @if (Auth::check())
            @if (Auth::user()->role == "admin")
                <!-- Sidebar menu for admin -->
                <div class="text-left text-sm mt-2 w-4/5 mx-auto pl-10" id="submenu">
                    <ul>
                        <li class="flex rounded-lg transition duration-300 ease-in-out hover:scale-105 p-3 text-md items-center gap-2">
                            <i class="ri-book-3-fill text-2xl text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);"></i>
                            <a href="{{ route('data.rombel.page') }}" class="text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);">Data Rombel</a>
                        </li>
                        <li class="flex rounded-lg transition duration-300 ease-in-out hover:scale-105 p-3 text-md items-center gap-2">
                            <i class="ri-book-3-fill text-2xl text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);"></i>
                            <a href="{{ route('data.rayon.page') }}" class="text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);">Data Rayon</a>
                        </li>
                        <li class="flex rounded-lg transition duration-300 ease-in-out hover:scale-105 p-3 text-md items-center gap-2">
                            <i class="ri-book-3-fill text-2xl text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);"></i>
                            <a href="{{ route('data.siswa.page') }}" class="text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);">Data Siswa</a>
                        </li>
                        <li class="flex rounded-lg transition duration-300 ease-in-out hover:scale-105 p-3 text-md items-center gap-2">
                            <i class="ri-book-3-fill text-2xl text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);"></i>
                            <a href="{{ route('data.user.page') }}" class="text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);">Data User</a>
                        </li>
                    </ul>
                </div>

                <div onclick="toggleNavbar()" class="flex items-center py-3 mx-4 px-4 rounded-lg transition duration-300 ease-in-out hover:scale-105 cursor-pointer">
                    <i class="ri-bookmark-fill text-2xl text-black" style="text-shadow: 2px 2px 4px rgba(225, 225, 225, 1);"></i>
                    <a href="{{ route('data.keterlambatan.page') }}" class="ml-4 text-decoration-none text-black font-semibold" style="text-shadow: 2px 2px 4px rgba(225, 225, 225, 1);">Data Keterlambatan</a>
                </div>
            @endif

            @if (Auth::user()->role == "ps")
                <!-- Sidebar menu for PS and Admin -->
                <div class="text-left text-sm mt-2 w-4/5 mx-auto pl-10" id="submenu">
                    <ul>
                        <!-- Additional menu items accessible to PS and Admin -->
                        <li class="flex rounded-lg transition duration-300 ease-in-out hover:scale-105 p-3 text-md items-center gap-2">
                            <i class="ri-git-repository-fill text-2xl text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);"></i>
                            <a href="{{ route('data.siswa.page') }}" class="text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);">Data Siswa</a>
                        </li>
                    </ul>
                </div>

                <div onclick="toggleNavbar()" class="flex items-center py-3 mx-4 px-4 rounded-lg transition duration-300 ease-in-out hover:scale-105 cursor-pointer">
                    <i class="ri-bookmark-3-fill text-2xl text-black" style="text-shadow: 2px 2px 4px rgba(225, 225, 225, 1);"></i>
                    <a href="{{ route('data.keterlambatan.page') }}" class="ml-4 text-decoration-none text-black" style="text-shadow: 2px 2px 4px rgba(225, 225, 225, 1);">Data Keterlambatan</a>
                </div>
            @endif

            <!-- Common section for both PS and Admin -->
            <div class="absolute w-full bottom-0 bg-black text-white p-3 flex items-center justify-between shadow-2xl">
                <div id="tanggalHariIni" class="lg:order-2"></div>
            </div>
            
            @endif
    </div>


    <!-- Toggle Button -->

    <div id="header" class="ml-64 p-5 bg-white flex items-center justify-between z-20 shadow-lg">
        <div class="text-right font-semibold">Welcome, <span class="text-yellow-500">{{ Auth::user()->name }}</span></div>
        <div class="flex items-center gap-2">
            <button id="toggleButton" onclick="toggleNavbar()" class="text-black text-2xl bg-transparent border-none mr-4">☰</button>
            <div class="justify-end flex items-center">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    <div class="justify-end">
                        <button type="submit" class=" p-2 rounded-lg text-black font-semibold border bg-yellow-500">Logout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div id="content" class="ml-64 p-8">
        @yield('content')
    </div>

    <style>
        @media (max-width: 768px) {
            #navbar {
                left: 0;
            }

            #content {
                margin-left: 0;
            }

            #header {
                margin-left: 0;
            }
        }
    </style>

<script>
    function getFormattedDate() {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const today = new Date();
            const formattedDate = today.toLocaleDateString('en-US', options);

            // Memisahkan komponen tanggal
            const [weekday, month, day, year] = formattedDate.split(' ');

            // Menggabungkan ulang dengan tata letak yang diinginkan
            const customLayout = `${weekday} ${day} ${month} ${year}`;

            return customLayout;
        }

        document.getElementById('tanggalHariIni').textContent = getFormattedDate();

    function toggleNavbar() {
        const navbar = document.getElementById('navbar');
        const content = document.getElementById('content');
        const header = document.getElementById('header');

        if (navbar.style.left === '-270px') {
            // Sidebar sedang tertutup, buka sidebar
            navbar.style.left = '0';
            content.classList.remove('ml-0');
            content.classList.add('ml-64');
            header.classList.remove('ml-0');
            header.classList.add('ml-64');
        } else {
            // Sidebar sedang terbuka, tutup sidebar
            navbar.style.left = '-270px';
            content.classList.remove('ml-64');
            content.classList.add('ml-0');
            header.classList.remove('ml-64');
            header.classList.add('ml-0');
        }
    }

    const navbarToggle = document.getElementById('navbarToggle');
    const submenu = document.getElementById('submenu');

    navbarToggle.addEventListener('click', () => {
        if (submenu.style.display === 'none') {
            submenu.style.display = 'block';
        } else {
            submenu.style.display = 'none';
        }
    });
</script>


</body>
</html>
