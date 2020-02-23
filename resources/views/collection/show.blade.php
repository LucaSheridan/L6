@extends('layouts.app')

@section('content')

    <div class="flex flex-col items-center items-stretch bg-white m-10 rounded-lg p-0">
   
    {{-- Options --}}

        <span class="text-red-400 font-sembibold text-2xl uppercase roman ">{{$collection->title}}</span>
 

    <div class="inline-flex justify-end rounded-lg ">
                
                    <a href="{{action('CollectionController@slideshow', $collection->id)}}">
                        <div class="flex justify-end p-2 bg-gray-200 rounded-tl-lg ">
                        
                            <div>@icon('play-circle', ['class' => 'float-right text-gray-600 hover:text-red-400 h-5 w-5'])</div>

                            <div class="flex pt-1 px-1 text-gray-600 hover:text-red-400">Play</div>
                        </div>
                    </a>

                    {{-- Edit --}}

                    <a href="{{action('CollectionController@edit', $collection )}}">
                        <div class="flex justify-end p-2 bg-gray-200 rounded-tl-lg ">
                        
                            <div class="text-xl">
                                @icon('edit', ['class' => 'float-right text-gray-600 hover:text-red-400 h-5 w-5'])

                             <i class="text-gray-600 fa fa-edit mt-1" aria-hidden="true"></i>
                            
                            </div>

                            <div class="flex pt-1 px-1 text-gray-600 hover:text-red-400">Edit!</div>
                        </div>
                    </a>

                    {{-- Delete --}}

                    <a href="{{action('CollectionController@delete', $collection )}}">
                        <div class="flex flex-end p-2 bg-gray-200 rounded-tr-lg">
                        
                            <div>@icon('x-circle', ['class' => 'float-right text-gray-600 hover:text-red-400 h-5 w-5'])</div>

                            <div class="flex pt-1 px-1 text-gray-600 hover:text-red-400">Delete</div>
                        </div>
                    </a>

                </div>

    {{-- Collection Description --}}

        <div class="w-full bg-gray-200 p-2 pl-4 mb-2 border">              

            <p class=" italic mt-2 text-md text-gray-600 leading-normal rounded-lg">{{$collection->description}}</p>

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
                        
                             <div class="w-full p-0 relative">

                             <ul class="leading-tight p-2 border-t-0 rounded-b-lg border-2">      

                             @if (

                                is_null($artifact->pivot->artist) && 
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
                            @endif

                            <Li class="font-semibold">{{$artifact->pivot->artist}}</li>
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
                           <li class="mt-4">{{$artifact->pivot->label_text}}</li>
                       
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
                        
                        </div>

                                                            </button>

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

