<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;
use App\User;
use App\Candidate;
use Image;
use App\Position;
use App\Allowed_voter;
use App\Registered_voter;
use App\Role;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
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
    public function store(Request $request, $user)
    {
        //
        $positions = Position::get()->pluck('id');
        $candidates = Candidate::get()->pluck('id');
        $total = Position::get()->count();
        $submittedArray = $request->all();
        foreach ($positions as $position) {

            foreach ($candidates as $candidate) {
                if($candidate == $request->input($position)){
                    $votee[] = array($candidate);
                // this part is for adding a vote to each voted candidate
                    $candidate_update = Candidate::where('id', $candidate)->increment('votes',1);

                // Recording each casted vote
                    $vote = Vote::create([
                        'voter' => $user,
                        'candidate' => $candidate,
                    ]);

                }
            }// closing foreach($candidate)
        } // closing foreach($position)

        // Changing the voter's status to one to show that he has already voted
        $user_update = Registered_voter::where('user_id', $user)
        ->update([
            'status' => 1,
        ]);

        return redirect()->route('live_status');
        // return ($submittedArray);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
