<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Section;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        $sections = Section::with('site')->paginate(5);

        return view('partials.student.user.show')->with(['user' => $user, 'sections' => $sections]);

    }

}



