
@extends('layouts.app')

@section('content')

    <div class="flex flex-wrap py-4">

        {{-- Artifact Column --}}
        
        <div class="flex md:w-2/3 items-start ml-4 md:ml-0 relative">

        {{-- Artifact Image --}}
        <a class="cursor-zoom-in pr-10" href="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}">
         <img class="w-full border-4" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}">
        </a>  

        {{-- Artifact Menu Trigger | pinned to right of Artifact Column --}} 

            <div class="absolute right-0 mr-2">
            
                <div>

                 <dropdown>

                        <template v-slot:trigger>
                        @icon('menu', ['class' => ' w-5 h-5 my-0 mx-2 hover:text-gray-400 text-gray-600'])
                        </template>

                    <div class="z-20 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-400 rounded py-1 list-none text-left leading-normal whitespace-no-wrap mr-2 m-auto">            

                         <div class="hover:text-gray-300 px-3">
                        <a href="#zoom-modal" class="">
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

                        <div class="hover:text-gray-300 px-3">
                        <a href="{{action('ArtifactController@delete', $artifact)}}">
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('x-circle', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Delete</div>
                        </div>
                        </a>
                        </div>

                        <!-- <div class="hover:text-gray-300 px-3">
                       <form action="{{action('ArtifactController@delete', $artifact)}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                         <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                         <button>@icon('x-circle', ['class' => 'w-5 h-5 hover:text-gray-200'])</button></div>
                         <button><div>Delete</div></button>
                        </div>
                        </form> -->
                        
                        </div>

                </dropdown>

                    </div>
                    </div>            
           </div>

{{-- Begin Column 2 --}}
  
                <div class="w-full md:w-1/3 pr-4 xl:pr-0 text-sm relative">   
                    
{{-- Widget 1 - Info --}}
            
                <div id="Info" class="relative flex">
                    
                <div class="text-gray-500 font-semibold text-lg uppercase mb-1 px-4 py-1">Info</div>
             
{{-- Widget 1 - Info - Menu Trigger --}}

                <div class="absolute right-0">

                    <dropdown>

                       <template v-slot:trigger>
                        @icon('menu', ['class' => ' w-5 h-5 my-0 mx-2 hover:text-gray-400 text-gray-600'])
                       </template>

{{-- Widget 1 - Info - Menu --}}

<div class="z-20 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-500 rounded py-1 list-none text-left leading-normal whitespace-no-wrap mr-2 m-auto">            
                                    
{{-- Widget 1 - Info - Menu - Item 1 --}}

        <a href="{{action('ArtifactController@edit', $artifact)}}">

            <div class="flex items-center px-3 hover:text-gray-200">

                <div class="pr-2">
                @icon('edit', ['class' => 'w-5 h-5'])
                </div>
                <div>Edit</div>
        
            </div>

        </a>

<!-- {{-- Widget 1 - Info - Menu - Item 2 --}}

        <div class="flex items-center px-3 hover:text-gray-200">

            <div class="pr-2">
            @icon('zoom-in', ['class' => 'w-5 h-5'])
            </div>
            <div>Menu Widget 1 Item 2</div>
        
        </div> -->

{{-- End Widget 1 - Info - Menu --}} 

</div>

</div>

</dropdown>
 </div>

 <div class="border-2 ml-4  mb-2 p-3 leading-snug text-sm rounded-lg">

            {{-- Artist | Editable --}}
            
                <div class="font-semibold ">
                    @if (is_null($artifact->artist))
                    {{ $artifact->user->fullName }}
                    @else
                    {{ $artifact->artist }}
                    @endif
                </div>
            {{-- Title | Editable --}}

                  @if (is_null($artifact->title))
                    Untitled
                  @else
                    <div class="italic text-md">{{ $artifact->title }}</div>
                  @endif
            {{-- Medium | Editable --}}

                    @if (is_null($artifact->medium))
                    @else
                        <div>{{ $artifact->medium }} </div>
                    @endif
            {{-- Year | Editable --}}
                    @if (is_null($artifact->year))
                    @else
                        <div>{{ $artifact->year }}</div>
                    @endif
            {{-- Annotation | Editable --}}
           
                    @if (is_null($artifact->annotation))
                    @else
                        <div class="my-4">{{$artifact->annotation}}</div>
                    @endif
            {{-- Course | Permanent --}}

                    @if (is_null($artifact->section))
                    @else
                        <div>{{ $artifact->section->course->name }}</div>
                    @endif
            {{-- Assignment | Permanent --}}

                    @if (is_null($artifact->assignment))
                    @else
                        <div>
                            <a href="{{ action('AssignmentController@showStudent', ['section' => $artifact->assignment->section, 'assignment' => $artifact->assignment_id] )}}">
                            {{ $artifact->assignment->title }}</a>
                        </div>
                    @endif

            {{-- Component | Permanent --}}

                    @if (is_null($artifact->component))
                    @else
                        <div>
                        {{ $artifact->component->title }}
                        </div>
                    @endif
        </div>

 {{-- End Widget 1 - Info --}}

{{-- Widget 2 --}}
            
                <div id="Comments" class="relative flex">
                    
                <div class="text-gray-500 font-semibold text-lg uppercase mb-1 px-4 py-1">Comments</div>
             
{{-- Widget 2 - Comments - Menu Trigger --}}

    <div class="absolute right-0">
        <dropdown>

           <template v-slot:trigger>
            @icon('menu', ['class' => ' w-5 h-5 my-0 mx-2 hover:text-gray-400 text-gray-600'])
            </template>

{{--  Widget 2 - Comments - Menu --}}

<div class="z-20 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-500 rounded py-1 list-none text-left leading-normal whitespace-no-wrap mr-2 m-auto">            
            
                        
{{--  Widget 2 - Comments - Menu - Item 1 --}}

            <a href="{{action('CommentController@create', $artifact->id)}}">
            <div class="flex items-center px-3 hover:text-gray-200">

            <div class="pr-2">
            @icon('plus-circle', ['class' => 'w-5 h-5'])
            </div>
            <div>Add Comment</div>           
            </div></a>

{{-- End Widget 2 - Comments - Menu --}} </div>

</div>

</dropdown>

 </div>

     <div class="ml-4 leading-snug">

            @if ($artifact->comments)
            
                @foreach ($artifact->comments as $comment)
            
                    <div class="mb-2">
                        <div class="flex bg-yellow-200 px-2 pt-2 text-sm tracking-tight">
                    
                        {{-- Commentor--}}
                        <div class="flex flex-grow font-semibold pt-2">{{$comment->user->fullName}}</div>
                            
                        {{-- Comment Editing --}}
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
                </div>

             @endforeach

     </div>
        
        @else

        @endif

 {{-- End Widget 2 - Comments --}}
 
 {{-- Widget 3 - Collections --}}
            
                <div id="Collections" class="relative flex">
                    
                <div class="text-gray-500 font-semibold text-lg uppercase mb-1 px-4 py-1">Collections</div>
             
 {{-- Widget 3 Menu Trigger --}}

    <div class="absolute right-0">

        <dropdown>

           <template v-slot:trigger>
            @icon('menu', ['class' => ' w-5 h-5 my-0 mx-2 hover:text-gray-400 text-gray-600'])
            </template>

{{-- Widget 3 Menu --}}

<div class="z-20 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-500 rounded py-1 list-none text-left leading-normal whitespace-no-wrap mr-2 m-auto">            
            
                        
{{-- Widget 3 Menu - Item 1 --}}

            <a href="{{action('ArtifactController@addToCollection', $artifact)}}">
                <div class="flex items-center px-3 hover:text-gray-200">
                    <div class="pr-2">
                        @icon('briefcase', ['class' => 'w-5 h-5'])
                    </div>
                    <div>Add to Collection</div>
                </div>
            </a>

            <a href="{{action('CollectionController@create', $artifact->id)}}">
                 <div class="flex items-center px-3 hover:text-gray-200">
                    <div class="pr-2">
                        @icon('plus-circle', ['class' => 'w-5 h-5'])
                    </div>
                    <div>Create New Collection</div>
                </div>
            </a>

{{-- End Widget Menu --}} 

</div>



</div>

</dropdown>
 </div>

 @if (count($artifact->collections) > 0) 
  <div class="border-2 ml-4 p-1 leading-snug bg-gray-100">
            
           @foreach ($artifact->collections as $collection)
                
                    <form id="removeFromCollection" method="POST" action="{{ action('CollectionController@removeArtifact',['artifact' => $artifact ,'collection' => $collection ]) }}">
                    
                    <input type="hidden" name="_method" value="DELETE">

                    {{ csrf_field() }}

                         <div class="flex mt-1 justify-between rounded-lg bg-gray-200 items-center text-sm">

                            <div class="flex">
                                <a class="px-2" href="{{action('CollectionController@show', $collection)}}">{{ $collection->title }}</a>
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


 {{-- End Widget 3 --}}
        
       </div>
       </div>
       </div>
       </div>

    </div>
 
    </div>

    <div>
   
    </div>
                    
@endsection