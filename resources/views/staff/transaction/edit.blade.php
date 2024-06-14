@extends('layouts.index')
@section('content')
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-2" style="text-decoration: underline">Edit Transaction</h1>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-12/12 my-6 pr-0 lg:pr-2">
                    <div class="leading-loose">
                        <form class="p-10 bg-white rounded shadow-xl" method="POST"
                            action="{{ route('transaction.update', ['id' => $transaction->id]) }}">
                            @csrf
                            {{ method_field('put') }}
                            <div class="">
                                <label class="block text-sm text-gray-600" for="product">Nama Produk</label>
                                <select class="w-full px-5 py-5 text-gray-700 bg-gray-200 rounded" id="product"
                                    name="product" type="text" required placeholder="Nama Pelanggan"
                                    aria-label="Product">
                                    @foreach ($products as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="users">Nama Karyawan</label>
                                <select class="w-full px-5 py-5 text-gray-700 bg-gray-200 rounded" id="users"
                                    name="users" type="text" required placeholder="Nama Pelanggan" aria-label="Users">
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="name">Nama Pelanggan</label>
                                <select class="w-full px-5 py-5 text-gray-700 bg-gray-200 rounded" id="name"
                                    name="name" type="text" required placeholder="Nama Pelanggan" aria-label="Name">
                                    @foreach ($customers as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="date">Tanggal Transaksi</label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="date"
                                    name="date" type="date" required placeholder="Tanggal Transaksi" aria-label="date"
                                    value="{{ $transaction->date }}">
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="email">Jumlah Transaksi</label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="total"
                                    name="total" required type="number" placeholder="Harga Produk" aria-label="total"
                                    value="{{ $transaction->total }}">
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
