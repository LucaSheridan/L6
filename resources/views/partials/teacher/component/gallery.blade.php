@extends('layouts.app')

@section('content')
      

{{-- Begin Content Container --}}     

<div class="flex items-center p-4 bg-gray-500">


    <div class="w-full m-0 p-0">

    {{-- Begin Class Header --}} 
            
    <div class="flex border-0">

        {{-- Class Title --}}
        
        <div class="flex-grow px-2 text-left text-2xl rounded-br-lg text-gray-300 mb-2">CLASS</div>
                
                <!-- {{-- Class Menu --}}
               
                <div class="flex ">
                    <a class=""href="{{action('SectionController@edit', $activeSection)}}">
                       <div class="flex justify-end p-1 bg-gray-400 hover:bg-gray-300 rounded-t-lg text-gray-600">
                            <div>@icon('edit', ['class' => 'w-6 h-6 text-gray-500 hover:text-red-400 fill-current'])</div>
                            <div class="flex pt-1 px-1">Edit</div>
                        </div>
                    </a>
                </div> -->

        </div>

        {{-- Class Navigation --}}

            @include('partials.teacher.section.nav')




   {{-- Start Assignment Row --}}

   <div class="flex p-0 flex-wrap w-full mt-4">
         
         {{-- Start Assignment Column One --}}

            <div class="w-full sm:w-1/3 md:w-1/3 lg:w-1/4 border-gray-500 mb-4 sm:border-r-8">
             
            {{--  Assignment Header  --}}

            <div class="flex w-full">

            {{-- Assignments Title --}}
       
            <div class="flex-grow px-2 pt-1 text-left text-2xl rounded-br-lg text-gray-300 mb-1">ASSIGNMENT
            </div>
        
           <!--  {{-- Assignment Menu --}}

                    <div class="flex">
                    
                    <a class=""href="{{action('AssignmentController@edit', ['section' => $activeSection , 'assignment' => $activeAssignment->id ]) }}">
                        
                        <div class="flex justify-end p-1 bg-gray-300 bg-gray-400 hover:bg-gray-300 border-b rounded-t-lg text-gray-600">
                        
                            <div>@icon('edit', ['class' => 'w-6 h-6 text-gray-500 hover:text-red-400 fill-current'])</div>
                            <div class="flex pt-1 px-1"></div>
                            
                             <div>@icon('x-circle', ['class' => 'w-6 h-6 text-gray-500 hover:text-red-400 fill-current'])</div>
                            <div class="flex pt-1 px-1"></div>
 
                        </div>
                     </a>

                    </div> -->
            </div>

           <div class="bg-gray-100 p-1 rounded-lg mb-2 sm:mb-2">

            {{-- Begin Assignment Content for Mobile --}}

                <div class="flex bg-gray-100  border-0">

                    <div class="inline-block relative w-full text-center">

                    <select class="w-full px-2 py-1 pr-8 m-0 bg-gray-300 text-sm font-semibold text-gray-600 form-select" onchange="location = this.value;">
      
                           <option class="" value="{{action('AssignmentController@gallery', ['assignment' => $activeAssignment->id , 'section' => $activeSection->id])}}">{{$activeAssignment->title}}</option>

                         
                             @foreach ( $sectionAssignments as $assignment)                         
                                       
                             @if ( $activeAssignment->id == $assignment->id ) 

                                    @else
                                         <option value="{{action('AssignmentController@gallery', ['assignment' => $assignment->id , 'section' => $activeSection->id])}}" >{{ $assignment->title}}</option>
                                    @endif

                            @endforeach

                             @if ($sectionAssignments->count() < 1) 
                             No Assignments
                             @else
                             @endif
                    </select>
               
                    </div>
                </div>

        {{-- End Assignment Content for Mobile --}}

        </div>

        {{-- End Assignment Wrapper --}}

        <div class="w-full border-gray-500 mb-4">
             
           {{--  Begin Component Header  --}}

            <div class="flex w-full">

                {{-- Component Title --}}
           
                <div class="flex-grow px-2 pt-1 text-left text-2xl rounded-br-lg text-gray-300 mb-1">COMPONENTS
                </div>
            
                <!-- {{-- Component Menu --}}

                    <div class="flex">
                    
                    <a href="{{ action('ComponentController@create', ['section' => $activeAssignment , 'assignment' => $activeAssignment]) }}">    
                        <div class="flex justify-end p-1 bg-gray-300 bg-gray-400 hover:bg-gray-300 border-b rounded-t-lg text-gray-600">
                        
                            <div>
                            @icon('plus-circle', ['class' => 'w-6 h-6 text-gray-500 hover:text-red-400 fill-current'])</div>
                            
                            <div class="flex pt-1 px-1">Add</div>
                           
                        </div>
                     </a>

                    </div>
    
           {{-- End Component Menu --}} -->

           </div>

           {{-- End Component Header --}}

           {{-- Start Component Content --}}

           <!-- Check if Assignments exist -->

            <div class="bg-gray-100 p-1 rounded-lg mb-2 sm:mb-2">

                 @if ($sectionAssignments->count() > 0)

                        <!-- If they do, loop through the assignments -->

                        <accordion class="block bg-gray-100 m-0 p-0">
            
                            <div slot="header"></div>
                    
                            <!-- Assignment Header -->
                         <!--    <a href="{{action('AssignmentController@show', ['assignment' => $assignment->id , 'section' => $activeSection->id])}}" class="text-gray-600 no-underline text-sm hover:text-red-500">
                            <b>{{$activeAssignment->title}}</b> -->

                            <!-- Add Due Date if a Single Component Assignment -->

                            <!-- @if ($activeAssignment->components->count() < 2 )
                                
                                <span class="float-right text-sm text-gray-600">
                                
                                @foreach ( $assignment->components as $component )

                                    {{$component->title}}  {{$component->date_due}}
                                
                                    @if (is_null($component->date_due))
                                    N/A
                                    @else
                                    {{ Carbon\Carbon::parse($component->date_due)->format('m/j/y') }}
                                    @endif
                                
                                @endforeach
                                
                                </span>
                            @else
                                
                                {{-- No due date next to the assignment title --}}
                            
                            @endif -->
                
                        @if ($activeAssignment->components->count() < 2)

                                <div class="block body text-gray-600 text-sm mt-0 mb-0">
                                                                                          
                                    @foreach ( $activeAssignment->components as $component )

                                    {{-- Components --}}

                                    <div class="p-1 ">

                                        <a href="{{action('ComponentController@gallery', ['section' => $assignment->section_id , 'assignment' => $component->assignment_id , 'component' => $component->id ])}}" class="p-0 m-0 hover:text-red-400 hover:rounded no-underline text-sm

                                        {{active_check('teacher/section/'.$activeSection->id.'/assignment/'.$activeAssignment->id.'/component/'.$component->id.'*')}}">
                                        
                                        {{ $component->title}}</a>

                                        <a href="{{action('ComponentController@edit', ['section' => $assignment->section_id , 'assignment' => $component->assignment_id , 'component' => $component->id ]) }}" class="p-0 m-0 hover:text-red-400 no-underline text-sm}}">
       
                                        
                                        <span class="float-right">
                                        @if (is_null($component->date_due))
                                        N/A
                                        @else
                                        {{ Carbon\Carbon::parse($component->date_due)->format('m/j/y') }}</a>
                                        @endif
                                        </span>
                                    
                                    </div>
                    
                                @endforeach

                                </div>                                            


                    </accordion>

                        @else

                            {{-- Multi Component --}}

                                    <div class="block body text-gray-600 text-sm mt-0 mb-0">
                                                                                          
                                    @foreach ( $activeAssignment->components as $component )

                                    {{-- Components --}}

                                    <div class="p-1">

                                        <a href="{{action('ComponentController@gallery', ['section' => $assignment->section_id , 'assignment' => $component->assignment_id , 'component' => $component->id ])}}" class="p-0 m-0 hover:text-red-400 hover:rounded no-underline text-sm

        {{active_check('teacher/section/'.$activeSection->id.'/assignment/'.$activeAssignment->id.'/component/'.$component->id.'*')}}">
                                        
                                        {{ $component->title}}</a>

                                        
                                        <a href="{{action('ComponentController@edit', ['section' => $assignment->section_id , 'assignment' => $component->assignment_id , 'component' => $component->id ]) }}" class="p-0 m-0 hover:text-red-400 no-underline text-sm">
                                        
                                        <span class="float-right">
                                        @if (is_null($component->date_due))
                                        N/A
                                        @else
                                        {{ Carbon\Carbon::parse($component->date_due)->format('m/j/y') }}</a>
                                        @endif
                                        </span>
                                    
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

            {{-- End Column 1 --}}

            <div class="bg-gray-100 w-full sm:w-2/3 md:w-2/3 lg:w-3/4 flex flex-wrap p-2 rounded-lg">


                        @foreach ( $students as $student )

                            <div class="w-1/2 sm:w-1/2 md:w-1/3 lg:w-1/4 border-4 border-white">

                             <a href="{{ action('SectionController@studentProgress', [ 'user' => $student->id , 'section' => $activeSection->id ] )}}">

                            
                            <div class="flex items-stretch p-2 bg-gray-300 text-gray-700 rounded-t-lg text-xs ">{{ $student->fullName}}</div></a>
                
                            
                                @if ($student->artifacts->count() > 0)
                            
                                @foreach ($student->artifacts as $artifact)

                                    <a href="{{ action('ArtifactController@show', $artifact->id)}}">
                                    
                                    <img class="border-4 border-red-300 w-full" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}"></a>

                                @endforeach

                            @else
                            <div class="p-2 bg-gray-100 border text-gray-700 w-full">nope</div>
                            @endif
                             
                             </div>

                        @endforeach

            </div>
            </div>

    </body>  

@endsection

