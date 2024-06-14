@extends('layouts.index')
@section('content')
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-2" style="text-decoration: underline">Tambah Data Tipe</h1>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-12/12 my-6 pr-0 lg:pr-2">
                    <div class="leading-loose">
                        <form class="p-10 bg-white rounded shadow-xl" method="POST" action="/store-tipe">
                            @csrf
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="name">Nama Tipe </label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="name"
                                    name="name" type="text" required placeholder="Nama Tipe "
                                    aria-label="name">
                            </div>
                            <div class="mt-6">
                                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                                    type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </main>
    </div>
@endsection