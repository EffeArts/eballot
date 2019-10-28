<?php

namespace App\Http\Controllers;

use App\Allowed_voter;
use App\Registered_voter;
use App\User;
use App\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AllowedController extends Controller
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
        $voters = Allowed_voter::get();
        return view('allowedVoters.index')->with('voters', $voters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('allowedVoters.create');
        
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
        $request->validate([
            'regno' => 'unique:allowed_voters',
        ]);

        $voter = Allowed_voter::create([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'regno' => $request->input('regno'),
        ]);

        if($voter){
            return redirect()->route('allowed_voters.index')->with('success', 'Voter added Successfully');
        }
        return back()->withInput()->with('danger', 'Error adding a new voter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Allowed_voter  $allowed_voter
     * @return \Illuminate\Http\Response
     */
    public function show(Allowed_voter $allowed_voter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Allowed_voter  $allowed_voter
     * @return \Illuminate\Http\Response
     */
    public function edit(Allowed_voter $allowed_voter)
    {
        //
        $voter = Allowed_voter::find($allowed_voter->id);
        return view('allowedVoters.edit', ['voter' =>$voter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Allowed_voter  $allowed_voter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allowed_voter $allowed_voter)
    {
        //
        $voter_update = Allowed_voter::where('id', $allowed_voter->id)
        ->update([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'regno' => $request->input('regno')
        ]);
        if($voter_update)
        {
            return redirect()->route('allowed_voters.index')->with('success', 'Voter updated successfully');
        }
        return back()->withInput()->with('danger', 'Voter could not be updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Allowed_voter  $allowed_voter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allowed_voter $allowed_voter)
    {
        /* first and foremost it cahecks if there is any registered voter under the same
           regno so that it first delete his/her registration, before removing that regno
           among the allowed voters
        */

           $registered = Registered_voter::where('regno', $allowed_voter->regno)->count();
           if($registered == 0){
            // if there is no registration under that regno, then it is deleted from the allowed

            if($allowed_voter -> delete()){
                return redirect()->route('allowed_voters.index')->with('success', 'Voter deleted successfully');
            }
            return back()->withInput()->with('danger', 'Voter could not be deleted');
        }

        else
        {
            /* if there is a registration under that specific regno, it should also first check if there 
                is no candidate under the same regno.
            */

                $candidate = Candidate::where('regno', $allowed_voter->regno)->count();

                if($candidate == 1)
                {
                // If there is a candidate under that specific regno, he/she is deleted.
                    $delete_candidate = Candidate::where('regno', $allowed_voter->regno)->first();
                    if($delete_candidate -> delete()){
                        /* After deleting the specific candidate, even the registration should also be
                            deleted
                        */
                            $user_id = Registered_voter::where('regno', $allowed_voter->regno)->value('user_id');
                            $delete_registered = Registered_voter::where('regno', $allowed_voter->regno)->first();
                            if($delete_registered -> delete()){

                                //Then the users role is update to a simple visitor

                                $user_update = User::where('id', $user_id)
                                ->update([
                                    'role_id' => 5,
                                    'regno' => NULL,
                                ]);

                                // Then the allowed voter is deleted

                                if($allowed_voter -> delete()){
                                    return redirect()->route('allowed_voters.index')->with('success', 'Voter deleted successfully');
                                }
                                return back()->withInput()->with('danger', 'Voter could not be deleted');
                            }

                        }
                    }

                    else
                    {
                        // If there is no candidate, then it proceds to delete the registration

                        $user_id = Registered_voter::where('regno', $allowed_voter->regno)->value('user_id');
                        $delete_registered = Registered_voter::where('regno', $allowed_voter->regno)->first();
                        if($delete_registered -> delete()){

                        //Then the users role is update to a simple visitor

                            $user_update = User::where('id', $user_id)
                            ->update([
                                'role_id' => 5,
                                'regno' => NULL,
                            ]);

                        // Then the allowed voter is deleted

                            if($allowed_voter -> delete()){
                                return redirect()->route('allowed_voters.index')->with('success', 'Voter deleted successfully');
                            }
                            return back()->withInput()->with('danger', 'Voter could not be deleted');
                        }
                    }


                }

            }
        }
