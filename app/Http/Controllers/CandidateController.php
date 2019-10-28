<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\User;
use App\Position;
use Illuminate\Http\Request;
use Image;
use App\Registered_voter;

class CandidateController extends Controller
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

    public function home(){
        return view('candidates.home');
    }
    public function index()
    {
        //
        $candidates = Candidate::get();
        return view('candidates.index')->with('candidates', $candidates);
    }

    /**
     * Reply Ajax request for creating a new resource.
     */

    public function check(Request $request)
    {
        $regno = $request->regno;
        $potential_candidate = User::where('regno',$regno)->count();
        if($potential_candidate == 1){
            $potential_candidate = User::where('regno',$regno)->get();
            return response()->json($potential_candidate);
            //return response()->json(['success'=>'Success is yours.']);
        }
        
        else{
            return response()->json(['Fail'=>'Unable to authenticate the user as a legitimate user.']);
        }
        // return response()->json(['success'=>'Data is successfully added']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add(){
        $voters = Registered_voter::get();
        $candidates = Candidate::get();
        return view('candidates.add')->with('voters', $voters)->with('candidates', $candidates);
    }

    public function create()
    {
        $positions = Position::get();
        return view('candidates.create')->with('positions', $positions);
    }

    public function creation(Registered_voter $registered_voter)
    {
        $positions = Position::get();
        $candidate = Registered_voter::find($registered_voter->id);
        return view('candidates.create')->with('positions', $positions)->with('candidate', $candidate);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        
        $user_id = $request->input('user_id');
        $check_existence = Candidate::where('user_id', $user_id)->count();
        if($check_existence > 0){
            return back()->withInput()->with('danger', 'A candidate can not be added more than once.');
        }
        $candidate = Candidate::create([
            'user_id' => $user_id,
            'position_id' => $request->input('position'),
            'votes' => 0,
        ]);

        if($candidate){
            $user_update = User::where('id', $user_id)
            ->update([
                'role_id' => 3,
            ]);

            return redirect()->route('candidates.index')->with('success', 'Candidate added Successfully');
        }
        return back()->withInput()->with('danger', 'Error adding a candidate');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
        $candidate = Candidate::where('id', $candidate->id)->first();
        return view('candidates.show', ['candidate' =>$candidate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit_profile($id){
        $candidate = Candidate::where('user_id', $id)->first();
        return view('candidates.profile', ['candidate' =>$candidate]);
        // dd($candidate);
    }

    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    public function update_profile(Request $request, Candidate $candidate)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
            $candidate_update = Candidate::where('id', $candidate->id)
            ->update([
                'manifesto' => $request->input('manifesto'),
                'avatar' => $filename
            ]);
        }
        else
        {
            $candidate_update = Candidate::where('id', $candidate->id)
            ->update([
                'manifesto' => $request->input('manifesto')
            ]);
        }
        
        
        if($candidate_update)
        {
            return redirect()->route('candidate')->with('success', 'You have successfully completed your candidature.');
        }
        return back()->withInput()->with('danger', 'Candidature could not be completed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
        $user_id = Candidate::where('id', $candidate->id)->value('user_id');
        $candidate = Candidate::find($candidate->id);

        if($candidate -> delete()){
            $user_update = User::where('id', $user_id)
            ->update([
                'role_id' => 4,
            ]);
            if($user_update){
               return redirect()->route('candidates.index')->with('success', 'Candidate successfully unregistered');
           }

       }
       return back()->withInput()->with('danger', 'Candidate could not be unregistered.');
    }
}
