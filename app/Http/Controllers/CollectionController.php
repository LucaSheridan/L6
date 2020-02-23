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
        public function create(Artifact $artifact)
    {
        return view('collection.create')->with('artifact', $artifact);
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

            //
            $collections = Collection::all()->count();
            //
            $artifact = $request->input('artifact');
            
            $collection = New Collection;
            $collection->title = $request->input('title');
            $collection->description = $request->input('description');
            $collection->save();
            $collection->curators()->attach(Auth::User()->id);
            $collection->artifacts()->attach($artifact, [ 'position' => 1 ]);

            $collection->save();

            flash('You created a collection called '.$collection->title.'!', 'success');

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

            ]);
            
            $collection->title = $request->input('title');
            $collection->description = $request->input('description');
            $collection->save();
           
            flash('Collection updates successfully!', 'success');

            return redirect()->action('CollectionController@show', $collection);
     }

    /**
     * Show the confirmation dialogue to delete a coillection.
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
   
        // find the highest position in the collection
        $max = $collection->artifacts()->max('position');
        
        $artifact->collections()->attach($request->input('collection'), [

        'position' => $max +1,
        'artist' => $artifact->artist,
        'title' => $artifact->title,
        'medium' => $artifact->medium,
        'year' => $artifact->year,
        'dimensions_height' => $artifact->dimensions_height,
        'dimensions_width' => $artifact->dimensions_width,
        'dimensions_depth' => $artifact->dimensions_depth,
        'dimensions_units' => $artifact->dimensions_units,
        'label_text' => $artifact->annotation
        
        ]); 
        
        $collection->save();

        flash('Artifact added to '.$collection->title.'!', 'success');

        return redirect()->action('CollectionController@show', $collection);

    }


    public function removeArtifact(Request $request, Collection $collection, Artifact $artifact)
    {
        
        //dd($collection);
        //dd($artifact);

        $artifact->collections()->detach($collection->id); 

        flash('Artifact removed from '.$collection->title.'!', 'success');

        return redirect()->action('CollectionController@show', $collection->id);

    }
     
  

       public function editLabel(Request $request, Collection $collection, Artifact $artifact)
    {
        
        //$artist = ($request->input('artist'));
        $position = ($request->input('position'));
        $artist = ($request->input('artist'));
        $title = ($request->input('title'));
        $medium = ($request->input('medium'));
        $year = ($request->input('year'));
        $dimensions_height = ($request->input('dimensions_height'));
        $dimensions_width = ($request->input('dimensions_width'));
        $dimensions_depth = ($request->input('dimensions_depth'));
        $dimensions_units = ($request->input('dimensions_units'));  
        $label_text = ($request->input('label_text'));

        //dd($label_text);

        return view('collection.editLabel')->with(compact('collection','artifact','position','artist','title','medium','year','dimensions_height','dimensions_width','dimensions_depth','dimensions_units','label_text'));

    }

      public function updateLabel(Request $request, Collection $collection, Artifact $artifact)
    {

        $artist = ($request->input('artist'));
        $position = ($request->input('position'));
        $title = ($request->input('title'));
        $medium = ($request->input('medium'));
        $year = ($request->input('year'));
        $dimensions_height = ($request->input('dimensions_height'));
        $dimensions_width = ($request->input('dimensions_width'));
        $dimensions_depth = ($request->input('dimensions_depth'));
        $dimensions_units = ($request->input('dimensions_units'));
        $label_text = ($request->input('label_text'));
        
        $artifact->collections()->updateExistingPivot($collection, 

        [
         'position' => $position,
         'artist' => $artist,
         'title' => $title,
         'medium' => $medium,
         'year' => $year,
         'dimensions_height' => $dimensions_height,
         'dimensions_width' => $dimensions_width,
         'dimensions_depth' => $dimensions_depth,
         'dimensions_units' => $dimensions_units,
         'label_text' => $label_text

          ]); 
        
        // $collection->save();

        flash('Label Updated', 'success');

        return redirect()->action('CollectionController@show', $collection);

    }

     /**
     * Show a collection.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function slideshow(Request $request, Section $section, Collection $collection)
    {
    
        return view('collection.slideshow')->with( 'collection', $collection );

    }



}

