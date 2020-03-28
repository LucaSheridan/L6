@extends('layouts.app')

@section('content')

{{-- Begin Content Container --}}     

<div class="flex items-center p-4 bg-gray-500">

    <div class="w-full m-0 p-0">

    {{-- Begin Class Header --}} 
            
    <div class="flex">

        {{-- Class Title --}}
        
        <div class="flex-grow py-2 text-left text-2xl rounded-br-lg text-gray-300 mb-2">

        {{$user->fullName}}</div>

                    </div>

        <div class="border-2 p-4 bg-gray-100 rounded-lg leading-snug">

        <table class="leading-tight w-full">

       <th colspan="7" class="text-left py-2 font-reg text-gray-600">CLASSES</th> 

       <tr class="border">
            <td class="py-2 px-1">Title</td>
            <td class="py-2 px-1">Site</td>
            <td class="py-2 px-1">Year</td>
            
            @unlessrole('student')
            <td class="py-2 px-1 text-center">Status</td>
            <td class="py-2 px-1 text-center">Roster</td>
            <td class="py-2 px-1 text-center">Enrollment</td>
            <td class="py-2 ">Enrollment Code</td>
            @else
            @endunlessrole

        </tr>

        @foreach ($sections as $section)
        

        
        <tr class="border">

    {{-- Title --}}

            <td class="border p-1">

                    <a class="text-gray-600 hover:text-red-400"href="{{action('SectionController@show', $section->id)}}">

                        {{ $section->title}}

                    </a>
            </td>

    {{-- Site --}} 
        
            <td class="border p-1">

        {{$section->site->name}}

        </td>

    {{-- Site --}} 
        
            <td class="border p-1">

        {{$section->year}}

        </td>

         @unlessrole('student')

        {{-- Status --}}
        <td class="border text-center p-1 px-4">
                
            @if( $section->is_active)
                        
                Active
                       
                    @else

                        Inactive

                    @endif
        </td>

        {{-- Roster --}} 
        <td class="border text-center px-1">

        {{$section->students->count()}}

        </td>

        {{-- Enrollment --}}
        <td class="border text-center p-1">

            @if ( $section->is_open === 1 )

                    Open
            @else 

                    Closed
            @endif

        </td>

        {{-- Enrollment Code --}}
        <td class="border p-1">{{ $section->registrationCode }}</td>
        @else
        @endunlessrole
    </tr>

        @endforeach

    </table>

    {{ $sections->links() }}


        </div>


      <!--   <h4>Collections</h4>

        @foreach ($user->collections as $collection)

        {{ $collection->title}} | {{ $collection->artifacts->count()}} Artifacts</br/></br/>

             @endforeach -->


        </div>

        <div>

    
    <!-- Comments -->
    <!-- End Comments -->

    <!-- Collection -->
    <!-- End Collection -->
    
                    
@endsection