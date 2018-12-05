<?php

namespace App\Http\Controllers;

use App\Personnel;
use App\Building;
use Illuminate\Http\Request;
use Auth;
use Session;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
        $user = Auth::user();
        $personnels = Personnel::all();
        return view('personnels.dashboard')->with('personnels', $personnels)->with('user', $user);
    }

    public function index()
    {
        $buildings = Building::all();
        $personnels = Personnel::all();
        return view('personnels.index')->with('personnels' , $personnels)->with('buildings', $buildings);
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
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'username' => 'required|max:255',
            'building' => 'max:255'
        ]);
        $personnel = New personnel;
        
        $personnel->name = $request->name;
        $personnel->position = $request->position;
        $personnel->username = $request->username;
        $personnel->building_id = $request->building;
        $personnel->status = $request->has('status');
        $personnel->password = bcrypt($request->username);
        $personnel->save();
        Session::flash('success', 'Building has been added.');
        return redirect()->route('personnel.index');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function show(Personnel $personnel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function edit(Personnel $personnel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnel $personnel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personnel $personnel)
    {
        //
    }
}
