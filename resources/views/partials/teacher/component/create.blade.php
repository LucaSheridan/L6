@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md mt-8">

                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        Create New Assignment Component
                    </div>

                    {{-- Begin Form --}} 

                 <form id="create_site" method="POST" action="{{ action('ComponentController@store', ['section' => $assignment->section_id, 'assignment' => $assignment->id ])}}">
            {{ csrf_field() }}

            <div class="p-3 border-l-2 border-b-0 border-r-2">
            
                {{-- Begin Title Input--}}
            
                    <div class="mb-2">

                        <label for="title" class="w-full md:mb-0 font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Title</label>

                        <input id="title" type="text" class="w-full mt-2 rounded h-8 p-1 border text-gray-600 text-sm {{ $errors->has('title') ? 'border-red-500' : 'border' }}" name="title" value="{{ old('title') }}" autofocus>
                        {!! $errors->first('title', '<span class="text-red-500 text-sm mt-2">:message</span>') !!}

                    </div>

                {{-- Begin Due Date Input --}}
                    
                    <div class="mb-2">
  
                        <label for="date_due" class="w-full m-0 font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Due Date (dd/mm/yy)</label>

                        <input id="date_due" type="text" class="w-full mt-2 rounded h-8 p-1 border text-gray-600 text-sm {{ $errors->has('date_due') ? 'border-red-500' : 'border' }}" name="date_due" value="{{ old('date_due') }}" >

                        {!! $errors->first('date_due', '<span class="text-red-500 text-sm mt-2">:message</span>') !!}
    
                    </div>

                    <div class="my-1 text-center">

                          <a href="{{ url()->previous() }}" class="inline-block mb-1 md:mb-0 bg-gray-400 hover:bg-red-500 text-gray-700 hover:text-white px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded">Cancel</a>

                          <button type="submit" class="mb-1 md:mb-0 bg-gray-400 hover:bg-green-500 text-gray-700 hover:text-green-100 px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded">Submit</button>

                    </div>
                    </div>
                
                </form>

    {{-- End Form --}}

    {{-- End Form --}}

                </div>
            </div>
        </div>
    </div>
@endsection
