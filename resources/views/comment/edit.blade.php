@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md mt-8">

                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-3 mb-0">
                        Edit Comment
                    </div>

                    {{-- Begin Form --}} 

    <form id="edit_comment" method="POST" action="{{ action('CommentController@update', ['artifact' => $artifact->id , 'comment' => $comment->id ]) }}">
            {{ csrf_field() }}

            <div class="p-3 border-l-2 border-b-0 border-r-2">
            
               <!--  {{-- Begin Title Input--}}
            
                    <div class="mb-2">

                        <label for="title" class="w-full md:mb-0 font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Title</label>

                        <input id="title" type="text" class="w-full mt-2 rounded h-8 px-2 border text-gray-600 text-md p-1 {{ $errors->has('title') ? 'border-red-500' : 'border' }}" name="title" value="{{ $comment->title}}" autofocus>
                        {!! $errors->first('title', '<span class="text-red-500 text-sm mt-2">:message</span>') !!}

                    </div> -->

                {{-- Begin Comment Body Input--}}
            
                    <div class="mb-2">

                        <label for="body" class="w-full font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Comment Body</label>

                        <textarea id="body" class="w-full mt-2 rounded p-2 border text-gray-600 text-sm leading-snug {{ $errors->has('body') ? 'border-red-500' : 'border' }}" name="body">{{$comment->body}}</textarea>
                        {!! $errors->first('body', '<span class="text-red-500 text-sm mt-2">:message</span>') !!}


                    </div>

                {{-- Begin User ID Input--}}
                <input id="user_id" type="hidden" name="user_id" value="{{Auth::User()->id}}" >
                
                {{-- Begin Artifact ID Input--}}
                <input id="artifact_id" type="hidden" name="artifact_id" value="{{$artifact->id}}" >

       
                    <div class="my-1 text-center">

                          <a href="{{action('ArtifactController@show', $artifact)}}" class="inline-block mb-1 md:mb-0 bg-gray-400 hover:bg-red-500 text-gray-700 hover:text-white px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded">Cancel</a>

                          <button type="submit" class="mb-1 md:mb-0 bg-gray-400 hover:bg-green-500 text-gray-700 hover:text-green-100 px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded">Submit</button>

                    </div>
                    </div>
                
                </form>

    {{-- End Form --}}

                </div>
            </div>
        </div>
    </div>
@endsection
