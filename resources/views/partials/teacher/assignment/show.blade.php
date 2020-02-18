@extends('layouts.app')

@section('content')
      
<div class="flex items-center p-4 bg-gray-500">

{{-- Begin Content Container --}}     

<div class="w-full m-0 p-0">

{{-- START CLASS -----------------------------------------------------------------------------------------}}
        
            {{-- Begin Class Header --}} 
            <div class="flex border-0">

                {{-- Class Title --}}
                <div class="flex-grow px-2 text-left text-2xl rounded-br-lg text-gray-300 mb-2">CLASS</div>
                
                <!-- {{-- Class Menu --}}
               
                <div class="flex ">
                    <a class=""href="{{action('SectionController@edit', $activeSection)}}">
                       <div class="flex justify-end p-1 bg-gray-400 hover:bg-gray-300 rounded-t-lg text-gray-600">
                            <div>@icon('edit', ['class' => 'w-5 h-5 text-gray-500 hover:text-red-400 '])</div>
                            <div class="flex pt-1 px-1">Edit</div>
                        </div>
                    </a>
                </div> -->

            </div>

            {{-- Begin Class Content --}}

                    <div class="hidden sm:block pr-1 sm:flex sm:flex-wrap bg-white rounded-lg rounded-br-lg">
                        
                        @if (Auth::User()->activeSections()->count() > 0)

                            @foreach ( Auth::User()->activeSections as $section)  

                             <div class="flex">
                                   
                                    <a class="p-2 no-underline text-sm aliased my-1 ml-1 text-gray-500 rounded-lg bg-gray-200 hover:bg-gray-300 hover:text-gray-700
                                
                                    {{active_check('teacher/section/'.$section->id.'/*')}}"
                                    
                                    href="{{action('SectionController@show', $section)}}">

                                    {{ $section->title}}</a>

                                </div>
                        
                            @endforeach

                        @else

                        <div class="p-2">

                            <p>You are currently have no assigned classes.</p>

                        </div>

                        @endif

                    </div>
        
            {{-- End Class Content --}}

            
            {{-- Begin Class Content for Mobile --}}

            <div class="sm:hidden">
                        
                <div class="bg-gray-100 sm:hidden p-1 flex flex-wrap w-full rounded-lg">

                <div class="sm:hidden w-full">
                        
                <div class="bg-gray-100 sm:hidden py-0 flex flex-wrap w-full border-0">

                {{-- Begin Class Dropdown on small displays --}}

                    <div class="sm:hidden w-full">
                        
                        <div class="sm:hidden px-0 py-0 flex flex-wrap w-full mr-4">
                    
                            <select class="px-2 py-1 pr-8 m-0 bg-gray-300 form-select w-full text-lg text-red-500" 
                            onchange="location = this.value;">
      
                                 <option class="" value="{{action('SectionController@show', $section->id) }}">{{$activeSection->title}}</option>
                
                                    @foreach ( Auth::User()->activeSections as $section)                         
                                                   
                                        @if ( $section->id == $activeSection->id ) 
                                        @else
                                            <option value="{{action('SectionController@show', $section->id) }}">{{ $section->title}}</option>
                                        @endif
                                    
                                    @endforeach

                            </select>

                        </div> 

                    </div>

                {{-- Begin Class Dropdown on small displays --}}


            </div>

        </div>

        {{--  End Class Section on Small Screens --}}

    </div>

   {{-- End Class Row --}}

   </div> 

   {{-- Start Assignment Row --}}



   <div class="flex p-0 flex-wrap w-full mt-4">
         
         {{-- Start Assignment Column One --}}

            <div class="w-full md:w-2/5 border-gray-500 mb-4 sm:mb-0 sm:border-r-8 ">
             
          
            {{--  Assignment Header  --}}

            <div class="flex items-center mt-0 mb-1">
           
            {{-- Assignments Title --}}
       
            <div class="flex-grow mb-0 px-2 text-left text-2xl rounded-br-lg text-gray-200">
                ASSIGNMENT                    
            </div>
        
            {{-- Assignment Menu --}}

                   <div class="flex relative text-left">
                    
                    <dropdown>
    
                    <template v-slot:trigger>
                    @icon('menu', ['class' => ' w-5 h-5 text-gray-200'])              

                    </template>

                    <div class="z-10 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-400 rounded py-1 list-none text-left leading-normal whitespace-no-wrap">

                        <li class="hover:text-gray-300 px-3">
                        <a class="" href="{{action('AssignmentController@edit', ['section' => $activeSection , 'assignment' => $activeAssignment])}}"> 
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('edit', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Edit</div>
                        </div>
                        </a>
                        </li>


                        <li class="hover:text-gray-300 px-3">
                        <a class="" href="{{action('AssignmentController@delete', ['section' => $activeSection , 'assignment' => $activeAssignment ])}}"> 
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('x-circle', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Delete</div>
                        </div>
                        </a>
                        </li>
               
                    </div>

                </dropdown>
            </div>

        </div>

           <div class="bg-gray-100 p-1 rounded-l-lg rounded-br-lg mb-2 sm:mb-2">

            {{-- Begin Assignment Content for Mobile --}}

                <div class="flex bg-gray-100  border-0">

                    <div class="inline-block relative w-full text-center">

                    <select class="w-full px-2 py-1 pr-8 m-0 bg-gray-300 text-sm font-semibold text-gray-600 form-select" onchange="location = this.value;">
      
                           <option class="" value="{{action('HomeController@index', $activeAssignment->id) }}">{{$activeAssignment->title}}</option>

                            
                             @foreach ( $sectionAssignments as $assignment)                         
                                       
                             @if ( $activeAssignment->id == $assignment->id ) 

                                    @else
                                         <option value="{{action('AssignmentController@show', ['assignment' => $assignment->id , 'section' => $activeSection->id])}}" >{{ $assignment->title}}</option>
                                    @endif

                            @endforeach

                             @if ($sectionAssignments->count() < 1) 
                             No Assignments
                             @else
                             @endif
                    </select>
               
                    </div>
                </div>

        <div class="p-2 text-sm leading-tight text-gray-600">
        <div class="font-semibold mb-1 text-gray-500">DESCRIPTION:</div>{{ $activeAssignment->description}}</div>

        {{-- End Assignment Content for Mobile --}}

        </div>

        {{-- End Assignment Wrapper --}}

        </div>

        {{-- close column 1 yellow --}}   


{{-- START Column 2 --------------------------------------------------------------------------------------------}}

 <div class="w-full md:w-3/5 border-red-500 mb-4">
             
           {{--  Assignment Header  --}}

            <div class="flex items-center mt-0 mb-1">
           
            {{-- Assignments Title --}}
       
            <div class="flex-grow mb-0 px-2 text-left text-2xl rounded-br-lg text-gray-200">
                COMPONENTS                    
            </div>
        
            {{-- Assignment Menu --}}

                   <div class="flex relative text-left">
                    
                    <dropdown>
    
                    <template v-slot:trigger>
                    @icon('menu', ['class' => ' w-5 h-5 text-gray-200'])              

                    </template>

                    <div class="z-10 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-400 rounded py-1 list-none text-left leading-normal whitespace-no-wrap">

                        <li class="hover:text-gray-300 px-3">
                        <a class="" href="{{action('ComponentController@create', ['section' => $activeSection , 'assignment' => $activeAssignment])}}"> 
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('edit', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Create</div>
                        </div>
                        </a>
                        </li>
               
                    </div>

                </dropdown>
            </div>

        </div>
           {{-- Start Component Content --}}

           <!-- Check if Assignments exist -->

            <div class="bg-gray-100 p-1 rounded-l-lg rounded-br-lg mb-2 sm:mb-2">

                 @if ($sectionAssignments->count() > 0)

                        <!-- If they do, loop through the assignments -->    
                
                        @if ($activeAssignment->components->count() < 2)

                                <div class="block body text-gray-600 text-sm mt-0 mb-0">
                                                                                          
                                    @foreach ( $activeAssignment->components as $component )

                                    {{-- Components --}}

                                    <div class="p-1">
                            
                                        <a href="{{action('ComponentController@gallery', ['section' => $assignment->section_id , 'assignment' => $component->assignment_id , 'component' => $component->id ])}}" class="p-0 m-0 hover:text-red-400 hover:rounded no-underline text-sm">
                                        {{ $component->title}}</a>

                                        
                                        <a href="{{action('ComponentController@edit', ['section' => $assignment->section_id , 'assignment' => $component->assignment_id , 'component' => $component->id ]) }}" class="p-0 m-0 hover:text-red-400 no-underline text-sm">
                                        
                                        <span class="float-right">
                                        @if (is_null($component->date_due))
                                        N/A
                                        @else
                                        {{ Carbon\Carbon::parse($component->date_due)->format('m/j/y') }}
                                        </a>
                                        @endif
                                        </span>
                                    
                                    </div>
                    
                                @endforeach

                                </div>                                            

                        @else

                            {{-- Multi Component --}}

                                    <div class="text-gray-600 text-sm">
                                                                                          
                                        @foreach ( $activeAssignment->components as $component )

                                        {{-- Components --}}

                                            <div class="flex items-center leading-tight">
                            
                                            <div class="flex flex-grow pl-2">
                                                <a href="{{action('ComponentController@gallery', ['section' => $assignment->section_id , 'assignment' => $component->assignment_id , 'component' => $component->id ])}}" class="hover:text-red-400 hover:rounded no-underline text-sm">
                                                {{ $component->title}}</a>
                                            </div>

                                            <div class="flex mr-2">
                                                <a href="{{action('ComponentController@edit', ['section' => $assignment->section_id , 'assignment' => $component->assignment_id , 'component' => $component->id ]) }}" class="hover:text-red-400 no-underline text-sm">        
                                                    @if (is_null($component->date_due))
                                                    N/A
                                                    @else
                                                    Due {{ Carbon\Carbon::parse($component->date_due)->format('m/j') }}
                                                     @endif
                                                </a>
                                            </div>
                                            
                                            <div class="flex mr-1 relative">
                                            <dropdown>
    
                    <template v-slot:trigger>
                    @icon('menu', ['class' => ' w-4 h-4 text-gray-500'])              

                    </template>

                    <div class="z-10 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-400 rounded py-1 list-none text-left leading-normal whitespace-no-wrap">

                        <li class="hover:text-gray-300 px-3">
                        <a href="{{action('ComponentController@edit', ['section' => $assignment->section_id , 'assignment' => $component->assignment_id , 'component' => $component->id ]) }}" class="hover:text-gray-200 no-underline text-sm">
                                         
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('edit', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Edit</div>
                        </div>
                        </a>
                        </li>


                        <li class="hover:text-gray-300 px-3">
                        <a class="" href="{{action('ComponentController@delete', ['section' => $activeSection , 'assignment' => $activeAssignment, 'component' => $component])}}"> 
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('x-circle', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Delete</div>
                        </div>
                        </a>
                        </li>
               
                    </div>

                </dropdown> </div>



                                            </div>
                    
                                    @endforeach

                            </div>                                            

                        @endif
        
                    </div>                                            
                     </accordion>

                            @else
           
                                <div class="text-gray-600 bg-gray-100 p-2 no-underline text-sm">No assignments
                                </div>            
                            
                            @endif
            </div>
            </div>
            </div>

    </body>

    

@endsection

