@extends('layouts.index')
@section('content')
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-2" style="text-decoration: underline">Edit Produk</h1>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-12/12 my-6 pr-0 lg:pr-2">
                    <div class="leading-loose">
                        <form class="p-10 bg-white rounded shadow-xl" method="POST"
                            action="{{ route('staff.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('put') }}

                            <div class="">
                                <label class="block text-sm text-gray-600" for="name">Nama Produk</label>
                                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name"
                                    name="name" type="text" required placeholder="Nama Produk" aria-label="Name"
                                    value="{{ $product->name }}">
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="profileImage">Gambar</label>
                                <img src="{{ asset('img/' . $product->image) }}" id="blah" width="150px"
                                    height="150px">
                                <input class="mt-2" accept="image/*" id="image" type="file" name="image"required>
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="brand">Brand</label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="brand"
                                    name="brand" type="text" required placeholder="Brand Produk" aria-label="brand"
                                    value="{{ $product->brand }}">
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="email">Stock</label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="stock"
                                    name="stock" required placeholder="Stock Produk" type="number"
                                    value="{{ $product->stock }}">
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="dimension">Dimension</label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="dimension"
                                    name="dimension" required placeholder="Dimension Produk" type="text"
                                    value=" {{ $product->dimension }}">
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="dimension">Kategori</label>
                                <select class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" name="categories">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="dimension">Jenis</label>
                                <select class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" name="jenis">
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="dimension">Tipe</label>
                                <select class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" name="tipe">
                                    @foreach ($tipe as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="email">Harga</label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="price"
                                    name="price" required type="number" placeholder="Harga Produk"
                                    aria-label="price"value="{{ $product->price }}">
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
