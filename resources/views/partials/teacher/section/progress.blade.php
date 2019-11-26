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
                            <div>@icon('icon-edit', ['class' => 'w-6 h-6 text-gray-500 hover:text-red-400 fill-current'])</div>
                            <div class="flex pt-1 px-1">Edit</div>
                        </div>
                    </a>
                </div> -->

        </div>

        {{-- Class Navigation --}}

            @include('partials.teacher.section.nav')





<div class="border-2 p-2">

    <div class="border-2 p-2">

        <div class="border-2 p-2">
        <div class="border-2 p-2">
        
            <div class="border-2 p-2">
           
                <span class="text-gray-700 text-xl">
                {{$section->title}} Progress Report:
                 </span>

            </div>

       <table class="block border p-2">
       <tr class="bg-gray-300">

       	@foreach ($section->assignments as $assignment)
       	<td class="bg-gray-400 border-2 p-2 font-bold">{{$assignment->title}}</td>
       	
       		@foreach ( $assignment->components as $component)

       			<td class="border-2 bg-gray-200 p-2">
<!--        				{{$component->date_due}}
 -->       		{{ Carbon\Carbon::parse($component->date_due)->format('n/j ') }}{{$component->title}}</td>

       		@endforeach	

       	@endforeach

       	</tr>
       </table>


       <!-- Begin Table Div -->

        <div class="border-2 p-2">
        
        {{-- Begin Table --}}

        <table class="bg-orange-200 w-full">

            @foreach ($checklist as $checklist_item)

        {{-- Look for unset/not matching current assignent variable --}}

                @if (empty($current_assignment) or ($current_assignment != $checklist_item->assignment_id))

        {{-- Assignment Header--}}

                    <tr>
                        <td colspan="4" class="border-2 border-gray-700">
                            <h4 class="text-red-400 font-bold text-xl p-1">
                                {{ $checklist_item->assignment->title }}</a>
                            </h4>
                        </td>
                    </tr>

        {{-- Table Columns --}}

                    <tr>
                    	<th scope="col" class="p-1 border-2 border-gray-700">Student ID</th>                        

                        <th scope="col" class="p-1 border-2 border-gray-700">Artifact</th>                        
                        <th scope="col" class="p-1 border-2 border-gray-700">Component</th>                        
                        <th scope="col" class="p-1 border-2 border-gray-700">Due Date</th>
                        <th scope="col" class="p-1 border-2 border-gray-700">Status</th>
                    </tr>

        {{-- First Component of an Assignment --}}

                    <tr>
                        
                        {{-- Artifact--}}

                        <td class="border-2 border-gray-700">

                            {{$checklist_item->artistID}}

                        </td>

                        <td class="border-2 border-gray-700">

                            @if ($checklist_item->artifact_thumb)
                            <a href="{{ action('ArtifactController@show', $checklist_item->artifact_id)}}">
                            <img class="tiny" src="https://s3.amazonaws.com/artifacts-0.3/{{$checklist_item->artifact_thumb}}"></a>
                            @else
                            pending
                            @endif

                        </td>

                        {{-- Component Title--}}            
            
                        <td class="border-2 border-gray-700">
                            
                            {{-- Link Presentation Logic --}}

                            @if ($checklist_item->artifact_thumb)
                            <a href="{{ action('ArtifactController@show', $checklist_item->artifact_id)}}">
                            {{ $checklist_item->component_title }}</a>
                            @else
                            {{ $checklist_item->component_title }}
                            @endif

                        </td>

                        {{-- Due Date --}}

                        <td class="border-2 border-gray-700">
                            {{ Carbon\Carbon::parse($checklist_item->component_due)->format('n/j ') }}
                        </td>
                       
                        {{-- Status--}}   
                        
                        <td class="border-2 border-gray-700">
                                    {{-- Status Presentation Logic --}}

                                    @if (!$checklist_item->artifact_thumb)

                                        <span class="label label-default">Pending</span>
            
                                    @else

                                     @php
                                     $duedate = Carbon\Carbon::parse($checklist_item->component_due)->setTimezone('America/New_York') 
                                     @endphp

                                    @if ($checklist_item->artifact_created <= $duedate)

                                         <span class="label label-success">
                                         Uploaded {{ Carbon\Carbon::parse($checklist_item->artifact_created)->setTimezone('America/New_York')->format('n/j') }}</span>
                                    
                                    @else 

                                         <span class="label label-warning">
                                         Uploaded {{ Carbon\Carbon::parse($checklist_item->artifact_created)
                                         ->setTimezone('America/New_York')
                                         ->format('n/j') }}</span>

                                    @endif

                                    {{-- End Status Presentation Logic --}}

                @endif
                                
                        </td>

                    @php
                        $current_assignment = $checklist_item->assignment_id;
                    @endphp
                   
                @else

            {{-- Other Components of an Assignment --}}

                     <tr>

            {{-- Artifact--}}

                         <td class="border-2 border-gray-700">

                            {{$checklist_item->artistID}}

                        </td>

                        <td class="p-1 border-2 border-gray-700">

                            @if ($checklist_item->artifact_thumb)
                            <a href="{{ action('ArtifactController@show', $checklist_item->artifact_id)}}">
                                <img class="tiny" src="https://s3.amazonaws.com/artifacts-0.3/{{$checklist_item->artifact_thumb}}">
                            </a>
                            @else
                            pending
                            @endif

                        </td>
           
              {{-- Component Title--}}            
            
                        <td class="p-1">
                            
                            {{-- Link Presentation Logic --}}

                            @if ($checklist_item->artifact_thumb)
                            <a href="{{ action('ArtifactController@show', $checklist_item->artifact_id)}}">
                            {{ $checklist_item->component_title }}</a>
                            @else
                            {{ $checklist_item->component_title }}
                            @endif

                        </td>

            {{-- Due Date --}}

                        <td class="border-2 border-gray-700 p-1">
                            {{ Carbon\Carbon::parse($checklist_item->component_due)->format('n/j ') }}
                        </td>
            
            {{-- Status--}}   
            
                        <td>
                                    {{-- Status Presentation Logic --}}

                                    @if (!$checklist_item->artifact_thumb)

                                        <span class="label label-default">Pending</span>
            
                                    @else

                                     @php
                                     $duedate = Carbon\Carbon::parse($checklist_item->component_due) 
                                     @endphp

                                    @if ($checklist_item->artifact_created <= $duedate)

                                         <span class="label label-success">
                                         Uploaded {{ Carbon\Carbon::parse($checklist_item->artifact_created)->setTimezone('America/New_York')->format('n/j') }}</span>
                                    
                                    @else 

                                         <span class="label label-warning">
                                         Uploaded {{ Carbon\Carbon::parse($checklist_item->artifact_created)
                                         ->setTimezone('America/New_York')
                                         ->format('n/j') }}</span>

                                    @endif

                                    {{-- End Status Presentation Logic --}}



                @endif

                                
                        </td>

                    </tr>

                @endif
                
            @endforeach

        </table>

         <table class="p-2 bg-blue-100 w-full">

     

     <tr>
                <td class="w-12 text-gray-600 text-semibold py-2 pl-1"><b>Status</b></td>  
                <td class="w-16 py-2 pl-1"></td>
                <td class="w-auto text-gray-600 text-semibold py-2 pl-2 "><b>Component</b></td>
                <td class="w-12 p-2">Add</td>
                <td class="w-12 p-2">Delete</td>

    </tr> 

    @foreach ($checklist as $checklistItem)
    
    <tr class="border-4">
    
    <!-- Component Thumbnail -->

    <!-- Submission Status -->
    <td class="text-center">

            {{-- Display Empty Checkbox --}}


                    @if (!$checklistItem->artifactCreatedAt)

                        @icon('icon-check-circle', ['class' => 'text-gray-400 w-8 h-8 m-2 fill-current'])

                    @else

                        @php
                        $duedate = Carbon\Carbon::parse($checklistItem->componentDateDue) 
                        @endphp
                
                        @if ($checklistItem->artifactCreatedAt <= $duedate)

                            @icon('icon-check-circle', ['class' => 'text-green-500 w-8 h-8 m-2 fill-current'])

                        @else 

                            @icon('icon-check-circle', ['class' => 'text-yellow-500 w-8 h-8 m-2 fill-current'])

                                                                     
                        @endif

                    @endif

    </td>

    <td>

                @if (!$checklistItem->artifactCreatedAt)

                    <div class="bg-gray-200 w-16 h-16 text-center text-sm ">
                    </div>

                    @else

                    <a href="{{ action('ArtifactController@show', $checklistItem->artifactID)}}">

                    <img class="w-16 h-16 border-4 border-white rounded-lg" src="https://s3.amazonaws.com/artifacts-0.3/{{$checklistItem->artifactThumb}}"></a>

                 @endif
   
    </td>
    
    <!-- Component Title -->

    <td class="p-2 ">{{ $checklistItem->componentTitle }}<br/>
    
    <!-- Due Date -->
    
    <span class="text-gray-600 text-xs border-b border-gray-600">
        Due {{Carbon\Carbon::parse($checklistItem->componentDateDue)->format('m/d g:i A ')}}
    </span>

    <br/>
    
    <span class="text-gray-600 text-xs">
        @if(!$checklistItem->artifactCreatedAt)
        @else
        Submitted: {{Carbon\Carbon::parse($checklistItem->artifactCreatedAt)->timezone('America/New_York')->format('m/d g:i A')}}
        @endif
    </span>
    <!-- {{ Carbon\Carbon::parse($checklistItem->componentDateDue)->format('D n/j g:i a') }}-->
    </td>
   
    <td class="text-center">

    {{-- Show Image Upload Form or Options for Uploaded Artifact --}}

    @if ($checklistItem->artifactID)
            
            <a href='{{ action('ArtifactController@create', ['section' => $checklistItem->sectionID , 'assignment' => $checklistItem->assignmentID , 'component' => $checklistItem->componentID] ) }}'>
            @icon('icon-plus-circle', ['class' => 'text-gray-400 hover:text-red-400 w-8 h-8 ml-1 fill-current'])

            </a>
    </td>
    <td class="text-center">

            <form action="{{ action('ArtifactController@destroy', $checklistItem->artifactID) }}" role="form" method="POST">

            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="DELETE">

            <button class="" type="submit">
            @icon('icon-x-circle', ['class' => 'text-red-500 border-0 hover:text-red-400 w-8 h-8 fill-current'])
            </button>
            </form>
            
          
    
    @else

     <a href='{{ action('ArtifactController@create', ['section' => $checklistItem->sectionID , 'assignment' => $checklistItem->assignmentID , 'component' => $checklistItem->componentID] ) }}'>
            @icon('icon-plus-circle', ['class' => 'text-gray-400 hover:text-red-400 w-8 h-8 ml-1 fill-current'])

            </a>

            <!--  <form action="{{ action('ArtifactController@store') }}" role="form" method="POST" enctype="multipart/form-data">

        {!! csrf_field() !!}
  
        <label for="file" class="inline-block bg-red-200 p-2">
        Select a file to upload
        </label>

        <input type="hidden" name="user_id" value="{{ Auth::User()->id }}">
        <input type="hidden" name="section_id" value="{{$checklistItem->sectionID}}">
        <input type="hidden" name="assignment_id" value="{{$checklistItem->assignmentID}}">
        <input type="hidden" name="component_id" value="{{$checklistItem->componentID}}">


        <input type="file" name="file" value="{{ old('file') }}" id="file">

        
        <button type="submit" value="submit">@icon('icon-upload', ['class' => 'text-gray-400 hover:text-red-400 w-8 h-8 ml-1 fill-current'])</input>
        
        </form> -->


        @if ($errors->has('file')) 

            <span class="text-red-600">
            {{ $errors->first('file') }}
            </span>
        
        @endif


        {{-- <form  role="form" method="POST" action="{{ url('/artifact') }}" enctype="multipart/form-data">
                        
        {!! csrf_field() !!}

       
        <input type="file" class="p-2 border rounded bg-gray-200" name="file" placeholder="Browse" value="{{ old('file') }}"/>

        <input type="hidden" name="user_id" value="{{ Auth::User()->id }}">
        <input type="hidden" name="assignment_id" value="{{$checklistItem->assignmentID}}">
        <input type="hidden" name="component_id" value="{{$checklistItem->componentID}}">
        
       <button id="upload" type="submit" class="btn btn-success">Upload
       </button>

        <!-- File Uplaod Errors-->

        @if ($errors->has('file'))
        
            <span class="help-block">
            <strong>{{ $errors->first('file') }}</strong>
            </span>
        
        @endif
                                        
        </form> --}}

    @endif

    </td>


</tr>

@endforeach

    </table>
            
            

        
      
        </div>

        

         </div>
    </div>
                    
@endsection
