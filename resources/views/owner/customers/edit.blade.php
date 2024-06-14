@extends('layouts.index')
@section('content')
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-2" style="text-decoration: underline">Edit Data Pelanggan</h1>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-12/12 my-6 pr-0 lg:pr-2">
                    <div class="leading-loose">
                        <form class="p-10 bg-white rounded shadow-xl" method="POST"
                            action="{{ route('customers.update', ['id' => $customers->id]) }}">
                            @csrf
                            {{ method_field('put') }}
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="name">Nama Pelanggan</label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="name"
                                    name="name" type="name" required placeholder="Tanggal Transaksi"
                                    aria-label="name" value="{{ $customers->name }}">
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="email">Nomor Handphone</label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="phone"
                                    name="phone" required type="number" placeholder="Harga Produk" aria-label="phone" value="{{ $customers->phone }}">
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

        <footer class="w-full bg-white text-right p-4">
            Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
        </footer>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        image.onchange = evt => {
            const [file] = image.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
