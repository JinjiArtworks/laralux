<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('staff.category.data-category', compact('categories'));
    }

    public function create()
    {
        return view('staff.category.create');
    }

    public function store(Request $request)
    {
        Categories::create([
            'name' => $request->name,
        ]);
        return redirect('/data-category');
    }

    public function edit($id)
    {
        $categories = Categories::find($id);
        return view('staff.category.edit', compact('categories'));
    }
    public function update(Request $request, $id)
    {
        Categories::where('id', $id)->update(
            [
                'name' => $request->name,
            ]
        );
        return redirect('/data-category');
    }
    public function destroy($id)
    {
        Categories::where('id', $id)->delete();
        return redirect()->back();
    }
}
