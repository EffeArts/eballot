<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Candidate;
use Image;
use App\Position;
use App\Allowed_voter;
use App\Registered_voter;
use App\Role;
use App\Vote;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function sudo()
    {
        return view('sudo/home');
    }
    public function admins()
    {
        return view('admins/home');
    }

    public function guest()
    {
        return view('visitors/index');
    }

    public function elections()
    {
        $candidates = Candidate::get();
        $total = Candidate::get()->count();
        $positions = Position::get();
        return view('elections')->with('candidates', $candidates)->with('total', $total)->with('positions', $positions);
    }

    // Function to upload and change profile picture of guest
    public function guest_avatar_upload(Request $request, User $user){
        if($request->hasFile('cropped_avatar')){
            $avatar = $request->file('cropped_avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
            $avatar_upload = User::where('id', $user->id)
            ->update([
                'avatar' => $filename
            ]);

            if($avatar_upload)
            {
                return redirect()->route('guest')->with('success', 'Profile picture successfully changed.');
            }
            return back()->withInput()->with('danger', 'Profile picture upload failed');
        }

        
    }

    public function uploadImage(Request $request, User $user)

    {

        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image) = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $path = public_path('/uploads/avatars/'.$image_name);
        file_put_contents($path, $image);

        $avatar_upload = User::where('id', $user->id)
        ->update([
            'avatar' => $image_name
        ]);

        // if($avatar_upload)
        // {
        //     return redirect()->route('guest')->with('success', 'Profile picture successfully changed.');
        // }
        // return back()->withInput()->with('danger', 'Profile picture upload failed');
        return response()->json(['status'=>true]);

    }

     public function showCandidate(Candidate $candidate)
    {
        //
        $candidate = Candidate::where('id', $candidate->id)->first();
        return view('candidate', ['candidate' =>$candidate]);
    }

    public function vote()
    {
        //
        $candidates = Candidate::get();
        $positions = Position::get();
        return view('vote')->with('candidates', $candidates)->with('positions', $positions);
    }

    public function positions(){
        $positions = Position::get();
        return view('positions')->with('positions', $positions);
    }

    public function live(){
        $positions = Position::get();
        $candidates = Candidate::get();
        $votes = Vote::get();
        $max = Candidate::max('votes');
        return view('live_status')->with('candidates', $candidates)->with('positions', $positions)->with('votes', $votes)->with('max', $max);
    }

    public function results(){
        $positions = Position::get();
        $candidates = Candidate::get();
        $votes = Vote::get();
        $all_voters = Registered_voter::count();
        $casted_votes = Registered_voter::where('status', 1)->count();
        $lost_votes = Registered_voter::where('status', 0)->count();
        foreach ($positions as $position) {
            $winners[] = array(Candidate::where('position_id', $position->id)->max('votes'));
        }
        // $max = Candidate::max('votes');
        // $winner = Candidate::where('votes', $max)->first()->pluck('id');
        return view('results')->with('candidates', $candidates)->with('positions', $positions)->with('votes', $votes)->with('winners', $winners)->with('all_voters', $all_voters)->with('casted_votes', $casted_votes)->with('lost_votes', $lost_votes);
        // $max = max(array($allVotes));
        // return (max(array($allVotes)));
        // return ($winners);
    }
}
