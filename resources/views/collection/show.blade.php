@extends('layouts.app')

@section('content')

    <div class="flex flex-col items-center items-stretch mt-6 ml-3">

    {{--  Collection Title --}}

    <div class="flex items-center bg-gray-100 mr-3 ">
           
        <div class="pt-3 bg-gray-100 flex-grow pl-4 text-left font-normal text-2xl text-red-400 uppercase">{{$collection->title}}</div>

         {{--  Classes Menu --}}

        <div class="flex relative text-left mr-4 bg-gray-100">
        <dropdown>
    
            <template v-slot:trigger>
            @icon('menu', ['class' => ' w-6 h-6 text-gray-400 rounded-lg bg-gray-100 hover:text-gray-500'])
            </template>

                    <div class="z-10 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-400 rounded py-1 list-none text-left leading-normal whitespace-no-wrap">

                        <li class="hover:text-gray-300 px-3">
                        <a href="{{action('CollectionController@slideshow', $collection->id)}}">
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('play-circle', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Start Slideshow</div>
                        </div>
                        </a>
                        </li>

                        <li class="hover:text-gray-300 px-3">
                        <a class=""href="{{action('CollectionController@edit', $collection)}}">
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('edit', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Edit Collection</div>
                        </div>
                        </a>
                        </li>

                        <li class="hover:text-gray-300 px-3">
                        
                        <form action="{{action('CollectionController@destroy', $collection)}}" method="POST">

                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        <button>@icon('x-circle', ['class' => 'w-5 h-5 hover:text-gray-200'])</button></div>
                        <div><button>Delete Collection</button></div>
                        </div>
                        </form>
                        </li>
               
                    </div>

                </dropdown>
                </div>
    </div>

{{-- Collection Description --}}

        <div class="p-4 bg-gray-100 mr-3">              

        <p class="italic text-md text-gray-600 leading-normal">{{$collection->description}}</p>

        </div>
    {{-- Artworks --}}

    
    <div class="flex bg-white py-2 flex-wrap">

        @foreach ($collection->artifacts as $artifact) 
            
       <div class="flex items-start text-center w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
        
          {{-- Begin Individual Artifacts Container--}}

          <div class="relative w-full p-2">

                    <a href="{{action('ArtifactController@show', $artifact->id)}}">
                    
                        <img class="w-full border-2 border-b-0 p-2 border-gray-300" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}">
                    
                    </a>
                       
                           <div class="flex mt-0 relative text-left text-sm text-gray-700">
                        
                             <div class="w-full p-0 relative border-t-0 rounded-b-lg border-2">

 <div class="pl-2 pt-2">

<a class="underline hover:text-red-500" href="{{action('ArtifactController@show', $artifact->id)}}">
 
@if ($artifact->comments->count()  < 1 ) 

Post Feedback

@elseif ($artifact->comments->count()  > 1 )

{{$artifact->comments->count()}} Comments 

@else

{{$artifact->comments->count()}} Comment
@endif


                                        
 </a>
                </div>
        

                             <ul class="leading-tight p-2 mb-1 w-11/12">      
<!-- 
                             @if (

                                is_null($artifact->pivot->title) &&  
                                is_null($artifact->pivot->medium) && 
                                is_null($artifact->pivot->year) &&
                                is_null($artifact->pivot->dimensions_height) &&
                                is_null($artifact->pivot->dimensions_weight) &&
                                is_null($artifact->pivot->dimensions_depth) &&
                                is_null($artifact->pivot->dimensions_units) &&
                                is_null($artifact->pivot->label_text)

                               )
                           
                              No label information
                           
                            @else
                            @endif -->
                            <li class="font-semibold">{{$artifact->pivot->artist}}</li>
                            <li class="italic">{{$artifact->pivot->title}}</li>
                            <li>{{$artifact->pivot->medium}}</li>
                            <li>{{$artifact->pivot->year}}</li>
                            <li>
                          
                           {{$artifact->pivot->dimensions_height}}
                           
                           @if(is_null($artifact->pivot->dimensions_width))
                           @else
                           x {{$artifact->pivot->dimensions_width}}
                           @endif

                           @if (is_null($artifact->pivot->dimensions_depth))
                           @else
                           x {{$artifact->pivot->dimensions_depth}}
                           @endif
                           {{$artifact->pivot->dimensions_units}}
                           </li>
                           
                           @if (is_null($artifact->pivot->label_text))
                           @else
                           <li class="mt-4">{{$artifact->pivot->label_text}}</li>
                           @endif
                           </ul>
                   </div>

            <div class="absolute top-0 right-0"> 

            {{--  Classes Section: Menu --}}

            <div class="flex relative text-left pb-2 pr-3">
                <dropdown>
    
                    <template v-slot:trigger>
                    @icon('menu', ['class' => ' w-5 h-5 text-gray-500'])
                    </template>

                    <div class="z-10 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-400 rounded py-1 list-none text-left leading-normal whitespace-no-wrap">

                    
                    {{-- Begin Edit Label Form --}}

                    <li class="hover:text-gray-300 px-2">
                                                    
                        <div class="flex items-center">

                          <div class="pr-1 text-gray-500">

                                <form class="p-0 m-0" id="edit_label" method="POST" action="{{ action('CollectionController@editLabel',['collection' => $collection->id ,'artifact' => $artifact->id ]) }}">
                                
                                {{ csrf_field() }}

                                <input type="hidden" name="position" value="{{$artifact->pivot->position}}">
                                <input type="hidden" name="artist" value="{{$artifact->pivot->artist}}">
                                <input type="hidden" name="title" value="{{$artifact->pivot->title}}">
                                <input type="hidden" name="medium" value="{{$artifact->pivot->medium}}">
                                <input type="hidden" name="year" value="{{$artifact->pivot->year}}">
                                <input type="hidden" name="dimensions_height" value="{{$artifact->pivot->dimensions_height}}">
                                <input type="hidden" name="dimensions_width" value="{{$artifact->pivot->dimensions_width}}">
                                <input type="hidden" name="dimensions_depth" value="{{$artifact->pivot->dimensions_depth}}">
                                <input type="hidden" name="dimensions_units" value="{{$artifact->pivot->dimensions_units}}">
                                <input type="hidden" name="label_text" value="{{$artifact->pivot->label_text}}">
                                      
                                <button type="submit" class="p-1 rounded">@icon('edit', ['class' => 'w-5 h-5 hover:text-gray-200'])</button>
                               
                                </form>
                                </div>

                               <div>
                                 
                              <form class="p-0 m-0" id="edit_label" method="POST" action="{{ action('CollectionController@editLabel',['collection' => $collection->id ,'artifact' => $artifact->id ]) }}">
                                
                                {{ csrf_field() }}

                                <input type="hidden" name="position" value="{{$artifact->pivot->position}}">
                                <input type="hidden" name="artist" value="{{$artifact->pivot->artist}}">
                                <input type="hidden" name="title" value="{{$artifact->pivot->title}}">
                                <input type="hidden" name="medium" value="{{$artifact->pivot->medium}}">
                                <input type="hidden" name="year" value="{{$artifact->pivot->year}}">
                                <input type="hidden" name="dimensions_height" value="{{$artifact->pivot->dimensions_height}}">
                                <input type="hidden" name="dimensions_width" value="{{$artifact->pivot->dimensions_width}}">
                                <input type="hidden" name="dimensions_depth" value="{{$artifact->pivot->dimensions_depth}}">
                                <input type="hidden" name="dimensions_units" value="{{$artifact->pivot->dimensions_units}}">
                                <input type="hidden" name="label_text" value="{{$artifact->pivot->label_text}}">
                                      
                                <button type="submit" class="">Edit Label</button>
                               
                                </form>

                               </div>
                        </li>
                        
                        <li class="hover:text-gray-300 px-2">
                                                    
                            <div class="flex items-center">
                            <div class="pr-1 text-gray-500">
                          
                                <form id="remove_artifact" method="POST" action="{{ action('CollectionController@removeArtifact',['collection' => $collection->id, 'artifact' => $artifact->id ]) }}">
                                
                                {{ csrf_field() }}

                                    <input type="hidden" name="_method" value="DELETE">

                                    <button type="submit" class="px-1">
                                        @icon('edit', ['class' => 'h-5 w-5 hover:text-gray-200'])
                                    </button>
                            
                            </form>


                          </div>
                          

                          <div><form id="remove_artifact" method="POST" action="{{ action('CollectionController@removeArtifact',['collection' => $collection->id, 'artifact' => $artifact->id ]) }}">
                                
                                {{ csrf_field() }}

                                    <input type="hidden" name="_method" value="DELETE">

                                    <button type="submit" class="">
                                        Remove from Collection
                                    </button>
                            
                            </form>

                          </div>
                        
                        </div> </button>
                        </li>
               
                    </div>

                </dropdown>
            </div>

              <!--           <div class="flex px-1">

                            <form class="p-0 m-0" id="edit_label" method="POST" action="{{ action('CollectionController@editLabel',['collection' => $collection->id ,'artifact' => $artifact->id ]) }}">
                                
                                {{ csrf_field() }}

                                <input type="hidden" name="position" value="{{$artifact->pivot->position}}">
                                <input type="hidden" name="artist" value="{{$artifact->pivot->artist}}">
                                <input type="hidden" name="title" value="{{$artifact->pivot->title}}">
                                <input type="hidden" name="medium" value="{{$artifact->pivot->medium}}">
                                <input type="hidden" name="year" value="{{$artifact->pivot->year}}">
                                <input type="hidden" name="dimensions_height" value="{{$artifact->pivot->dimensions_height}}">
                                <input type="hidden" name="dimensions_width" value="{{$artifact->pivot->dimensions_width}}">
                                <input type="hidden" name="dimensions_depth" value="{{$artifact->pivot->dimensions_depth}}">
                                <input type="hidden" name="dimensions_units" value="{{$artifact->pivot->dimensions_units}}">

                                <input type="hidden" name="label_text" value="{{$artifact->pivot->label_text}}">
                                
                                    <button type="submit" class="p-1 rounded">
                                        @icon('edit', ['class' => 'h-5 w-5'])
                                    </button>
                            
                            </form>

                            <form id="remove_artifact" method="POST" action="{{ action('CollectionController@removeArtifact',['collection' => $collection->id, 'artifact' => $artifact->id ]) }}">
                                
                                {{ csrf_field() }}

                                    <input type="hidden" name="_method" value="DELETE">

                                    <button type="submit" class="p-1 rounded">
                                        @icon('x-circle', ['class' => 'h-5 w-5'])
                                    </button>
                            
                            </form>
                            
                        </div> -->
            </div>
                
            </div>

                    <div class="absolute z-10 top-0 left-0 p-4 text-gray-100 text-xs">{{$artifact->pivot->position}}</div>

                    </a>

                            
               
         </div>



    </div>


           



    @endforeach

    </div>

      
            </div>
        </div>
    </div>
@endsection

