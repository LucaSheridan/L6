@extends('layouts.app')

@section('content')
  
<div class="flex flex-wrap">                    
      
    <div class="w-full sm:w-1/3 md:w-1/4 bg-gray-600 p-4">
        
    {{-- CLASSES--}}

        <div class="mb-2 text-2xl text-gray-300">CLASSES</div>
    
        {{-- Begin Class Select --}}

            <select class="px-2 py-1 pr-8 mb-4 bg-gray-300 form-select w-full text-xl rounded-lg text-red-500 rounded-none" onchange="location = this.value;">

                <option class="" value="{{action('HomeController@index', $currentSection->id) }}">{{$currentSection->course->title}}</option>

                    @foreach ( Auth::User()->activeSections as $section)                         
                                   
                        @if ( $currentSection->id == $section->id )
                        @else
                        <option value="{{action('HomeController@index', $section->id) }}">{{ $section->course->title}}</option>
                        @endif
                    
                    @endforeach

            </select>

        {{-- END CLASSES --}}

         {{-- ASSIGNMENTS --}}
            
        <div class="mb-2 text-2xl text-gray-300">ASSIGNMENTS</div>

        {{-- Begin Assignment Select for Mobile --}}

                    @if ($currentSection->assignments->count() > 0)

                         <select class="block sm:hidden px-2 py-1 pr-8 mb-4 bg-gray-300 form-select w-full text-xl rounded-lg text-gray-600 rounded-none" onchange="location = this.value;">
  
                             @foreach ($currentSection->assignments as $assignment)
             
                                <option value="{{action('AssignmentController@showStudent', ['section' => $currentSection->id, 'assignment' => $assignment->id])}}" class="hover:text-red-500', $assignment->id) }}">{{ $assignment->title }}</option>

                             @endforeach

                        </select>

                    @else
                        <div class="block sm:hidden px-2 py-2 pr-8 mb-4 bg-gray-300 w-full text-lg rounded-lg text-gray-600 rounded-none">No projects assigned</div>

                    @endif

        {{-- Begin Assignment Select for > Mobile --}}
  
                    <div class="hidden sm:block px-2 py-1 pr-8 mb-4 bg-gray-300 w-full text-lg rounded-lg text-gray-600 rounded-none">

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
                    <div class="text-sm">No projects assigned</div>
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
                        
                            <div>@icon('icon-plus-circle', ['class' => 'float-right text-gray-500 hover:text-red-400 fill-current'])</div>

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
                        
                            <div>@icon('icon-plus-circle', ['class' => 'float-right text-gray-500 hover:text-red-400 fill-current'])</div>

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
                            <a href="{{action('CollectionController@showStudent', ['section' => $section , 'collection' => $collection ])}}">
                                <img class="w-full rounded-t-lg opacity-75 hover:opacity-100 " src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_thumb}}">

                            </a>
                       </div>
                     @else
                     @endif

                @endforeach

            @else 

            {{-- Empty Collection Placeholder--}}

            <div class="relative w-full">
                            <a href="{{action('CollectionController@showStudent', ['section' => $section , 'collection' => $collection ])}}">
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
