<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        $jeniss = Jenis::all();
        return view('staff.jenis.data-jenis', compact('jeniss'));
    }

    public function create()
    {
        return view('staff.jenis.create');
    }

    public function store(Request $request)
    {
        Jenis::create([
            'name' => $request->name,
        ]);
        return redirect('/data-jenis');
    }

    public function edit($id)
    {
        $jeniss = Jenis::find($id);
        return view('staff.jenis.edit', compact('jeniss'));
    }

    public function update(Request $request, $id)
    {
        Jenis::where('id', $id)->update(
                [
                    'name' => $request->name,
                ]
            );
        return redirect('/data-jenis');
    }
    
    public function destroy($id)
    {
        Jenis::where('id', $id)->delete();
        return redirect()->back();
    }
}
