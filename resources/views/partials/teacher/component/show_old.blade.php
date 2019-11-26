@extends('layouts.app')

@section('content')
    
    <div class="flex flex-wrap w-full bg-yellow-400 ">
    

    <div class="w-1/4 bg-gray-300">

             
                    <h4 class="m-2"><strong>{{ $assignment->title }}</strong></h4>
                
                    <p class="m-2">Components</p>


                    @foreach ( $assignment->components as $componentListItem )

                    <a href="{{ action('ComponentController@gallery', [$section->id, $assignment->id, $componentListItem->id]) }}">

                    <div class="m-2">- {{ $componentListItem->title }}</a>
                    |{{ Carbon\Carbon::parse($componentListItem->date_due)->setTimezone('America/New_York')->format('n/j') }}
                    </div>

                    @endforeach
 
                </div>
    
                <!-- Begin Component Page -->

    <div class="w-3/4 bg-gray-100 text-gray-500 p-4">
               

            <a href="{{ action('SectionController@show', $section->id ) }}">

            {{ $section->title }}</a>
            
                {{-- <a href="{{ action('SectionController@ViewClassAssignment', ['section' => $section->id,'assignment' => $assignment->id])}}"> --}}

            {{ $assignment->title }}</a>
            | Component: {{ $component->title }}
            
                <div class="flex flex-wrap bg-gray-700 text-gray-500 p-4">
     
                        @foreach ( $students as $student )

                            <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 w-1/6 border-0 p-2 border-gray-500">

                             {{-- <a href="{{ action('SectionController@StudentAssignmentProgressView', [ 'user' => $student->id , 'section' => $section->id , 'assignment' => $assignment->id ] )}}"> --}}

                            <div class="flex items-stretch p-2 bg-gray-300 text-gray-700">{{ $student->fullName}}</div>
                
                            @if ($student->artifacts->count() > 0)
                            
                                @foreach ($student->artifacts as $artifact)

                                    <a href="{{ action('ArtifactController@show', $artifact->id)}}">
                                    <img class="border-4 border-white w-full" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}"></a>

                                @endforeach

                            @else
                            <div class="flex items-stretch p-2 bg-gray-300 text-gray-700 border-4 border-white w-full">nope</div>
                            @endif
                             
                             </div>

                        @endforeach

                </div>


                        


            </div>
            
            
            </div>

        </div>
    </div>
</div>
@endsection