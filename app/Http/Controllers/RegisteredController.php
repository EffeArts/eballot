<?php

namespace App\Http\Controllers;

use App\User;
use App\Registered_voter;
use App\Allowed_voter;
use Illuminate\Http\Request;

class RegisteredController extends Controller
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

    public function home()
    {
        //
        return view('voters/home');
    }


    public function index()
    {
        //
        $voters = Registered_voter::get();
        return view('voters.index')->with('voters', $voters);
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
    public function validator(array $data)
    {
        return Validator::make($data, [
            'regno' => 'required|string|unique:registered_voters',
            'user_id' => 'required|unique:registered_voters',
        ]);
    }
    public function store(Request $request)
    {
        //
        $user_id = $request->input('id');
        $regno = $request->input('regno');
        $allowed = Allowed_voter::where('regno',"=",$regno)->count();
        if($allowed == 1){
            $voter = Registered_voter::create([
                'user_id' => $user_id,
                'regno' => $regno,
                'status' => 0, // 0 means not yet elected, 1 means has already elected
            ]);

            if($voter){
                /* Then also change the role of the user, so that the newly registered voter can have the privileges */

                $user_update = User::where('id', $user_id)
                ->update([
                    'role_id' => 4,
                    'regno' => $regno,
                    'class' => $request->input('class'),
                    'gender' => $request->input('gender'),
                ]);
                if($user_update){
                    return redirect()->route('voter')->with('success', 'You have successfully registered for voting.');
                }

            }
            return back()->withInput()->with('danger', 'Cannot register for voting.');
        }
        else{
            return back()->withInput()->with('danger', 'Cannot register for voting, since you are not allowed to. Please, consult the elections administration.');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Registered_voter  $registered_voter
     * @return \Illuminate\Http\Response
     */
    public function show(Registered_voter $registered_voter)
    {
        //
        $voter = Registered_voter::find($registered_voter->id);
        return view('voters.show', ['voter' => $voter]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registered_voter  $registered_voter
     * @return \Illuminate\Http\Response
     */
    public function edit(Registered_voter $registered_voter)
    {
        //
        $voter = Registered_voter::find($registered_voter->id);
        return view('voters.edit', ['voter' =>$voter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registered_voter  $registered_voter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registered_voter $registered_voter)
    {
        // Check if the registration number is allowed to to vote
        $regno = $request->input('regno');
        $allowed = Allowed_voter::where('regno',"=",$regno)->count();

        //Then allow the update process to happen
        if($allowed == 1){
            $voter_update = Registered_voter::where('id', $registered_voter->id)
            ->update([
                'fname' => $request->input('fname'),
                'lname' => $request->input('lname'),
                'regno' => $regno,
                'gender' => $request->input('gender'),
                'class' => $request->input('class'),
            ]);
            if($voter_update)
            {
                return redirect()->route('registered_voters.index')->with('success', 'Registered voter updated successfully');
            }
            return back()->withInput()->with('danger', 'Registered voter could not be updated');
        }

        else{
            return back()->withInput()->with('danger', 'The registration number provided isn\'t allowed to vote.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registered_voter  $registered_voter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registered_voter $registered_voter)
    {
        //
        $user_id = Registered_voter::where('id', $registered_voter->id)->value('user_id');
        $voter = Registered_voter::find($registered_voter->id);

        if($voter -> delete()){
            $user_update = User::where('id', $user_id)
            ->update([
                'role_id' => 5,
                'regno' => NULL,
            ]);
            if($user_update){
               return redirect()->route('registered_voters.index')->with('success', 'Voter successfully unregistered');
           }

       }
       return back()->withInput()->with('danger', 'Voter could not be unregistered.');
   }
}
