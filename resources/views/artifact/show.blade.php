@extends('layouts.app')

@section('content')

       <div class="flex p-4 bg-white">

        <div class="w-2/3 relative">
                                    <span class="float-right absolute top-0 right-0">
                                    
                                    <form action="{{ action('ArtifactController@destroy', $artifact->id)}}" role="form" method="POST">

                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">

                                    <button class="" type="submit">
                                    @icon('icon-trash', ['class' => 'float-right text-gray-100 border-0 hover:text-gray-700 mr-1 mt-2 w-8 h-8 fill-current'])
                                    </button>

                                    </form>
                                </span>

                    <a href="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}">

                         <img class="w-full" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}">

                    </a>

        </div>

        <div class="w-1/3 pl-4 pt-2 text-sm leading-tight text-gray-700">
        
            {{-- Artist--}}
            
                <p class="font-semibold">Artist</p>

                <p class="mb-2">{{ $artifact->user->fullName }}</p>

            {{-- Teacher--}}

            @if (is_null($artifact->section_id))
            @else
            <p class="font-semibold">Teacher
            </p>
            <p class="mb-2">
                @foreach ( $artifact->section->teachers as $teacher )
                {{$teacher->fullName}}
                @endforeach
            
            {{-- Course--}}

            <p class="font-semibold">Course
            </p>
            <p class="mb-2">
            {{ $artifact->section->course->name}}</a>
            </p>
            @endif

            @if (is_null($artifact->assignment))
            @else
            <p class="font-semibold">Assignment
            </p>
            <p class="mb-2">
            <a href="{{ action('AssignmentController@showStudent', ['section' => $artifact->assignment->section, 'assignment' => $artifact->assignment_id] )}}">
            {{ $artifact->assignment->title }}</a>
            </p>
            @endif

            <p class="font-semibold">Annotation
            </p>
         <p class="mb-4">
{{ $artifact->annotation }}
             </p>

            @if (is_null($artifact->component))
            @else
            <p class="font-semibold">Component
            </p>
            <p class="mb-2">
            {{ $artifact->component->title }}</p>
            @endif

            @if (is_null($artifact->component))
            @else
            <p class="font-semibold">Submitted
            </p>
            <p class="mb-2">
            {{ $artifact->created_at }}</p>
            @endif

            @if (!is_null($artifact->collections))
            <p class="font-semibold">Collections</p>
            <p class="mb-2">
            @foreach ($artifact->collections as $collection)
            - {{ $collection->title }}|{{ $collection->curators->first()->fullName }} <br/>
            @endforeach
            </p>
            @endif<br/><br/>
            ADD TO COLLECTIONS + 

            @foreach (Auth::User()->collections as $collection)

            <form id="addToCollection" method="POST" action="{{ action('ArtifactController@addToCollection',['artifact' => $artifact ,'collection' => $collection ]) }}">
                {{ csrf_field() }}

            <!-- <label for="file" class="inline-block bg-red-200 p-2">
            Select a collection to 
            </label> -->
            
            <input type="submit" class="mt-2 p-1 rounded-lg"value="+ {{$collection->title}}">

            </form>

            @endforeach
        
            <br/><br/>
            COLLECTED IN:

            @foreach (Auth::User()->collections as $collection)

                <form id="addToCollection" method="POST" action="{{ action('ArtifactController@addToCollection',['artifact' => $artifact ,'collection' => $collection ]) }}">
                    {{ csrf_field() }}

                <!-- <label for="file" class="inline-block bg-red-200 p-2">
                Select a collection to 
                </label> -->
                
                <input type="submit" class="mt-2 p-1 rounded-lg"value="+ {{$collection->title}}">

                </form>

            @endforeach


        </div>
        



       <!--  <img class="object-contain" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}">-->

       </a>
 
    </div>

    <div>




    <!-- Comments -->
    <!-- End Comments -->

    <!-- Collection -->
    <!-- End Collection -->
    

    {{-- <a class="btn btn-primary m-1" href='{{ action('ArtifactController@rotate', [ 'id' => $artifact->id, 'degrees' => '90' ]) }}'>Rotate counterclockwise</a>

    <a class="btn btn-primary m-1" href='{{ action('ArtifactController@rotate', [ 'id' => $artifact->id, 'degrees' => '-90' ]) }}'>Rotate clockwise</a> --}}

       
    </div>
                    
@endsection