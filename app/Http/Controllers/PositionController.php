<?php

namespace App\Http\Controllers;

use App\Position;
use App\Candidate;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $positions = Position::with('candidates')->get();
        return view('positions.index')->with('positions', $positions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('positions.create');
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $position = Position::create([
            'name' => $request->input('name'),
            'criteria' => $request->input('criteria'),
        ]);

        if($position){
            return redirect()->route('positions.index')->with('success', 'New position has been successfully created.');
        }
        return back()->withInput()->with('danger', 'Error adding a new position');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        //
        $position = Position::find($position->id);
        return view('positions.edit', ['position' =>$position]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        //
        $position_update = Position::where('id', $position->id)
        ->update([
            'name' => $request->input('name'),
            'criteria' => $request->input('criteria')
        ]);
        if($position)
        {
            return redirect()->route('positions.index')->with('success', 'Position updated successfully');
        }
        return back()->withInput()->with('danger', 'Position could not be updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //
        $candidates = Candidate::where('position_id', $position->id)->count();
        // dd($candidates);
        if($candidates == 0){
            if($position -> delete()){
                return redirect()->route('positions.index')->with('success', 'Position deleted successfully');
            }
            return back()->withInput()->with('danger', 'Position could not be deleted');
        }

        else
        {
            if($candidates == 1)
            {
             return back()->withInput()->with('danger', 'You should first delete  '.$candidates .' candidate who is contesting for this position, then delete it.');
            }
            else{
                return back()->withInput()->with('danger', 'You should first delete all '.$candidates .' candidates who are contesting for this position, then delete it.');
            }
        }
        
    }
}
