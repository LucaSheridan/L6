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
    public function show(Request $request, User $user)
    {
        
        // $user = User::find($user)->first();

        $sections = Section::with(['users'])
                           ->whereHas('users', function ($query) use ($user) {
                            $query->where('id', $user->id);})->orderBy('created_at', 'desc')
                           ->paginate(5);

        //$sections = Section::where('is_active','=',0)->paginate(5);

        return view('user.profile')->with(['user' => $user, 'sections' => $sections]);

    }

}



