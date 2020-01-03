@extends('layouts.app')

@section('content')
    
    <div class="flex flex-col items-center items-stretch bg-white m-10 rounded-lg p-4 shadow-xl">
   
    {{-- Options --}}

    <div class="inline-flex justify-end rounded-lg ">
                
                    <a href="{{action('CollectionController@slideshow', $collection )}}">
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

                            <div class="flex pt-1 px-1 text-gray-600 hover:text-red-400">Edit</div>
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

    <span class="text-red-400 font-sembibold text-2xl uppercase roman ">{{$collection->title}}</span>
              

    <p class=" italic mt-2 text-md text-gray-600 leading-normal rounded-lg">{{$collection->description}}</p>

    </div>

    {{-- Artworks --}}
    
    <div class="flex bg-white p-2 flex-wrap">

        @foreach ($collection->artifacts as $artifact) 
            
       <div class="flex items-center text-center relative p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5">
        
          {{-- Begin Individual Artifacts Container--}}

          <div class="relative w-full border-white border-4 rounded">


                    <a href="{{action('ArtifactController@show', $artifact->id)}}">
                    <img class="w-full" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}">

                        <div class="flex relative p-2 text-left text-xs text-gray-700">
                        
                        <ul class="leading-tight">

                            <Li>{{$artifact->user->fullName}}</li>
                            <li><span class="italic">{{$artifact->pivot->title}}</span></li>
                            <!--  <li>{{$artifact->pivot->medium}}</li>c-->                        
                            <li>{{$artifact->pivot->year}}</li>
                            
                            <!--  <li>{{$artifact->pivot->dimensions_height}} x {{$artifact->pivot->dimensions_width}}
                                @if ($artifact->pivot->dimensions_depth)
                                x {{$artifact->pivot->dimensions_depth}}
                                @else
                                @endif
                                {{$artifact->pivot->dimensions_units}}
                            </li> -->

                        </ul>
            
                        </div>

                    <div class="absolute z-10 top-0 left-0 p-1 text-gray-100 text-xs">{{$artifact->pivot->position}}</div>

                    </a>
               
         </div>

    </div>


           



    @endforeach

    </div>

      
            </div>
        </div>
    </div>
@endsection

