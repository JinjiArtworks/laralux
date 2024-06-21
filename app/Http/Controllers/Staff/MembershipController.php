<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\HotelType;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $membership = Membership::with('users')->get();
        return view('staff.membership.data-membership', compact('membership'));
    }
    // Add products
    public function store(Request $request)
    {
        $membership = Membership::create([
            'name' => $request->name,
            'users_id' => $request->users_id,
        ]);
        return response()->json($membership);
    }
    public function show($id)
    {
        $membership = Membership::findOrFail($id);
        return response()->json($membership);
    }
    public function update(Request $request, $id)
    {
        $membership = Membership::findOrFail($id);
        $membership->update($request->all());
        return response()->json($membership);
    }
    public function destroy($id)
    {
        $membership = Membership::findOrFail($id);
        $membership->delete();
        return response()->json(['success' => 'Hotel deleted successfully']);
    }
}
