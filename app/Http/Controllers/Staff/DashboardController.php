<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Jenis;
use App\Models\Product;
use App\Models\Tipe;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('staff.products.data-product', compact('product'));
    }
    // Add products

    public function create()
    {
        $product = Product::all();
        $jenis = Jenis::all();
        $categories = Categories::all();
        $tipe = Tipe::all();
        return view('staff.products.create', compact('product', 'jenis', 'categories', 'tipe'));
    }
    public function store(Request $request)
    {
        if ($request->gambar != null) {
            $destinationPath = '/img';
            $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
            $product = Product::create([
                'name' => $request->name,
                'image' => $request->image->getClientOriginalName(),
                'dimension' => $request->dimension,
                'brand' => $request->brand,
                'categories_id' => $request->categories,
                'jenis_id' => $request->jenis,
                'tipe_id' => $request->tipe,
                'stock' => $request->stock,
                'price' => $request->price,
            ]);
        }
        return redirect('/data-product');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $jenis = Jenis::all();
        $categories = Categories::all();
        $tipe = Tipe::all();
        return view('staff.products.edit', compact('product', 'jenis', 'categories', 'tipe'));
    }
    public function update(Request $request, $id)
    {
        $destinationPath = '/img';
        $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
        Product::where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'image' => $request->image->getClientOriginalName(),
                    'dimension' => $request->dimension,
                    'brand' => $request->brand,
                    'categories_id' => $request->categories,
                    'jenis_id' => $request->jenis,
                    'tipe_id' => $request->tipe,
                    'stock' => $request->stock,
                    'price' => $request->price,
                ]
            );
        return redirect('/data-product');
    }
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back();
    }
}
