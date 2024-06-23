@extends('layouts.customer')
@section('content')
    @php
        $total = 0;
        $tax = 0.11;
        if ($cart != null) {
            foreach ($cart as $key => $value) {
                $total += $value['price'];
            }
            $afterTax = $total * $tax;
            $grandTotal = $total + $afterTax;
        }
    @endphp
    <!-- wrapper -->
    <div class="container py-4">

        <form method="POST" action="{{ route('checkout.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $grandTotal }}" name="grandTotal">
            <input type="hidden" value="{{ $tax }}" name="total_ppn">
            <input type="hidden" value="{{ $total }}" name="sub_total">
            <div class="container grid grid-cols-12 items-start pb-16 pt-4 gap-6">
                <div class="col-span-12 border border-gray-200 p-4 rounded">
                    <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">Order summary</h4>
                    @foreach ($cart as $key => $c)
                        <div class="space-y-2 mt-5">
                            <div class="flex justify-between">
                                <div>
                                    <img src="{{ asset('img/' . $c['image']) }}" width="100px" alt="">
                                    <h5 class="text-gray-800 font-medium">{{ $c['name'] }}</h5>
                                </div>
                                <div class="">
                                    <p class="text-gray-500 text-sm">@currency($c['price'])</p>
                                </div>
                            </div>
                    @endforeach

                    <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                        <p>Subtotal</p>
                        <p>@currency($total)</p>
                    </div>

                    <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                        <p>Redemption</p>
                        <select name="point" id="">
                            <option value="Yes">Pakai Point</option>
                            <option value="No">Tidak Pakai Point</option>
                        </select>

                    </div>
                    <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                        <p>Tax</p>
                        <p>@currency($afterTax) (11%)</p>
                    </div>

                    <div class="flex justify-between text-gray-800 font-medium py-3 uppercas">
                        <p class="font-semibold">Total</p>
                        <p>@currency($grandTotal)</p>
                    </div>

                    <button type="submit"
                        class="block w-full py-3 px-4 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition font-medium">
                        Checkout</button>
                </div>
            </div>
        </form>
    </div>
@endsection
