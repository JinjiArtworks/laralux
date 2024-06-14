<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Models\Tipe;
use Illuminate\Http\Request;

class TipeController extends Controller
{
    public function index()
    {
        $tipe = Tipe::all();
        return view('staff.jenis.data-jenis', compact('tipe'));
    }

    public function create()
    {
        return view('staff.jenis.create');
    }

    public function store(Request $request)
    {
        Tipe::create([
            'name' => $request->name,
        ]);
        return redirect('/data-jenis');
    }

    public function edit($id)
    {
        $tipe = Tipe::find($id);
        return view('staff.jenis.edit', compact('tipe'));
    }

    public function update(Request $request, $id)
    {
        Tipe::where('id', $id)->update(
                [
                    'name' => $request->name,
                ]
            );
        return redirect('/data-jenis');
    }
    
    public function destroy($id)
    {
        Tipe::where('id', $id)->delete();
        return redirect()->back();
    }
}
