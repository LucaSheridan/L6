@extends('layouts.app')

@section('content')
  
<div class="flex flex-wrap">                    
      
    <div class="w-full sm:w-1/3 md:w-1/4 bg-gray-600 p-4">
        
    {{-- CLASSES--}}
    
        <div class="mt-2 mb-3 text-2xl text-gray-300">CLASSES</div>
    
        @if ( is_null($currentSection))
        
            <div class="p-4 mb-3 bg-gray-300 w-full text-gray-700 rounded-lg text-center">
        
                <p>You haven't enrolled in any classes yet.</p>
                
                <a class="inline-block max-w-sm mt-3 px-2 py-2 rounded-lg bg-red-400 shadow hover:bg-red-500 hover:shadow-lg text-gray-200 hover:text-gray-100" href="{{route('addClass')}}">Join a class</a>
                
            </div>

            NO ASSIGNMENTS SHOWN - BECAUSE NO CLASSES JOINED - 1
        
        @else

            {{-- Begin Class Select --}}

            @if ( is_null($currentSection))
            @else
           
                 <select class="px-2 py-1 pr-8 mb-4 bg-gray-300 form-select w-full text-xl rounded-lg text-red-500 rounded-none" onchange="location = this.value;">

                    <option class="" value="{{action('HomeController@index', $currentSection->id) }}">{{$currentSection->title}}</option>

                        @foreach ( Auth::User()->activeSections as $section)                         
                                       
                            @if ( $currentSection->id == $section->id )
                            @else
                            <option value="{{action('HomeController@index', $section->id) }}">{{ $section->title}}</option>
                            @endif
                        
                        @endforeach

                    </select>

            @endif

        @endif

        {{-- END CLASSES --}}

         {{-- ASSIGNMENTS --}}
            
        {{-- Begin Assignment Select for Mobile --}}

                    
        @if ( is_null($currentSection))
        
        NO ASSIGNEMNEBTS BEASUE OF NO CLASSES -2 
        @else

            <div class="mb-2 text-2xl text-gray-300">ASSIGNMENTS</div>

            @if ($currentSection->assignments->count() > 0)

                                <select class="block sm:hidden px-2 py-1 pr-8 mb-4 bg-gray-300 form-select w-full text-xl rounded-lg text-gray-600 rounded-none" onchange="location = this.value;">
      
                                 @foreach ($currentSection->assignments as $assignment)
                 
                                    <option value="{{action('AssignmentController@showStudent', ['section' => $currentSection->id, 'assignment' => $assignment->id])}}" class="hover:text-red-500', $assignment->id) }}">{{ $assignment->title }}</option>

                                 @endforeach

                            </select>

                        @else
                            <div class="block sm:hidden p-3 pr-8 mb-4 bg-gray-300 w-full text-lg rounded-lg text-gray-600">No assignments yet!</div>

                        @endif
            @endif

        {{-- Begin Assignment Select for > Mobile --}}
  
                    <div class="hidden sm:block px-2 py-1 mb-4 bg-gray-300 w-full text-lg rounded-lg text-gray-600 rounded-none">

                @if ( is_null($currentSection))

                NO Assignments $currentSection is null
                @else

                    @if ($currentSection->assignments->count() > 0)

                        <ul class="leading-tight text-md">

                            @foreach ($currentSection->assignments as $assignment)
             
                                <li class="">
                                <a class="text-gray-600 hover:text-red-500 text-sm font-semibold" href="
                                {{action('AssignmentController@showStudent', ['section' => $currentSection->id, 'assignment' => $assignment->id])}}">{{$assignment->title}}</a>
                                </li>

                                       <!-- <ul class="ml-2">
                                        @foreach ($assignment->components as $component)
                                        
                                        <a href="">
                                            <li class="text-xs">
                                       - {{$component->title}}</li></a>

                                        @endforeach
                                        </ul> -->

                            @endforeach
                        <ul>
                    
                    @else
                    <div class="p-2 text-lg rounded-lg text-gray-600">No assignments yet</div>
                    @endif
                
                @endif

                    </div>

        </div>

        {{-- Column One Ends --}}

        {{-- Column Two Starts --}}

    <div class="w-full sm:w-2/3 md:w-3/4 bg-gray-300 p-4">

    <div class="flex">
           
        {{-- Artifacts Title --}}

            <div class="flex-grow px-2 pt-2 text-left text-2xl rounded-br-lg text-gray-600">ARTIFACTS</div>
            
            <div class="flex">
                    
                {{-- Options Tab Begin--}}

                    <a class="" href="{{action('ArtifactController@create')}}">
                        
                        <div class="flex justify-end p-2 bg-gray-200 rounded-t-lg">
                        
                            <div>@icon('plus-circle', ['class' => 'float-right text-gray-500 hover:text-red-400'])</div>

                            <div class="flex pt-1 px-1 text-gray-600">Create</div>

                        </div>
                     </a>

                {{-- Option Tab End--}}

            </div>
            </div>
        
        {{-- Artifacts List --}}
   
            <div class="flex flex-wrap items-center items-stretch bg-white p-2 rounded-tl-lg rounded-bl-lg rounded-br-lg mb-4">

        @foreach (Auth::User()->artifacts as $artifact) 
            
            <div class="flex items-center text-center relative p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5">
        
          {{-- Begin Individual Artifacts Container--}}

          <div class="relative w-full">
                   
                <a href="{{action('ArtifactController@show', $artifact->id)}}">
                    <img class="w-full rounded-lg shadow-lg hover:shadow-xl" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_thumb}}">
                </a>      
         
          </div>
        
        </div>


        @endforeach

   </div>

{{-- COLLECTIONS --}}

 {{-- Collections Title --}}

        <div class="flex border-0 border-yellow-600">
           
            <div class="flex-grow px-2 pt-2 text-left text-2xl rounded-br-lg text-gray-600">COLLECTIONS</div>
            
            <div class="flex border ">
                    
                    {{-- Option 1: Solo Icon Tab Link --}}

                    <a class="" href="{{action('CollectionController@create')}}">
                        <div class="flex justify-end p-2 bg-gray-200 rounded-t-lg">
                        
                            <div>@icon('plus-circle', ['class' => 'float-right text-gray-500 hover:text-red-400'])</div>

                             <div class="flex pt-1 px-1 text-gray-600">Create</div>
 
                        </div>
                     </a>

                     {{-- Option 1: End--}}

                     {{-- Option 2: DropMenu Vue Component --}}


                      <div id="dropmenu" class="border-red-500 border-0 flex-grow justify-start items-center bg-gray-200 rounded-tl-lg"></div>
 
                        
                       
                        </div>

                        {{-- Option 2: End --}}

                  

            </div>
     
    {{-- Collections List --}}
   
    <div class="flex flex-wrap items-center items-stretch bg-white p-2 rounded-tl-lg rounded-bl-lg rounded-br-lg mb-4">            
    @foreach (Auth::User()->collections as $collection) 
            
       <div class=" items-center text-center relative p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5">
        
          {{-- Begin Individual Collection Container--}}

          {{-- Generate Collection Thumbnail --}}

            @if ($collection->artifacts->count() != 0)

                @foreach ($collection->artifacts as $artifact)

                    @if ( $loop->first )
                            
                            <div class="relative w-full">
                            
                            <a href="{{action('CollectionController@show', $collection )}}">
                            
                            <img class="w-full rounded-t-lg opacity-75 hover:opacity-100 " src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_thumb}}">

                            </a>
                       </div>
                     @else
                     @endif

                @endforeach

            @else 

            {{-- Empty Collection Placeholder--}}

            <div class="relative w-full">
                            <a href="{{action('CollectionController@show', $collection )}}">
                                <img class="w-full rounded-t-lg opacity-75 hover:opacity-100 " src="{{asset('storage/upload.png')}}">

                            </a>
            </div>

            @endif

        <div class="bg-gray-300 text-gray-700 p-2 rounded-b-lg hover:shadow-xl shadow-lg sm:text-sm">{{strtoupper($collection->title)}}</div>

        </div>

    @endforeach
    </div>

{{-- END COLUMN 2 --}}

   
{{-- END COLUMN 2 --}}

</div>

    
        
       


@endsection
