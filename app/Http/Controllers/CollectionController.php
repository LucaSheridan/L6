<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artifact;
use App\Collection;
use App\Section;
use App\User;

use Auth;

class CollectionController extends Controller
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
     * Show the form for creating a new collection.
     *
     * @return \Illuminate\Http\Response
     */
        public function create()
    {
        
        return view('collection.create');
    }

       /**
     * Show the a new collection.
     *
     * @return \Illuminate\Http\Response
     */
        public function show(Request $request, Collection $collection)
    {
        
        // dd($collection);

        return view('collection.show')->with( 'collection', $collection );
    }

    /**
     * Store a newly created collection  to the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);

        $this->validate($request, [
        
            'title' => 'required',
            //'site' => 'required',

            ]);

            $collections = Collection::all()->count();

            //dd($collections);

            $collection = New Collection;
            $collection->title = $request->input('title');
            $collection->description = $request->input('description');
            $collection->save();
            $collection->curators()->attach(Auth::User()->id);
            $collection->save();

            flash('New collection was created successfully!', 'success');

            return redirect()->action('HomeController@index');
     }

       /**
     * Show the form for creating a new collection.
     *
     * @return \Illuminate\Http\Response
     */
        public function edit(Request $request, Collection $collection)
    {
        
        return view('collection.edit')->with( 'collection', $collection );
    }

    /**
     * Store a newly created collection  to the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {

        $this->validate($request, [
        
            'title' => 'required',
            //'site' => 'required',

            ]);

            
            $collection->title = $request->input('title');
            $collection->description = $request->input('description');
            $collection->save();
           
            flash('Collection updates successfully!', 'success');


            return redirect()->action('HomeController@index');
     }

            /**
     * Show the form for creating a new collection.
     *
     * @return \Illuminate\Http\Response
     */
        public function delete(Request $request, Collection $collection)
    {
        
        return view('collection.delete')->with( 'collection', $collection );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
       public function destroy(Collection $collection)
    {

       $collection->delete();

       flash('Collection deleted successfully!', 'success');

       return redirect()->action('HomeController@index');

    }    

    public function addArtifact(Request $request, Artifact $artifact)
    {

        
        $artifact = Artifact::find($request->input('artifact'));
        $collection = Collection::find($request->input('collection'));

        $artifact->collections()->attach($request->input('collection')); 
        
        $collection->save();

        flash('Artifact added to '.$collection->title.'!', 'success');

        return redirect()->action('ArtifactController@show', $artifact);

    }


    public function removeArtifact(Request $request, Artifact $artifact, Collection $collection)
    {

        

        //$artifact = Artifact::find($request->input('artifact'));
        
        $collection = Collection::find($request->input('collection'));

        $artifact->collections()->detach($request->input('collection')); 
        
        $collection->save();

        flash('Artifact removed from '.$collection->title.'!', 'success');

        return redirect()->action('ArtifactController@show', $artifact);


    }
    

    //  /**
    //  * Show a collection.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function slideshow(Request $request, Section $section, Collection $collection)
    // {
        
    // return view('collection.slideshow')->with('collection', $collection);

    // }



}

