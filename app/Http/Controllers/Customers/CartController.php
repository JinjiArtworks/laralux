<?php

namespace App\Http\Controllers\Customers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $cart = session()->get('cart');
        return view('customer.cart', compact('cart'));
    }
    public function addCart(Request $request, $id)
    {
        $user = Auth::user()->id;
        $product = Product::find($id);
        // return dd($product->dimension);
        $cart = session()->get('cart');
        if (!isset($cart[$id])) {
            // Cart ada isi nya
            $cart[$id] = [
                "user_id" => $user,
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "categories" => $product->categories,
                "dimension" => $product->dimension,
                "tipe" => $product->tipe->name,
                "jenis" => $product->jenis->name,
                "image" => $product->image,
                "quantity" => $request->post('quantity'),
                "total_after_disc" => $product->price  * $request->post('quantity')
            ];
        } else {
            $cart[$id]["quantity"] += $request->post('quantity');
            $cart[$id]["total_after_disc"] += $request->post('quantity') * $product->price;
        }
        session()->put('cart', $cart);
        return redirect('/cart')->with('success', 'Produk berhasil ditambahkan kedalam keranjang');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
