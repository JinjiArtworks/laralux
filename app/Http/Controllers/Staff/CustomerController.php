<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Customers;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('staff.customers.data-customer', compact('users'));
    }
    // Add products

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        $users = User::all();
        // return dd($user, $customers);
        return view('staff.customers.create', compact('customers', 'products', 'users'));
    }
    public function store(Request $request)
    {
        $product = Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        return redirect('/data-customer');
    }
    public function edit($id)
    {
        $users = User::find($id);
        return view('staff.customers.edit', compact('users'));
    }
    public function update(Request $request, $id)
    {
        User::where('id', $id)
            ->update(
                [
                    'membership' => $request->membership,
                ]
            );
        return redirect('/data-customer');
    }
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back();
    }
}
