@extends('layouts.app')

@section('content')

<div class="sm:flex sm:items-center text-center p-4">

    <div class="bg-gray-300 border-2 border-gray-500 w-full sm:flex-1 p-2 pt-4 mb-4 sm:mb-0 rounded-lg">
    Select a file...

    <form action="{{ action('ArtifactController@store') }}" role="form" method="POST" enctype="multipart/form-data" class="">

            {!! csrf_field() !!}
      
            <input type="file" name="file" value="{{ old('file') }}" id="file">
            
            <input type="hidden" name="user_id" value="{{ Auth::User()->id }}">
            <input type="hidden" name="section_id" value="{{$section->id}}">
            <input type="hidden" name="assignment_id" value="{{$assignment->id}}">
            <input type="hidden" name="component_id" value="{{$component->id}}">

            <label for="file" class="block mx-auto text-gray-600 my-2 text-center p-2 rounded">
               
     <!--        <span class="mx-auto bg-gray-300 hover:bg-gray-700 hover-text-white border-gray-500 p-0 rounded-full">
 
 @icon('upload')

</span> -->

                        <div class="relative flex items-center justify-center text-gray-600">
                                        
                        <div class="p-2 bg-gray-100 hover:bg-gray-500 hover:text-gray-100 rounded-full">
                        @icon('upload')
                        </div>

                        </div>

               
                </label>

            @if ($errors->has('file'))
            <div class="help-block mb-4 text-red-500">
            {{ $errors->first('file') }}
            </div>
            @endif
            
            <input class="btn-gray" type="submit" value="upload">
            
    </form>

        </div>

         <div class="w-10 bg-gray-600 inline-block sm:flex-grow-0 border-2 rounded-full text-gray-100 mx-2 p-2">
        or
        </div>

    
    <div class="bg-gray-300 flex-1 items-center sm:self-stretch border-2 rounded-lg pt-4 border-gray-500 sm:border-gray-500 p-2 mt-4 sm:mt-0">Create from URL


        

        <form action="{{ action('ArtifactController@storeFromURL') }}" role="form" method="POST" enctype="multipart/form-data">

            {!! csrf_field() !!}
      
            <input type="text" name="url" class="block mx-auto my-4 w-3/4 bg-white p-2 rounded" value="{{ old('url') }}" id="url" placeholder="http://www.website.com/.artwork.jpg">
            <input type="hidden" name="user_id" value="{{ Auth::User()->id }}">
            <input type="hidden" name="section_id" value="{{$section->id}}">
            <input type="hidden" name="assignment_id" value="{{$assignment->id}}">
            <input type="hidden" name="component_id" value="{{$component->id}}">

            @if ($errors->has('url'))
            <div class="help-block mb-4 text-red-500">
            {{ $errors->first('url') }}
            </div>
            @endif

            <input class="inline-block btn-gray" type="submit" value="submit">

            
            </form>

    </div>


</div>

<!-- <file-preview></file-preview>
 -->
 
</div>
</div>         
</div>   

@endsection