<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqListController extends Controller
{
    public function index()
    {
        $faq = Faq::all();
        // return dd($faq);
        return view('staff.faq.data-faq', compact('faq'));
    }
    public function store(Request $request)
    {
        $product = Faq::create([
            'answer' => $request->answer,
        ]);
        return redirect('/data-faqs');
    }
    public function edit($id)
    {
        $faqs = Faq::find($id);
        return view('staff.faq.edit', compact('faqs'));
    }
    public function update(Request $request, $id)
    {
        Faq::where('id', $id)
            ->update(
                [
                    'answer' => $request->answer,
                ]
            );
        return redirect('/data-faqs');
    }
    public function destroy($id)
    {
        Faq::where('id', $id)->delete();
        return redirect()->back();
    }
}
