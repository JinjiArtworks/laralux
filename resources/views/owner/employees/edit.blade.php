@extends('layouts.index')
@section('content')
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-2" style="text-decoration: underline">Edit Data Karyawan</h1>
            <div class="flex flex-wrap">
                <div class="w-full lg:w-12/12 my-6 pr-0 lg:pr-2">
                    <div class="leading-loose">
                        <form class="p-10 bg-white rounded shadow-xl" method="POST"
                            action="{{ route('employees.update', ['id' => $employees->id]) }}">
                            @csrf
                            {{ method_field('put') }}
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="username">Username </label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="username"
                                    name="username" type="text" required placeholder="Username"
                                    value="{{ $employees->username }}" aria-label="username">
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="password">Password </label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="password"
                                    name="password" type="text" required placeholder="Password"
                                    value="{{ $employees->password }}" aria-label="password">
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="name">Nama Karyawan </label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="name"
                                    name="name" type="text" required placeholder="Nama Karyawan"
                                    value="{{ $employees->name }}" aria-label="name">
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="role">Jabatan </label>
                                <select class="w-full px-5 py-5 text-gray-700 bg-gray-200 rounded" id="role"
                                    name="role" type="text" required placeholder="Nama Karyawan" aria-label="role">
                                    <option value="{{ $employees->role }}">Staff</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="address">Alamat </label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="address"
                                    name="address" type="text" required placeholder="Alamat Karyawan "
                                    aria-label="address" value="{{ $employees->address }}">
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="email">Nomor Handphone </label>
                                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="phone"
                                    name="phone" required value="{{ $employees->phone }}" type="number"
                                    placeholder="Nomor Handphone" aria-label="phone">
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
