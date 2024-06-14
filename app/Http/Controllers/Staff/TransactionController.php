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

class TransactionController extends Controller
{
   
    public function index()
    {
        
        // $transaction = Transaction::all();
        $transaction = Transaction::select(
            'transactions.id',
            'transactions.customers_id',
            'transactions.products_id',
            'transactions.users_id',
            'transactions.date',
            'transactions.total',
            'customers.name as cName',
            'products.name as pName',
            'users.name as uName',
        )->join('customers', 'customers.id', '=', 'transactions.customers_id')
            ->join('products', 'products.id', '=', 'transactions.products_id')
            ->join('users', 'users.id', '=', 'transactions.users_id')->get();
        // return dd($transaction);
        // $tr = Transaction::find('customers_id');
        // return dd($tr);
        return view('staff.transaction.data-transaction', compact('transaction'));
    }
    // Add products

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        $users = User::all();
        // return dd($user, $customers);
        return view('staff.transaction.create', compact('customers', 'products', 'users'));
    }
    public function store(Request $request)
    {
        $product = Transaction::create([
            'customers_id' => $request->name,
            'products_id' => $request->product,
            'users_id' => $request->users,
            'date' => $request->date,
            'total' => $request->total,
        ]);
        return redirect('/data-transaction');
    }
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        $customers = Customer::all();
        $products = Product::all();
        $users = User::all();
        return view('staff.transaction.edit', compact('transaction','customers','products','users'));
    }
    public function update(Request $request, $id)
    {
        Transaction::where('id', $id)
            ->update(
                [
                    'customers_id' => $request->name,
                    'products_id' => $request->product,
                    'users_id' => $request->users,
                    'date' => $request->date,
                    'total' => $request->total,
                ]
            );
        return redirect('/data-transaction');
    }
    public function destroy($id)
    {
        Transaction::where('id', $id)->delete();
        return redirect()->back();
    }
}
