@extends('layouts.index')
@section('content')
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6 underline ">Daftar Transaksi</h1>
            <div class="flex flex-wrap mt-6 mx-5">
                <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-plus mr-3"></i> Monthly Reports
                    </p>
                    <div class="p-6 bg-white">
                        <canvas id="chartOne" width="400" height="200"></canvas>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-check mr-3"></i> Resolved Reports
                    </p>
                    <div class="p-6 bg-white">
                        <canvas id="chartTwo" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="w-full overflow-x-hidden border-t flex flex-col">
                <main class="w-full flex-grow p-6">
                    <h1 class="text-3xl text-black pb-5" style="text-decoration: underline">Data Transaksi</h1>
                    <!-- This is an example component -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                        <div class="p-4">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative mt-1 flex">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" id="table-search"
                                    class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search for items">
                            </div>

                        </div>

                        <a href="/create-transaction" class="hover:text-blue-500">
                            <p class="text-md pb-3 flex items-center ml-5 text-green-700 underline">
                                <i class="fa fa-plus mr-3 text-green-700"></i> Tambah Data Transaksi
                            </p>
                        </a>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>

                                    <th scope="col" class="px-6 py-3">
                                        Nama Produk
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Pelanggan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Karyawan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Transaksi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah Transaksi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $item)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">
                                            {{ $item->pName }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->cName }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->uName }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->date }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @currency($item->total)
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->phone }}
                                        </td>
                                        <form action="{{ route('transaction.edit', ['id' => $item->id]) }}">
                                            <td class="px-6 py-4">
                                                <div class="w-5 transform hover:text-blue-500 hover:scale-110">
                                                    <button type="submit"
                                                        class=" font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                        Ubah
                                                    </button>
                                                </div>
                                            </td>
                                        </form>
                                        <form method="GET"
                                            action="{{ route('transaction.delete', ['id' => $item->id]) }}">
                                            <td class="px-6 py-4">
                                                <div class="w-5 transform hover:text-blue-500 hover:scale-110">
                                                    <button type="submit"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                                        Hapus
                                                    </button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </main>
    </div>
@endsection
