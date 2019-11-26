@extends('layouts.app')

@section('content')
      

{{-- Begin Content Container --}}     

<div class="flex items-center p-4 bg-gray-500">


    <div class="w-full m-0 p-0">

    {{-- Begin Class Header --}} 
            
    <div class="flex border-0">

        {{-- Class Title --}}
        
        <div class="flex-grow px-2 text-left text-2xl rounded-br-lg text-gray-300 mb-2">CLASS</div>
                
    </div>

        {{-- Class Navigation --}}

            @include('partials.teacher.section.nav')

   <div class="flex flex-wrap w-full mt-4">
         
{{-- START STUDENTS ------------------------------------------------------------------------------------------------}}

 <div class="w-full  sm:w-1/3 md:w-1/4 b-4 sm:mb-0 sm:border-r-8 border-gray-500">
             
           {{--  Begin Student Header  --}}

            <div class="flex w-full">

                {{-- Students Title --}}
           
                <div class="flex-grow px-2 pt-1 text-left text-2xl rounded-lg text-gray-300 mb-1">STUDENTS
                </div>
            
                {{-- Students Menu --}}

                    <!-- <div class="flex">
                    
                    <a class=""href="{{action('SectionController@edit', $activeSection)}}">
                        
                        <div class="flex justify-end p-1 bg-gray-400 hover:bg-gray-300 border-b border-gray-400 rounded-t-lg text-gray-600">
                        
                            <div>@icon('icon-search', ['class' => 'w-4 h-4 float-right ml-1 fill-current'])</div>
                            <div class="flex pt-1 px-1">Search</div>
 
                        </div>
                     </a>

                    </div> -->
    
                {{-- End Students Menu --}}

           </div>

           {{-- End Students Header --}}

            @if ($activeSection->students->count() > 0)

                                <div class="bg-gray-100 rounded-lg p-2 text-sm">
                                    <ul class="leading-snug text-sm no-underline text-gray-700">
                                    
                                    @foreach ($activeSection->students as $student)
                                    
                                    <a href="{{action('SectionController@studentProgress', ['section'=> $activeSection, 'user' => $student])}}">
                                               
                                    @if ($user->id == $student->id)
                                    <li class="pl-2 rounded-sm text-red-500 text-sm bg-gray-100 hover:bg-gray-200 hover:text-red-500">
                                    {{ $student->fullName}}</li>
                                    @else
                                    <li class="pl-2 rounded-sm text-gray-600 text-sm bg-gray-100 hover:bg-gray-200 hover:text-red-500">
                                    {{ $student->fullName}}</li>
                                    @endif

                                    </a>
                                    

                                @endforeach
                            </ul>

                                </div>

                            @else
           
                                <div class="text-gray-600 rounded-l-lg rounded-br-lg bg-gray-100 p-3 no-underline text-sm">

                                No students are currently enrolled in this class.
                                </div>            
                            
                            @endif


            </div>

            {{-- START Progress -----------------------------------------------------------------------------------}}

         <div class="w-full sm:w-2/3 md:w-3/4 border-gray-500 mb-4">
             
           {{--  Begin Progress Header  --}}

            <div class="flex w-full">

                {{-- Progress Title --}}
           
                <div class="flex-grow px-2 pt-1 text-left text-2xl rounded-br-lg text-gray-300 mb-1">PROGRESS 
                </div>
            
                <!-- {{-- Progress Option --}}

                    <div class="flex ">
                    
                    <a class=""href="{{action('AssignmentController@create', $activeSection)}}">
                        
                        <div class="flex justify-end p-1 bg-gray-300 bg-gray-400 hover:bg-gray-300 border-b rounded-t-lg text-gray-600">
                        
                            <div>@icon('icon-plus-circle', ['class' => 'w-6 h-6 text-gray-500 hover:text-red-400 fill-current'])</div>
                            <div class="flex pt-1 px-1">Create</div>
 
                        </div>
                     </a>

                    </div>
    
                {{-- End Progress Option Menu --}} -->

           </div>

           {{-- End Assignment Header --}}

           <div class="bg-gray-100 p-1 rounded-l-lg rounded-lg mb-2 sm:mb-2">

                {{-- Begin Progress Content --}}

                 <div class="text-gray-600 text-xl pt-2 pl-2 ">
                {{$user->fullName}}
                </div>


    <div class="flex flex-wrap items-center items-stretch bg-white rounded-lg p-2">

    <table class="p-2 bg-gray-200 w-full rounded-lg ">

    @foreach ($checklist as $checklistItem)

            {{-- Look for unset/not matching current assignent variable --}}

                @if (empty($current_assignment) or ($current_assignment != $checklistItem->assignment_id))

               {{-- Assignment Header--}}

                    <tr>
                        <td colspan="5" class="border-2">
                            <div class="text-gray-600 text-md font-semibold text-gray-400 p-1">
                                {{ $checklistItem->assignment->title }}</a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                <td class="w-12 text-xs text-gray-500 font-semibold py-2 pl-2">Status</td>  
                <td class="w-16 py-2 pl-1"></td>
                <td class="w-auto text-xs text-gray-500 font-semibold  p-2 ">Component</td>
                <td class="w-auto text-xs text-gray-500 font-semibold  py-2 pl-2 ">Annotation</td>
                <td class="w-auto text-xs text-gray-500 font-semibold  py-2 pl-2 ">Comments</td>


    </tr> 

                    @php
                    $current_assignment = $checklistItem->assignment_id;
                    @endphp

                @else




                @endif

                 


    
    <tr class="border-t-2">
    
    <!-- Submission Status -->
    <td class="text-center">

            {{-- Display Status Icon --}}


                    @if (!$checklistItem->artifact_thumb)

                        @icon('icon-check-circle', ['class' => 'text-gray-400 w-8 h-8 m-2 fill-current'])

                    @else

                        @php
                        $duedate = Carbon\Carbon::parse($checklistItem->component_due) 
                        @endphp
                
                        @if ($checklistItem->artifact_created <= $duedate)

                            @icon('icon-check-circle', ['class' => 'text-green-500 w-8 h-8 m-2 fill-current'])

                        @else 

                            @icon('icon-check-circle', ['class' => 'text-yellow-500 w-8 h-8 m-2 fill-current'])

                                                                     
                        @endif

                    @endif

    </td>

    
    <td>

            {{-- Display Preview Image  --}}

                @if (!$checklistItem->artifact_created)

                    <div class="bg-gray-200 w-16 h-16 text-center text-sm ">pending
                    </div>

                    @else

                    <a href="{{ action('ArtifactController@show', $checklistItem->artifact_id)}}">

                    <img class="w-16 h-16 border-4 border-white rounded-lg" src="https://s3.amazonaws.com/artifacts-0.3/{{$checklistItem->artifact_thumb}}"></a>

                 @endif
   
    </td>

    {{-- Display Component Info  --}}

    <td class="p-2 ">{{ $checklistItem->component_title }}<br/>
    
    <!-- Due Date -->
    
    <span class="text-gray-500 text-xs border-b border-gray-600">
        Due {{Carbon\Carbon::parse($checklistItem->component_due)->format('m/d g:i A ')}}
    </span>

    <br/>
    
    <span class="text-gray-600 text-xs">
        @if(!$checklistItem->artifact_created)
        @else
        Submitted: {{Carbon\Carbon::parse($checklistItem->artifact_created)->timezone('America/New_York')->format('m/d g:i A')}}
        @endif
    </span>
    <!-- {{ Carbon\Carbon::parse($checklistItem->componentDateDue)->format('D n/j g:i a') }}-->
    </td>

   {{-- Annotation--}}

   <td class="p-2 font-serif text-gray-700 leading-snug">

            @if ($checklistItem->artifact_annotation) 

                    <div class="rounded-lg p-2 bg-gray-100 max-w-xl">
                    {{$checklistItem->artifact_annotation}}</div>
            
            @else

                <div></div>


            @endif

        
    </td>
    
        <td class="bg-gray-200 roundedfont-serif leading-snug">
        
    {{-- Teacher Comments--}}
    
    <div class="p-2 max-w-xl">

        @if ( !$checklistItem->artifact )

        <span class="block bg-yellow-300 shadow-lg rounded font-serif text-yellow-900 hover:shadow-xl p-2">{{$checklistItem->artifact_annotation}}</span></div></td>

        @else

            @hasrole('teacher')
            I can post a comment!
            @else
            I can't post a comment
            @endhasrole

        @endif
    </td>
   



</tr>

@endforeach

    </table>  

                {{-- End Progress Content --}}

           </div>

 {{-- End Assignment Wrapper --}}
 
    </div>
    </div>

</body>

@endsection









              
                    
