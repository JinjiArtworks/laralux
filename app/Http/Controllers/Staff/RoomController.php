<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Facilities;
use App\Models\Hotel;
use App\Models\ProductType;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = Room::all();
        $facilities = Facilities::all();
        $room_type = RoomType::all();
        $hotel = Hotel::all();
        return view('staff.room.data-room', compact('room', 'facilities', 'room_type', 'hotel'));
    }
    // Add products
    public function store(Request $request)
    {
        if ($request->image != null) {
            $destinationPath = '/img';
            $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
            Room::create([
                'name' => $request->name,
                'image' => $request->image->getClientOriginalName(),
                'price' => $request->price,
                // 'rating' => $request->rating,
                'status' => $request->status,
                'facilities_id' => $request->facilities,
                'room_type_id' => $request->room_type,
                'hotels_id' => $request->hotels,
            ]);
        }
        return redirect('/data-room');
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $room = Room::find($id);
        if ($request->image != null) {
            $destinationPath = '/img';
            $request->image->move(public_path($destinationPath), $request->image->getClientOriginalName());
        }
        Room::where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'image' => $request->image ? $request->image->getClientOriginalName() : $room->image,
                    'price' => $request->price,
                    // 'rating' => $request->rating,
                    'status' => $request->status,
                    'facilities_id' => $request->facilities ? $request->facilities : $room->facilities_id,
                    'room_type_id' => $request->room_type ? $request->room_type : $room->room_type_id,
                    'hotels_id' => $request->hotels ? $request->hotels : $room->hotels_id,
                ]
            );
        return redirect('/data-room');
    }
    public function destroy($id)
    {
        Room::where('id', $id)->delete();
        return redirect()->back();
    }
}
