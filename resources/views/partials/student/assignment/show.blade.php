@extends('layouts.app')

@section('content')
  
<div class="flex flex-wrap bg-gray-600">                    
      
    <div class="w-full sm:w-1/3 md:w-1/4 p-4">
    <div class="mb-2 text-2xl text-gray-300">CLASSES</div>
    
    <select class="px-2 py-1 pr-8 m-0 bg-gray-300 form-select w-full text-xl text-red-500 rounded-lg" onchange="location = this.value;">
          
                            <option class="" value="{{action('HomeController@index', $currentSection->id) }}">{{$currentSection->title}}</option>
            
                                @foreach ( Auth::User()->activeSections as $section)                         
                                               
                                    @if ( $currentSection->id == $section->id ) 

                                    @else
                                        <option value="{{action('HomeController@index', $section->id) }}">{{ $section->title}}</option>
                                    @endif
                                
                                @endforeach

                        </select>
                
                

                <div class="mb-2 mt-4 text-2xl text-gray-300">ASSIGNMENTS</div>
                
                {{-- Begin Assignment Select for > Mobile --}}
  
                    <div class="hidden sm:block px-2 py-2 pr-8 mb-4 bg-gray-300 w-full text-lg rounded-lg text-gray-600 rounded-none">

                    @if ($currentSection->assignments->count() > 0)

                    <ul class="leading-tight text-md">

                        @foreach ($currentSection->assignments as $assignment)
         
                            <li>
                            <a class="text-gray-600 hover:text-red-500 text-sm font-semibold" href="
                            {{action('AssignmentController@showStudent', ['section' => $currentSection->id, 'assignment' => $assignment->id])}}">{{$assignment->title}}</a>
                            </li>

                                                   <!-- <ul class="ml-2">
                                                    @foreach ($assignment->components as $component)
                                                    
                                                    <li class="text-xs">
                                                    <a href="">{{$component->title}}<</li>

                                                    @endforeach
                                                    </ul> -->

                    @endforeach
                    <ul>
                    
                    @else
                    <div class="text-sm">No projects assigned</div>
                    @endif

                    </div>
            


   </div>


    <div class="w-full sm:w-2/3 md:w-3/4 bg-gray-300 p-4">
    
    <div class="mb-2 text-2xl text-gray-600">
    {{strtoupper($currentAssignment->title)}}</div>
    

    <div class="flex flex-wrap items-center items-stretch bg-white rounded-lg p-2">

        <table class="p-2 w-full rounded-lg">

     <tr>
                <td class="w-4 text-gray-600 font-bold py-1 pl-1 ">Status</td>  
                <td class="w-16 py-2 pl-1"></td>
                <td class="w-56 text-gray-600 font-bold py-2 pl-2 ">Component</td>
                <td class="w-4 text-gray-600 font-bold p-2 text-center">Add</td>
                <td class="w-4 text-gray-600 font-bold p-2 text-center">Delete</td>

    </tr> 

    @foreach ($checklist as $checklistItem)
    
    <tr class="border-t-2">
    
    <!-- Component Thumbnail -->

    <!-- Submission Status -->
    <td class="text-center">

        <div class=
        "flex justify-center items-center">
        
                   {{-- Display Empty Checkbox --}}


                    @if (!$checklistItem->artifactCreatedAt)

                        @icon('check-circle', ['class' => 'text-gray-400 w-8 h-8 m-2'])

                    @else

                        @php
                        $duedate = Carbon\Carbon::parse($checklistItem->componentDateDue) 
                        @endphp
                
                        @if ($checklistItem->artifactCreatedAt <= $duedate)

                            @icon('check-circle', ['class' => 'text-green-500 w-8 h-8 m-2'])

                        @else 

                            @icon('check-circle', ['class' => 'text-yellow-500 w-8 h-8 m-2'])

                                                                     
                        @endif

                    @endif

                    </div> 

    </td>

    <td class="">

                @if (!$checklistItem->artifactCreatedAt)

                    <div class="flex items-center justify-center text-sm ">pending
                    </div>

                    @else

                    <div class="flex items-center justify-center text-sm ">

                        <a href="{{ action('ArtifactController@show', $checklistItem->artifactID)}}">
                        <img class="w-16 md:w-24 lg:w-32 h-16 md:w-24 lg:w-32 border-4 border-white rounded-lg" src="https://s3.amazonaws.com/artifacts-0.3/{{$checklistItem->artifactThumb}}"></a>
                    
                    </div>

                @endif

    </td>
    
    <!-- Component Title -->

    <td class="p-2">{{ $checklistItem->componentTitle }}<br/>
    
    <!-- Due Date -->
    
    <span class="text-gray-600 text-xs border-b border-gray-600 w-16 ">
        Due {{Carbon\Carbon::parse($checklistItem->componentDateDue)->format('m/d g:i A ')}}
    </span>

    <br/>
    
    <span class="text-gray-600 text-xs w-16 ">
        @if(!$checklistItem->artifactCreatedAt)
        @else
        Submitted: {{Carbon\Carbon::parse($checklistItem->artifactCreatedAt)->timezone('America/New_York')->format('m/d g:i A')}}
        @endif
    </span>
    <!-- {{ Carbon\Carbon::parse($checklistItem->componentDateDue)->format('D n/j g:i a') }}-->
    </td>
   
    <td class="text-center w-16">

        {{-- Show Image Upload Form or Options for Uploaded Artifact --}}

        <div class=
        "flex justify-center items-center">
        <a href="{{ action('ArtifactController@create', [ 'section' => $currentSection , 'assignment' => $checklistItem->assignmentID , 'component' => $checklistItem->componentID ]) }}">
        @icon('plus-circle', ['class' => 'text-gray-400 hover:text-red-400 w-8 h-8 ml-1'])
        </a>
        </div>

    </td>

        @if ($checklistItem->artifactID)

            {{-- Delete Artifact --}}

                <td class="text-center w-16">

                    <div class="flex justify-center items-center">
                    
                        <a href="{{action('ArtifactController@delete', $checklistItem->artifactID )}}">@icon('x-circle', ['class' => 'text-red-500 border-0 hover:text-red-400 w-8 h-8'])</a>

                    </div>

                    @else

                     <td class="text-center w-16">
                     </td>

                    @endif

                </td>


</tr>

@endforeach

    </table>

    </div>
    </div>

</div>


@endsection
