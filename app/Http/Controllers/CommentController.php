<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
}


/**
     * Show the form for creating a new assignment component.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    	$this->validate($request, [
        
        'body' => 'required',
        'artifact_id' => 'required',
        'user_id' => 'required',
        
        ]);
        
        //create a new comment instance
        $comment = New Comment;
		//set and title information
        $comment->title = $request->input('title');
        //set section id 
        $comment->body = $request->input('body');
        //set artifact id 
        $comment->artifact_id = $request->input('artifact_id');
        //set user id 
		$comment->artifact_id = $request->input('user_id');

		$comment->save();

		flash('Your assignment was created successfully!', 'success');

        
        
        return view('partials.teacher.component.create')->with(compact('section','assignment'));
    }
