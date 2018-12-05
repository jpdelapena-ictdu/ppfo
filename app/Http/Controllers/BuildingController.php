<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;
use Session;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::all();
        return view('buildings.index')
            ->with('buildings', $buildings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'bldg_name' => 'required|max:255',
            'bldg_shortname' => 'required|max:255'
        ]);

        $building = New Building;
        
        $building->bldg_name = $request->bldg_name;
        $building->bldg_shortname = $request->bldg_shortname;
        $building->save();

        Session::flash('success', 'Building has been added.');
        return redirect()->route('building.index');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        $this->validate($request, [
            'editedname' => 'required|max:255',
            'editedshortname' => 'required|max:255'
        ]);

        $building = Building::find($id);
        $building->bldg_name = $request->editedname;
        $building->bldg_shortname = $request->editedshortname;
        $building->save();
        Session::flash('success', 'Building has been changed');
        return redirect()->route('building.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        //
    }
}
