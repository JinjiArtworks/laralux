<?php

namespace App\Http\Controllers\Customers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->courier);
        $user = Auth::user()->id;
        $point = Auth::user()->point;
        $cart = session()->get('cart');
        // return dd($cart);
        return view('customer.checkout',  compact('cart', 'point'));
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $cart = session()->get('cart');
        $orders = new Order();
        $orders->date = Carbon::now();
        $orders->total = $request->grandTotal;
        $orders->user_id = $user->id;
        $orders->status = 'Sedang Diproses';
        $saved =  $orders->save();
        // dd($user->point);
        // $user = User::find($user->id);
        // dd($request->all());

        // $getMaxPoint = round($request->total/100000); 
        // if ($request->redemption == "Yes" && $user->point >= $getMaxPoint)
        // {
        //     $usedPoint = $user->point - $getMaxPoint;
        //     ($request->total - ($usedPoint * 100000)) + 100000;
        // } else {
        //     if ($request->total >= 100000) {
        //         $getPoint = round($request->total / 100000);
        //         // dd($getPoint);
        //         User::where('id', $user->id)
        //             ->update(
        //                 [
        //                     'point' => $user->point + $getPoint,
        //                     'membership' => 'Active'
        //                 ]
        //             );
        //     } else {
        //         $getPoint = 0;
        //         User::where('id', $user->id)
        //             ->update(
        //                 [
        //                     'point' => $user->point + $getPoint,
        //                     'membership' => 'Active'
        //                 ]
        //             );
        //     }
        // }`


        if ($request->total >= 100000) {
            $getPoint = round($request->total / 100000);
            // dd($getPoint);
            User::where('id', $user->id)
                ->update(
                    [
                        'point' => $user->point + $getPoint,
                        'membership' => 'Active'
                    ]
                );
        } else {
            $getPoint = 0;
            User::where('id', $user->id)
                ->update(
                    [
                        'point' => $user->point + $getPoint,
                        'membership' => 'Active'
                    ]
                );
        }
        foreach ($cart as $item) {
            $details = new OrderDetail();
            $details->product_id = $item['id'];
            $details->order_id = $orders->id;
            $details->name = $user->name;
            $details->alamat = $user->address;
            $details->phone = $user->phone;
            $details->quantity = $item['quantity'];
            $details->price = $item['price'] * $item['quantity'];
            $details->save();
            $product = Product::find($item['id']);
            $product::where('id', $item['id'])
                ->update(
                    [
                        'stock' => $product["stock"] - $item["quantity"],
                    ]
                );
        }

        if (!$saved) {
            return redirect('/')->with('warning', 'Silahkan Menyelesaikan Pembayaran');
        } else {
            session()->forget('cart');
            return redirect('/shop')->with('success', 'Produk berhasil di order');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
