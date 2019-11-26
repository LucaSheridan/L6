@extends('layouts.app')

@section('content')
  
<div class="flex flex-wrap">                    
      
    <div class="w-full sm:w-1/4 bg-gray-300 p-4">
    <div class="mb-2 text-2xl text-gray-600">CLASS</div>
    
    <select class="px-2 py-1 pr-8 m-0 bg-gray-300 form-select w-full text-xl text-red-500 rounded-none" onchange="location = this.value;">
          
                            <option class="" value="{{action('HomeController@index', $currentSection->id) }}">{{$currentSection->course->title}}</option>
            
                                @foreach ( Auth::User()->activeSections as $section)                         
                                               
                                    @if ( $currentSection->id == $section->id ) 

                                    @else
                                        <option value="{{action('HomeController@index', $section->id) }}">{{ $section->course->title}}</option>
                                    @endif
                                
                                @endforeach

                        </select>
                
                <div class="bg-gray-200 p-1">
                <div class="ml-2 leading-relaxed">
                
             <!--    <a href="#" class="hover:text-red-500">Blog</a><br/>
                <a href="#" class="hover:text-red-500">Resources</a><br/>
                <a href="#" class="hover:text-red-500">Assignments</a><br/>
 -->
                </div>
                
                @foreach ($currentSection->assignments as $assignment)
            
                <div class="bg-gray-200 p-1 text-sm ml-3 text-gray-700">
                <a href="{{action('AssignmentController@showStudent', ['section' => $currentSection->id, 'assignment' => $assignment->id])}}" class="hover:text-red-500">{{ $assignment->title }}</a>
                </div>
            
            @endforeach

        </div>

    </div>

    <div class="w-full sm:w-3/4 bg-gray-300 border-0 border-blue-500 p-4">
    
    {{-- Artifacts List Title --}}

        <div class="flex border-0 border-yellow-600">
           
            <div class="flex-grow px-2 pt-2 text-left text-2xl rounded-br-lg text-gray-600">CLASSES</div>
            
            <div class="flex border ">
                    
                    {{-- Option 1: Solo Icon Tab Link --}}

                    <a class="" href="{{action('ArtifactController@create')}}">
                        <div class="flex justify-end p-2 bg-gray-200 rounded-t-lg">
                        
                            <div>@icon('icon-plus-circle', ['class' => 'float-right text-gray-500 hover:text-red-400 fill-current'])</div>

                             <div class="flex pt-1 px-1 text-gray-600">Create</div>
 
                        </div>
                     </a>

                     {{-- Option 1: End--}}

                     {{-- Option 2: DropMenu Vue Component --}}


                      <div id="dropmenu" class="border-red-500 border-0 flex-grow justify-start items-center bg-gray-200 rounded-tl-lg"></div>
 
                        
                       <!--  <drop-menu>

                            <template v-slot:menuicon>

                            @icon('icon-plus-circle', ['class' => 'float-right text-gray-500 hover:text-red-400 fill-current'])

                            </template>

                            <template v-slot:menulabel>

                            

                            </template>

                            <template v-slot:menuitems>
                                    
                            <ul>

                            @icon('icon-plus-circle', ['class' => 'ml-3 float-left text-gray-500 hover:text-red-400 fill-current clearfix'])

                            <li class="clearfix text-gray-600">Create a new artifact</li>

                            @icon('icon-view', ['class' => 'ml-3 float-left text-gray-500 hover:text-red-400 fill-current '])

                            <li class="clearfix text-gray-600">View all artifacts</li>

                            </ul>

                            </template>

                        </drop-menu> -->

                        </div>

                        {{-- Option 2: End --}}

                  

            </div>
        
    
    {{-- Artifacts List --}}
   
    <div class="flex flex-wrap items-center items-stretch bg-white p-2 rounded-tl-lg rounded-bl-lg rounded-br-lg mb-4">

       {{--  Begin Tabbed Class Selection on > Small Displays --}}
        
                <div class="hidden sm:block container-full h-full border-0 mb-2">
            
                    {{-- Tab Wrapper --}}

                    <div class="pr-1 flex flex-wrap">
                        
                        @if ($activeSections->count() > 0)

                            @foreach ( $activeSections as $section)   

                             <div class="flex">
                                   
                                    <a class="p-2 no-underline text-sm aliased my-1 ml-1 text-gray-500 border-gray-500 border-2 hover:bg-gray-300 rounded-lg hover:text-gray-700
                                
                                    {{active_check('teacher/section/'.$section->id)}}"
                                    
                                    href="{{action('SectionController@show', $section->id)}}">
                                    {{ $section->title}}</a>

                                </div>
                        
                            @endforeach

                        @else

                        <div class="p-2">    

                        <p>You are currently have no assigned classes.</p>

                        </div>

                        @endif

                </div>
            </div>
    
    </div>

    
    {{-- Collections Title --}}

    <div class="flex border-0 border-yellow-600">
           
        <div class="flex-grow px-2 pt-2 text-left text-2xl rounded-br-lg text-gray-600">ASSIGNMENTS</div>
            
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

                    <div id="dropmenu" class="border-red-500 border-0 flex-grow justify-start items-center bg-gray-200 rounded-tl-lg">
                    
                    </div>
 
                    </div>

                        {{-- Option 2: End --}}
                    </div>
        
    {{-- Collections List --}}

    <div class=" bg-white p-2 rounded">
 @foreach ($currentSection->assignments as $assignment)
            
                <div class="bg-gray-200 p-1 text-sm ml-3 text-gray-700">
                <a href="{{action('AssignmentController@showStudent', ['section' => $currentSection->id, 'assignment' => $assignment->id])}}" class="hover:text-red-500">{{ $assignment->title }}</a>
                </div>
            
            @endforeach
    </div>


     {{-- Collections Title --}}

        <div class="flex border-2 mt-4 border-yellow-600">
           
            <div class="flex-grow px-2 pt-2 text-left text-2xl rounded-br-lg text-gray-600">CLASSES</div>
            
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
        

    
    {{-- --}}

 <div class="flex flex-wrap items-center items-stretch bg-white p-2 rounded">
            
       <div class=" items-center text-center relative p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5">
        
        

        <div class="bg-gray-300 text-gray-700 p-2 rounded-b-lg hover:shadow-xl shadow-lg sm:text-sm">D</div>

        </div>



        {{-- End Individual Artifact Container --}}

@endsection

<!-- <div class="relative w-full sm:w-1/3 p-4 border-t-2 border-b-2 sm:border-2 border-orange-500 tracking-tight text-2xl text-center text-gray-600 hover:text-gray-500 no-underline ">
    
    <div class="absolute z-10 bg-orange-300 p-1 text-sm top-0 right-0">NEW</div>
    ARTIFACTS
    
    </div>

    <div class="w-full sm:w-1/3 p-4 border-b-2 sm:border-t-2 sm:border-b-2 border-orange-500 tracking-tight
    text-2xl text-center text-gray-600 hover:text-gray-500 no-underline ">COLLECTIONS
    </div>

    <div class="w-full sm:w-1/3 p-4 border-b-2 sm:border-2 border-orange-500 tracking-tight
    text-2xl text-center text-gray-600 hover:text-gray-500 no-underline ">CLASSES
    </div> -->


 -->