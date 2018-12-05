<?php

namespace App\Http\Controllers;

use App\Room;
use App\Building;
use Illuminate\Http\Request;
use Session;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        $buildings = Building::all();
        return view('rooms.index')->with('rooms' , $rooms)->with('buildings' , $buildings);
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
        $this->validate($request, [
            'building' => 'required|max:255',
            'room' => 'required|max:255',
            'shortname' => 'required|max:255',
            'supervisor' => 'required|max:255'
        ]);

        $room = New Room;
        
        $room->building_id = $request->building;
        $room->room = $request->room;
        $room->shortname = $request->shortname;
        $room->supervisor = $request->supervisor;
        $room->save();

        Session::flash('success', 'Room has been added.');
        return redirect()->route('room.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $this->validate($request, [
            'building' => 'required|max:255',
            'room' => 'required|max:255',
            'shortname' => 'required|max:255',
            'supervisor' => 'required|max:255'
        ]);

        $room = Room::find($id);
        
        $room->building_id = $request->building;
        $room->room = $request->room;
        $room->shortname = $request->shortname;
        $room->supervisor = $request->supervisor;
        $room->save();

        Session::flash('success', 'Room has been Changed.');
        return view('rooms.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
