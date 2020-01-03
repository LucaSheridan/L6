<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Section;
use App\User;

use Auth;

class ExploreController extends Controller
{
    /**
     * Show a collection.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request, Collection $collection)
    {
        
    return view('collection.show')->with('collection', $collection);

    }

}
