@extends('layouts.app')

@section('content')

       <div class="flex flex-wrap justify-center">

            <div class="flex flex-row w-full bg-red-00 md:w-2/3 items-start border-0 mt-4 mr-0 ml-0 ml-4 md:ml-0 mb-4 relative">

                        <a class="cursor-zoom-in pr-10" href="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}">
                            <img class="w-full border-4" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}">
                        </a>  

                        {{-- artifact menu trigger --}}

                        <div class="absolute bg-gray-300 p-0 mr-2 z-10 top-0 right-0">
                    
                        <div class="relative">

                        <dropdown>
        
                            <template v-slot:trigger>
                            @icon('menu', ['class' => ' w-5 h-5 my-0 mx-2 hover:text-gray-400 text-gray-600'])
                            </template>

                                <div class="z-10 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-400 rounded py-1 list-none text-left leading-normal whitespace-no-wrap mr-2 m-auto">            

                                 <div class="hover:text-gray-300 px-3">
                                <a href="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}">
                                <div class="flex items-center">
                                <div class="pr-2 text-gray-500">
                                @icon('zoom-in', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                                 <div>Magnify</div>
                                </div>
                                </a>
                                </div>

                                <div class="hover:text-gray-300 px-3">
                                <a href="{{action('ArtifactController@addToCollection', $artifact->id)}}">
                                <div class="flex items-center">
                                <div class="pr-2 text-gray-500">
                                @icon('briefcase', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                                 <div>Add to Collection</div>
                                </div>
                                </a>
                                </div>

                                <div class="hover:text-gray-300 px-3">
                                <a href="{{action('ArtifactController@rotate', ['artifact' => $artifact->id, 'degrees' => -90])}}">
                                <div class="flex items-center">
                                <div class="pr-2 text-gray-500">
                                @icon('rotate-cw', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                                 <div>Rotate CW</div>
                                </div>
                                </a>
                                </div>

                                <div class="hover:text-gray-300 px-3">
                                <a href="{{action('ArtifactController@rotate', ['artifact' => $artifact->id, 'degrees' => 90])}}">
                                <div class="flex items-center">
                                <div class="pr-2 text-gray-500">
                                @icon('rotate-ccw', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                                 <div>Rotate CCW</div>
                                </div>
                                </a>
                                </div>

                                <form action="{{action('ArtifactController@destroy', $artifact)}}" method="POST">

                                <div class="hover:text-gray-300 px-3">
                                
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                 <div class="flex items-center">
                                <div class="pr-2 text-gray-500">
                                 <button>@icon('x-circle', ['class' => 'w-5 h-5 hover:text-gray-200'])</button></div>
                                 <button><div>Delete</div></button>
                                </div>
                                </form>
                                </div>
                                </div>

                        </dropdown>

                    </div>


                    </div>            
           </div>


     <!--   <div class="flex-row mt-4 items-center border-2">
           
           <div>a</div>
           <div>b</div>
           <div>c</div>
       </div> -->
       
<div class="mt-4 w-full pl-0 md:w-1/3 md:pl-0 mr-4 md:mr-0 text-sm relative bg-green-000">

    <div class="absolute bg-gray-000 p-0 mr-0 z-10 top-0 right-0">
                    <div class="relative">

                    <dropdown>
    
                    <template v-slot:trigger>
                    @icon('menu', ['class' => ' w-5 h-5  ml-2 hover:text-gray-400 text-gray-00'])
                    </template>

                    <div class="z-10 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-400 rounded py-1 list-none text-left leading-normal whitespace-no-wrap mr-2 m-auto">            

                        <div class="hover:text-gray-300 px-3">
                        <a href="{{action('ArtifactController@edit', $artifact->id)}}">
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('edit', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Edit</div>
                        </div>
                        </a>
                        </div>

                        <div class="hover:text-gray-300 px-3">
                        <a href="{{action('CommentController@create', $artifact->id)}}">
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('comment', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Comment</div>
                        </div>
                        </a>
                        </div>

                        <div class="hover:text-gray-300 px-3">
                        <a href="{{action('ArtifactController@addToCollection', $artifact->id)}}">
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('briefcase', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Add to Collection</div>
                        </div>
                        </a>
                        </div>
               
                    </div>

                </dropdown>

                        </div>


                    </div>    
                
    <div id="info" class="bg-red-000 p-1">
    {{-- Artifact Info Title --}}
    
    <p class="text-gray-500 font-semibold text-lg uppercase mb-2 px-4 py-1">Info</p>

    {{-- Artifact Info Frame --}}
    <div class="border-2 ml-4 mb-2 p-3 leading-snug text-sm rounded-lg">

        {{-- Artist--}}
                
                <div class="font-semibold ">
                @if (is_null($artifact->artist))
                {{ $artifact->user->fullName }}
                @else
                {{ $artifact->artist }}
                @endif
                </div>
        {{-- Title--}}

                @if (is_null($artifact->title))
                @else
                <div class="italic text-md">{{ $artifact->title }} </div>
                @endif
        {{-- Medium--}}

                @if (is_null($artifact->medium))
                @else
                <div>{{ $artifact->medium }} </div>
                @endif
        <!-- {{-- Teacher--}}

                @if (is_null($artifact->section_id))
                @else
                <p class="font-semibold">Teacher
                </p>
                <p class="mb-2">
                    @foreach ( $artifact->section->teachers as $teacher )
                    {{$teacher->fullName}}
                    @endforeach -->               
        <!--  {{-- Course--}}

                <p class="font-semibold">Course
                </p>
                <p class="mb-2">
                {{ $artifact->section->course->name}}</a>
                </p>
                @endif -->

                <div>
                @if (is_null($artifact->assignment))
                @else
                <a href="{{ action('AssignmentController@showStudent', ['section' => $artifact->assignment->section, 'assignment' => $artifact->assignment_id] )}}">
                {{ $artifact->assignment->title }}</a>
                @endif
                </div>
        {{-- Component--}}
                <div>
                @if (is_null($artifact->component))
                @else
                </div>
                <p class="mb-2 text-lg">
                {{ $artifact->component->title }}</p>
                @endif
        {{-- Annotation--}}
       
        <div class="mt-4 text-md">
        @if (is_null($artifact->annotation))
        @else
        {{$artifact->annotation}}
        @endif
        </div>
    
    </div>
    </div>
    
    <div>
    {{-- Artifact Comments Title --}}
    <p class="ml-4 mt-4 text-gray-500 font-semibold text-lg uppercase mb-2">Comments <span class="text-sm px-2 border-2 border-gray-500 py-0 bg-purple-200 rounded-full ">{{count($artifact->comments)}}</span></p>       

    <div class="ml-4 mb-0 leading-snug bg-red-200">

            @if ($artifact->comments)
            
                @foreach ($artifact->comments as $comment)
            
                    <div class="flex bg-yellow-200 px-2 pt-2 mt-0 text-sm tracking-tight">
                    
                    <div class="flex flex-grow font-semibold pt-2">{{$comment->user->fullName}}</div>
                        
                    <div class="flex">
                         
                            

                             @if ($comment->user_id == Auth::User()->id)
                    
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

                    @else
                    @endif


                    </div>
                    </div>

                    <div class="px-2 pb-2 pt-1 bg-yellow-200 text-sm tracking-tight leading-regular">{{$comment->body}}</div>


             @endforeach

            </div>

        
        @else

        <p>no comments</p>

        @endif

            
           
        @if ($artifact->collections->count() >= 1 )

                     <p class="ml-4 mt-4 text-gray-500 font-semibold text-lg uppercase mb-2">Collections</p>


        <div class="border-2 ml-4 p-1 leading-snug bg-gray-100">
            
                @foreach ($artifact->collections as $collection)
                
                    <form id="removeFromCollection" method="POST" action="{{ action('CollectionController@removeArtifact',['artifact' => $artifact ,'collection' => $collection ]) }}">
                    
                    <input type="hidden" name="_method" value="DELETE">

                    {{ csrf_field() }}

                         <div class="flex mt-1 justify-between rounded-lg bg-gray-200 items-center text-sm">

                            <div class="flex">
                                <a class="px-2" href="{{action('ExploreController@test', $collection)}}">{{ $collection->title }}</a>
                            </div>
                            
                            <div class="flex bg-gray-200 rounded-lg pr-1">
                                <button type="submit" class="bg-gray-200 rounded-lg">
                                @icon('x-circle', ['class' => ' text-gray-500 hover:text-gray-600 border-0 hover:text-gray-200 w-5 h-5'])
                                </button>
                            </div>

                    </div>

                        </form>

                @endforeach
            
            </div>

            @else
            @endif
        
        </div>
       </div>
       </div>

    </div>
 
    </div>

    <div>

    
   
    </div>
                    
@endsection