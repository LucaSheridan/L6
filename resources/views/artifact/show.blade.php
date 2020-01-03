@extends('layouts.app')

@section('content')

       <div class="flex bg-white justify-center">

       <div class="flex w-2/3 flex-row items-start relative">

        <span class="absolute text-center bg-white top-0 right-0 mt-4 p-2 pb-2 z-10 opacity-75">
                                    
        <div class="flex justify-center items-center">
        <a href="{{action('ArtifactController@addToCollection', $artifact)}}">
        @icon('briefcase', ['class' => ' text-gray-500 border-0 hover:text-gray-200 w-6 h-6'])</a>
        </div>

        <div class="flex">
            <a href="{{action('CommentController@create', $artifact->id)}}">
            @icon('comment', ['class' => 'text-gray-500 border-0 hover:text-gray-200 w-6 h-6'])
            </a>
        </div>

        <div class="flex justify-center">
            <a class="" href="{{ action('ArtifactController@rotate', 
            ['artifact' => $artifact->id, 'degrees' => -90 ])}}">
            @icon('rotate-cw', ['class' => 'text-gray-500 border-0 hover:text-gray-200 w-5 h-5'])
            </a>
        </div>
        
        <div class="flex justify-center">
        <a class="pl-2" href="{{ action('ArtifactController@rotate', 
        ['artifact' => $artifact->id, 'degrees' => 90 ])}}">
        @icon('rotate-ccw', ['class' => 'text-gray-500 border-0 hover:text-gray-200 w-5 h-5 '])</a>
        </div>
        <div class="flex">

                                     <form action="{{ action('ArtifactController@destroy', $artifact->id)}}" role="form" method="POST">

                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button class="" type="submit">
                                        @icon('trash', ['class' => 'text-gray-500 border-0 hover:text-gray-200 w-6 h-6'])
                                        </button>

                                        </form>
        </div>

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
            <p class="font-semibold mb-2">Collections</p>
            
                @foreach ($artifact->collections as $collection)
            
                
                    <form id="removeFromCollection" method="POST" action="{{ action('CollectionController@removeArtifact',['artifact' => $artifact ,'collection' => $collection ]) }}">
                    
                    <input type="hidden" name="_method" value="DELETE">

                    {{ csrf_field() }}

                         <div class="flex mt-1 justify-between rounded-lg bg-gray-200 items-center text-sm">

                            <div class="flex">
                                <a class="pl-2" href="{{action('ExploreController@test', $collection)}}">{{ $collection->title }}</a>
                            </div>
                            
                            <div class="flex bg-gray-200 rounded-lg pr-1">
                                <button type="submit" class="bg-gray-200 rounded-lg">
                                @icon('x-circle', ['class' => ' text-gray-500 border-0 hover:text-gray-200 w-5 h-5'])
                                </button>
                            </div>

                    </div>

                        </form>

                @endforeach
            
            @endif
                       

        </div>

        @if ($artifact->comments)
        
            @foreach ($artifact->comments as $comment)
        
                <div class="shadow relative bg-yellow-200 p-2 mt-1 text-sm tracking-tight leading-tight">
                
                <div class="font-semibold">{{$comment->user->fullName}}</div>
                <div class="mt-2">{{$comment->body}}</div>

                @if ($comment->user_id == Auth::User()->id)
                
                {{-- Editing Options --}}

                    <div class="flex justify-end items-center">
        
                    <a class=""href="{{action('CommentController@edit', ['artifact' => $artifact->id , 'comment' => $comment->id ]) }}">
                    @icon('edit', ['class' => ' text-gray-700 border-0 hover:text-yellow-900 w-5 h-5'])
                    </a>
        
                    <form id="delete_comment" method="POST" action="{{ action('CommentController@destroy',['artifact' => $artifact->id ,'comment' => $comment->id ]) }}">
                    
                    <input type="hidden" name="_method" value="DELETE">

                    {{ csrf_field() }}

                    <button type="submit" class="">
                    @icon('x-circle', ['class' => ' text-gray-700 border-0 hover:text-yellow-900 w-5 h-5'])
                    </button>
                    
                    </form>

                </div>

                @else
                @endif

                </div>

             @endforeach
        
        @else
        @endif


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
    
   
    </div>
                    
@endsection