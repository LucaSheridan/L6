<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artifact;
use App\Section;
use App\User;
use Auth;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request, Section $currentSection)
    {
        // show all users active classes
        $activeSections = Auth::User()->activeSections()->get();

        // set default active class for user student home view dropdown menu
        if ($currentSection->id == null )
        $currentSection = Auth::User()->activeSections->first();
        else {}

        //get artifacts
        $artifacts = Artifact::where('user_id', Auth::User()->id)
        // ->paginate(12);
        ->get();

        return view('home')->with(['activeSections' => $activeSections, 'currentSection' => $currentSection, 'artifacts' => $artifacts]);
    }

     /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile( Request $request, User $user)
    {
        
        // show all users active classes
        $sections = $user->sections()->paginate(3);

        //dd($sections);
       
        return view('user.profile')->with(['user' => $user, 'sections' => $sections]);

    }


    }

