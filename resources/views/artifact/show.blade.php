@extends('layouts.app')

@section('content')

       <div class="flex  p-0 bg-white justify-center">

       <div class="flex flex-col items-start relative">

                                <span class="absolute top-0 right-0 pt-4 z-10">
                                    
                                    <form action="{{ action('ArtifactController@destroy', $artifact->id)}}" role="form" method="POST">

                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">

                                    <button class="" type="submit">
                                    @icon('icon-trash', ['class' => 'text-gray-500 border-0 hover:text-gray-200 mr-1 mt-2 w-8 h-8 fill-current'])
                                    </button>

                                    </form>

                                    <a href="{{action('ArtifactController@addToCollection', $artifact)}}
                                    ">@icon('icon-briefcase', ['class' => ' text-gray-500 border-0 hover:text-gray-200 mr-1 mt-2 w-8 h-8 fill-current'])</a>

                                    @icon('icon-comment', ['class' => ' text-gray-500 border-0 hover:text-gray-200 mr-1 mt-2 w-8 h-8 fill-current'])

                                </span>

            <div class="">
                <img class="w-full relative h-auto mt-4" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}">
            </div>

                            
       </div>
       
       

       <div class="flex-col w-1/3 p-4">

            <div class="border-2 p-4">

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
            
              
                    <form id="removeFromCollection" method="POST" action="{{ action('CollectionController@removeArtifact',['artifact' => $artifact ,'collection' => $collection ]) }}">
                    
                    <input type="hidden" name="_method" value="DELETE">

                    {{ csrf_field() }}

                        <span class="inline-block text-xs p-1 text-left rounded-lg mr-1 mb-1 bg-gray-200"><a href="{{action('ExploreController@test', $collection)}}">{{ $collection->title }}</a>

                    <input type="submit" cloass="bg-gray-200" value="X">

                    </form>

                    </span>

                @endforeach
            </p>
            
            @endif<br/><br/>
            
            





            <div class="text-xs p-1 text-center rounded-lg bg-gray-200">
            <a href="{{action('ArtifactController@addToCollection', $artifact->id)}}">ADD TO COLLECTION</a>
            </div>
    
       </div>
       </div>
       </div>

    </div>
 
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