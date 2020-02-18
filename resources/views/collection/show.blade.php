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

    {{-- Title --}}

    <div class="w-full bg-gray-200 p-2 pl-4 mb-2 border">              

    <p class=" italic mt-2 text-md text-gray-600 leading-normal rounded-lg">{{$collection->description}}</p>

    </div>

    {{-- Artworks --}}
    
    <div class="flex bg-white p-2 flex-wrap">

        @foreach ($collection->artifacts as $artifact) 
            
       <div class="flex  text-center relative p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5">
        
          {{-- Begin Individual Artifacts Container--}}

          <div class="relative w-full border-white border-4 rounded">

                    <a href="{{action('ArtifactController@show', $artifact->id)}}">
                    
                        <img class="w-full border border-gray-800" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}">
                    </a>

                            <div class="flex relative p-2 text-left text-xs text-gray-700">
                        
                            <ul class="leading-tight">                        
                        
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
                           x{{$artifact->pivot->dimensions_depth}}
                           @endif
                                  
                            </li>

                        </ul>
            
                        </div>

                    <div class="absolute z-10 top-0 left-0 p-1 text-gray-100 text-xs">{{$artifact->pivot->position}}</div>

                    </a>

                               <div class="flex"> 

                            <div class="flex bg-green-200">

                                <form  id="add_label" method="GET" action="{{ action('CollectionController@addLabel',['collection' => $collection->id ,'artifact' => $artifact->id ]) }}">
                            
                                    {{ csrf_field() }}

                                    <input type="hidden" name="position" value="{{$artifact->pivot->position}}">
                                    <input type="hidden" name="artist" value="{{$artifact->artist}}">
                                    <input type="hidden" name="title" value="{{$artifact->title}}">
                                    <input type="hidden" name="medium" value="{{$artifact->medium}}">
                                    <input type="hidden" name="year" value="{{$artifact->year}}">
                                    <input type="hidden" name="dimensions_height" value="{{$artifact->dimensions_height}}">
                                    <input type="hidden" name="dimensions_width" value="{{$artifact->dimensions_width}}">
                                    <input type="hidden" name="dimensions_depth" value="{{$artifact->dimensions_depth}}">
                                    <input type="hidden" name="dimensions_units" value="{{$artifact->dimensions_units}}">
                                    <input type="hidden" name="annotation" value="{{$artifact->annotation}}">
                                    
                                   
                                    <button type="submit" class="bg-gray-300 p-2 rounded">
                                    @icon('plus-circle', ['class' => 'float-right text-gray-600 hover:text-red-400 h-5 w-5'])
                                    </button>
                                
                                </form>

                                    </div>           
                                     <div class="flex bg-red-200">


                            <form id="edit_label" method="GET" action="{{ action('CollectionController@editLabel',['collection' => $collection->id ,'artifact' => $artifact->id ]) }}">
                                
                            {{ csrf_field() }}

                            <input type="hidden" name="position" value="{{$artifact->pivot->position}}">
                            <input type="hidden" name="title" value="{{$artifact->pivot->title}}">
                            <input type="hidden" name="medium" value="{{$artifact->pivot->medium}}">
                            <input type="hidden" name="year" value="{{$artifact->pivot->year}}">
                            <input type="hidden" name="dimensions_height" value="{{$artifact->pivot->dimensions_height}}">
                            <input type="hidden" name="dimensions_width" value="{{$artifact->pivot->dimensions_width}}">
                            <input type="hidden" name="dimensions_depth" value="{{$artifact->pivot->dimensions_depth}}">
                            <input type="hidden" name="dimensions_units" value="{{$artifact->pivot->dimensions_units}}">

                            <input type="hidden" name="description" value="{{$artifact->pivot->description}}">
                            

                                            <button type="submit" class="bg-gray-300 p-2 rounded">
                                            @icon('edit', ['class' => 'float-right text-gray-600 hover:text-red-400 h-5 w-5'])
                                            </button>
                                </form>
                                </div>
                            </div>
               
         </div>



    </div>


           



    @endforeach

    </div>

      
            </div>
        </div>
    </div>
@endsection

