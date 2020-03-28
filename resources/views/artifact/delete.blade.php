@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full min-w-md max-w-lg">
                
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md mt-8">

            

                    <div class="flex font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        Delete Artifact
                    </div>

                    <div class="flex justify-center mt-4">
                        <img class="border-4 w-64 border-white rounded-lg" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_thumb}}">
                    </div>

                {{-- Begin Form --}} 

                <p class="mx-2 mt-4 text-center">Are you sure you want to delete this image?</p>

                <form id="delete_artifact" method="POST" action="{{ action('ArtifactController@destroy', $artifact) }}">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="DELETE">
       
                    <div class="my-8 text-center">

                          <a href="{{ action('ArtifactController@show', $artifact) }}" class="inline-block mb-1 md:mb-0 bg-gray-400 hover:bg-gray-500 text-gray-700 hover:text-white px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded">No</a>

                          <button type="submit" class="mb-1 md:mb-0 bg-gray-400 hover:bg-green-500 text-gray-700 hover:text-green-100 px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded">Yes</button>

                    </div>



                    </div>
                
                </form>

                {{-- End Form --}}

                </div>
            </div>
        </div>
    </div>
@endsection
