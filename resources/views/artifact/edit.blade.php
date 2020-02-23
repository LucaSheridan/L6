@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md mt-8">

                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        Edit Artifact Info
                    </div>

                {{-- Begin Form --}} 

                    <form id="edit_artifact" method="POST" action="{{ action('ArtifactController@update', ['artifact' => $artifact->id]) }}">
                    
                    {{ csrf_field() }}
                    
                    <input type="hidden" name="_method" value="PATCH">

                    <div class="p-3 border-l-2 border-b-0 border-r-2">
            
                {{-- Begin Title Input--}}
            
                    <div class="mb-2">

                        <label for="title" class="w-full md:mb-0 font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Title</label>

                        <input id="title" type="text" class="w-full mt-2 rounded h-8 p-1 border text-gray-600 text-sm {{ $errors->has('title') ? 'border-red-500' : 'border' }}" name="title" value="{{ $artifact->title}}" autofocus tabIndex="1">

                        {!! $errors->first('title', '<span class="text-red-500 text-sm mt-2">:message</span>') !!}

                    </div>

                {{-- Begin Artist Input--}}
            
                    <div class="mb-2">

                        <label for="artist" class="w-full md:mb-0 font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Artist</label>

                        <input id="artist" type="text" class="w-full mt-2 rounded h-8 p-1 border text-gray-600 text-sm {{ $errors->has('artist') ? 'border-red-500' : 'border' }}" name="artist" value="{{ $artifact->artist}}" autofocus tabIndex="2">
                        {!! $errors->first('artist', '<span class="text-red-500 text-sm mt-2">:message</span>') !!}

                    </div>


                {{-- Begin Medium Input--}}
            
                    <div class="mb-2">

                        <label for="medium" class="w-full md:mb-0 font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Medium</label>

                        <input id="medium" type="text" class="w-full mt-2 rounded h-8 p-1 border text-gray-600 text-sm {{ $errors->has('medium') ? 'border-red-500' : 'border' }}" name="medium" value="{{ $artifact->medium }}" autofocus tabIndex="2">
                        {!! $errors->first('medium', '<span class="text-red-500 text-sm mt-2">:message</span>') !!}

                    </div>

                 {{-- Begin Year Input--}}
            
                    <div class="mb-2">

                        <label for="year" class="w-full md:mb-0 font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Year</label>

                        <input id="year" type="text" class="w-full mt-2 rounded h-8 p-1 border text-gray-600 text-sm {{ $errors->has('year') ? 'border-red-500' : 'border' }}" name="year" value="{{ $artifact->year}}" autofocus tabIndex="3">
                        {!! $errors->first('year', '<span class="text-red-500 text-sm mt-2">:message</span>') !!}

                    </div>

                {{-- Annotation Input--}}
            
                    <div class="mb-2">

                        <label for="description" class="w-full font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Annotation</label>

                        <textarea id="annotation" class="w-full mt-2 rounded p-2 border text-gray-600 leading-snug text-sm {{ $errors->has('annotation') ? 'border-red-500' : 'border' }}" name="annotation" value="" tabIndex="4">{{ $artifact->annotation}}</textarea>

                    </div>

                {{-- Dimensions Height Input--}}
            
                    <div class="mb-2">

                        <label for="dimensions_height" class="w-full md:mb-0 font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Dimensions Height</label>

                        <input id="dimensions_height" type="text" class="w-full mt-2 rounded h-8 p-1 border text-gray-600 text-sm {{ $errors->has('dimensions_height') ? 'border-red-500' : 'border' }}" name="dimensions_height" value="{{ $artifact->dimensions_height}}" autofocus tabIndex="3">
                        {!! $errors->first('dimensions_height', '<span class="text-red-500 text-sm mt-2">:message</span>') !!}

                    </div>

                {{-- Dimensions Width Input--}}
            
                    <div class="mb-2">

                        <label for="dimensions_width" class="w-full md:mb-0 font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Dimensions Width</label>

                        <input id="dimensions_width" type="text" class="w-full mt-2 rounded h-8 p-1 border text-gray-600 text-sm {{ $errors->has('dimensions_width') ? 'border-red-500' : 'border' }}" name="dimensions_width" value="{{ $artifact->dimensions_width}}" autofocus tabIndex="3">
                        {!! $errors->first('dimensions_width', '<span class="text-red-500 text-sm mt-2">:message</span>') !!}

                    </div>

                {{-- Dimensions Depth Input--}}
            
                    <div class="mb-2">

                        <label for="dimensions_depth" class="w-full md:mb-0 font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Dimensions Depth</label>

                        <input id="dimensions_depth" type="text" class="w-full mt-2 rounded h-8 p-1 border text-gray-600 text-sm {{ $errors->has('dimensions_depth') ? 'border-red-500' : 'border' }}" name="dimensions_depth" value="{{ $artifact->dimensions_depth}}" autofocus tabIndex="3">
                        {!! $errors->first('dimensions_depth', '<span class="text-red-500 text-sm mt-2">:message</span>') !!}

                    </div>

                {{-- Dimensions Units--}}
            
                    <div class="mb-2">

                        <label for="dimensions_units" class="w-full md:mb-0 font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Measuring Units</label>

                        <input id="dimensions_units" type="text" class="w-full mt-2 rounded h-8 p-1 border text-gray-600 text-sm {{ $errors->has('dimensions_units') ? 'border-red-500' : 'border' }}" name="dimensions_units" value="{{ $artifact->dimensions_units}}" autofocus tabIndex="3">
                        {!! $errors->first('dimensions_units', '<span class="text-red-500 text-sm mt-2">:message</span>') !!}

                    </div>

                     <div class="my-1 text-center">

                          <a href="{{ url()->previous() }}" class="inline-block mb-1 md:mb-0 bg-gray-400 hover:bg-red-500 text-gray-700 hover:text-white px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded">Cancel</a>

                          <button type="submit" class="mb-1 md:mb-0 bg-gray-400 hover:bg-green-500 text-gray-700 hover:text-green-100 px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded" tabIndex="5">Save</button>

                    </div>

                </div>
                
                </form>

    {{-- End Form --}}

                </div>
            </div>
        </div>
    </div>
@endsection
