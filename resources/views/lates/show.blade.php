@extends('layout.apps')

@section('content')
<div class="p-2 grid items-center rounded-lg gap-3">
    <h1 class="text-2xl lg:text-3xl font-semibold">
        <span class="text-gray-200" style="border-bottom: 1px solid;"><span class="text-black">Data Keterlambatan</span></span>
    </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="col-span-full md:col-span-2">
                <div class="card card-rounded overflow-x-auto">
                    <div class="card-body" x-data="{ activeTab: 'alldata' }">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                            <ul class="flex space-x-4 mb-4 md:mb-0">
                                <li>
                                    <a class="cursor-pointer px-4 py-2 text-sm md:text-md lg:text-md"
                                        id="alldata-tab" @click="activeTab = 'alldata'"
                                        :class="{ 'border-b-2 border-yellow-600': activeTab === 'alldata' }">Keseluruhan Data</a>
                                </li>
                                <li>
                                    <a class="cursor-pointer px-4 py-2 text-sm md:text-md lg:text-md" id="rekapdata-tab" @click="activeTab = 'rekapdata'"
                                        :class="{ 'border-b-2 border-yellow-600': activeTab === 'rekapdata' }">Rekapitulasi Data</a>
                                </li>
                            </ul>
                            @if (Auth::user()->role == "ps")
                            <div class="mb-4 md:mb-0">
                                <h4 class="font-semibold">Data Keterlambatan</h4>
                            </div>
                            @endif

                            @if (Auth::user()->role == "admin")
                            <div class="mb-4 md:mb-0">
                                <h4 class="font-semibold">Data Keterlambatan</h4>
                            </div>

                            <div class="flex space-x-2">
                                <a href="{{ route('lates.create') }}"
                                    class="p-3 bg-yellow-500 btn-lg text-white rounded-lg">
                                    <i class="mdi mdi-account-plus"></i> Tambah Data
                                </a>
                                <a href="{{ route('lates.export') }}"
                                    class="p-3 bg-black btn-lg text-white rounded-lg" id="exportDataBtn">
                                    <i class="mdi mdi-file-download"></i> Export Data Keterlambatan
                                </a>
                            </div>
                            @endif
                        </div>
                
                        <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="alldata" role="tabpanel" aria-labelledby="alldata-tab"
                                x-show="activeTab === 'alldata'" x-cloak>
                                <div class="table-responsive overflow-x-auto">
                                    <!-- Display the table for 'Keseluruhan Data' -->
                                    <table class="w-full lg:w-full md:w-auto border-collapse text-left">
                                        <!-- Table header -->
                                        <thead>
                                            <tr class="text-center">
                                                <th class="border border-gray-200 px-4 py-2">No.</th>
                                                <th class="border border-gray-200 px-4 py-2">Nama Siswa</th>
                                                <th class="border border-gray-200 px-4 py-2">Tanggal & Waktu</th>
                                                <th class="border border-gray-200 px-4 py-2">Informasi</th>
                                                @if (Auth::user()->role == "admin")
                                                    <th class="border border-gray-200 px-4 py-2">Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <!-- Table body -->
                                        <tbody>
                                            @php
                                            $i = 1;
                                            @endphp
                                            <!-- Loop through 'Keseluruhan Data' -->
                                            @forelse ($lates as $late)
                                            <tr class="text-center">
                                                <td class="border border-gray-200 px-4 py-2">{{ $i++ }}</td>
                                                <td class="border border-gray-200 px-4 py-2">{{ $late->name }}</td>
                                                <td class="border border-gray-200 px-4 py-2">{{ $late->date_time_late }}</td>
                                                <td class="border border-gray-200 px-4 py-2">{{ $late->information }}</td>
                                                @if (Auth::user()->role == "admin")
                                                <td class="border border-gray-200 px-4 py-2 flex gap-3 justify-center">
                                                    <a href="{{ route('lates.edit', $late->id) }}"
                                                        class="p-2 rounded-lg bg-yellow-600 text-white">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('lates.destroy', $late->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="p-2 rounded-lg bg-black text-white"
                                                            onclick="return confirm('Data akan dihapus permanen, apakah kamu yakin?')">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                                @endif
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
                
                            <div class="tab-pane fade" id="rekapdata" role="tabpanel" aria-labelledby="rekapdata-tab"
                                x-show="activeTab === 'rekapdata'" x-cloak>
                                <div class="table-responsive overflow-x-auto">
                                    <!-- Display the table for 'Rekapitulasi Data' -->
                                    <table class="w-full lg:w-full md:w-auto table select-table">
                                        <!-- Table header -->
                                        <thead>
                                            <tr class="text-center">
                                                <th class="border border-gray-200 px-4 py-2">No.</th>
                                                <th class="border border-gray-200 px-4 py-2">Nama Siswa</th>
                                                <th class="border border-gray-200 px-4 py-2">Jumlah Keterlambatan</th>
                                                <th class="border border-gray-200 px-4 py-2">Action</th>
                                            </tr>
                                        </thead>
                                        <!-- Table body -->
                                        <tbody>
                                            <!-- Loop through 'Rekapitulasi Data' -->
                                            @foreach ($rekapitulasi as $item)
                                            <tr class="text-center">
                                                <td class="border border-gray-200 px-4 py-2">{{ $loop->iteration }}</td>
                                                <td class="border border-gray-200 px-4 py-2">{{ $item['name'] }}</td>
                                                <td class="border border-gray-200 px-4 py-2">{{ $item['jumlah_keterlambatan'] }}</td>
                                                <td class="border border-gray-200 px-4 py-2 flex gap-3 justify-center">
                                                    @if ($item['jumlah_keterlambatan'] >= 3)
                                                    <a href="{{ route('lates.detail', ['name' => $item['name']]) }}"
                                                        class="p-2 rounded-lg bg-yellow-500 text-white">
                                                        <i class="fas fa-info"></i> Detail Data
                                                    </a>
                                                    <a href="{{ route('lates.cetak-surat', ['id' => $item['id']]) }}"
                                                        class="p-2 rounded-lg bg-black text-white">
                                                        <i class="fas fa-file-alt"></i> Cetak Surat Pernyataan
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
</div>

@endsection


{{-- @push('scripts')
    <script>
        document.getElementById('exportDataBtn').addEventListener('click', function () {
            // Add your export logic here
            alert('Exporting Data Keterlambatan...');
        });
    </script>
@endpush --}}
