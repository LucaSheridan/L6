<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function index( Section $currentSection)
    {
        
        // show all users active classes
        $activeSections = Auth::User()->activeSections()->get();
        
        // set default active class for user student home view dropdown menu
        if ($currentSection->id == null )
        $currentSection = Auth::User()->activeSections->first();
        else {}

        //dd($currentSection->id);

                
        
        //$inactiveSections = Auth::User()->sections()->where('is_active', 0 )->get();
        //$allSections = Auth::User()->sections()->get();

        return view('home')->with(['activeSections' => $activeSections, 'currentSection' => $currentSection]);
        }
    }

