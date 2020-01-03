@extends('layouts.app')

@section('content')
  
<div class="flex flex-wrap">                    
      
    <div class="w-full sm:w-1/4 bg-gray-500 p-4">
    <div class="mb-2 text-2xl text-gray-300">CLASSES!!</div>
    
        <select class="px-2 py-1 pr-8 m-0 bg-gray-300 form-select w-full text-xl text-red-500 rounded-none" onchange="location = this.value;">
          
                            <option class="" value="{{action('HomeController@index', $currentSection->id) }}">{{$currentSection->title}}</option>
            
                                @foreach ( Auth::User()->activeSections as $section)                         
                                               
                                    @if ( $currentSection->id == $section->id ) 

                                    @else
                                        <option value="{{action('HomeController@index', $section->id) }}">{{ $section->x}}</option>
                                    @endif
                                
                                @endforeach

                        </select>
                
                <div class="bg-gray-200 p-1">
                <div class="ml-2 leading-relaxed">
                
                <a href="#" class="hover:text-red-500">Blog</a><br/>
                <a href="#" class="hover:text-red-500">Resources</a><br/>
                <a href="#" class="hover:text-red-500">Assignments</a><br/>

                </div>
                
                @foreach ($currentSection->assignments as $assignment)
            
                <div class="bg-gray-200 p-1 text-sm ml-3 text-gray-700">
                <a href="{{action('AssignmentController@showStudent', ['section' => $currentSection->id, 'assignment' => $assignment->id])}}" class="hover:text-red-500">{{ $assignment->title }}</a>
                </div>
            
            @endforeach
            
                 </div>


   </div>


    <div class="w-full sm:w-3/4 bg-gray-300 p-4">
    
    {{-- Collection Title --}}

    <div class="flex border-0 border-yellow-600">
           
            <div class="flex-grow px-2 pt-2 text-left text-2xl rounded-br-lg text-gray-600">{{strtoupper($collection->title)}}</div>
            
            <div class="flex border-b ">
                    
                    {{-- Option 1: Solo Icon Tab Link ( can be stacked ) --}}

                    <a href="{{action('CollectionController@slideshow', $collection )}}">
                        <div class="flex justify-end p-2 bg-gray-200 rounded-tl-lg ">
                        
                            <div>@icon('play-circle', ['class' => 'float-right text-gray-600 hover:text-red-400 fill-current'])</div>

                            <div class="flex pt-1 px-1 text-gray-600 hover:text-red-400">Play</div>
                        </div>
                    </a>

                    <a href="{{action('CollectionController@edit', $collection )}}">
                        <div class="flex justify-end p-2 bg-gray-200 rounded-tl-lg ">
                        
                            <div>@icon('edit', ['class' => 'float-right text-gray-600 hover:text-red-400 fill-current'])</div>

                            <div class="flex pt-1 px-1 text-gray-600 hover:text-red-400">Edit</div>
                        </div>
                    </a>

                    <a href="{{action('CollectionController@delete', $collection )}}">
                        <div class="flex justify-end p-2 bg-gray-200 rounded-tr-lg">
                        
                            <div>@icon('x-circle', ['class' => 'float-right text-gray-600 hover:text-red-400 fill-current'])</div>

                            <div class="flex pt-1 px-1 text-gray-600 hover:text-red-400">Delete</div>
                        </div>
                    </a>

                    {{-- Option 1: End--}}

                    {{-- Option 2: DropMenu Vue Component --}}


                        </div>

                        {{-- Option 2: End --}}

            </div>


    <div class="flex flex-wrap items-center items-stretch bg-white p-2">

    <div class="w-full p-2 my-2 text-sm">Curated by: 

       @foreach ($collection->curators as $curator)
       @if ($loop->count > 1 && $loop->last)
       and {{$curator->fullName}}
       @elseif ($loop->count > 1 && !$loop->first)
       , {{$curator->fullName}}
        
        @else {{$curator->fullName}}
        @endif

        @endforeach

        <p class="mt-2 leading-relaxed">{{$collection->description}}</p>

    </div>

    @foreach ($collection->artifacts as $artifact) 
            
       <div class="flex items-center text-center relative p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5">
        
          {{-- Begin Individual Artifacts Container--}}

          <div class="relative w-full">

                        <a href="{{action('ArtifactController@show', $artifact->id)}}">
                        <img class="w-full rounded-lg" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_thumb}}">
                    </a>
               
         </div>
    </div>

    @endforeach
    

    </div>
    </div>

</div>


@endsection
