@extends('layouts.app')

@section('content')
      

{{-- Begin Content Container --}}     

<div class="flex items-center p-4 bg-gray-500">


    <div class="w-full m-0 p-0 border">

    {{-- Begin Class Header --}} 
            
    <div class="flex">

        {{-- Class Title --}}
        
        <div class="flex-grow p-2 text-left text-2xl rounded-br-lg text-gray-300 mb-2">

        @if (is_null($user->profile_pic))

            <span class="float-right h-12 inline-block w-10 rounded-full bg-gray-700 p-2">LS</span>

        @else

        {{ $user->profile_pic }}

            <img class="float-right hover:shadow-xl h-12 inline-block w-10 rounded-full bg-gray-700 p-2">LS</span>

            <img class="w-16 hover:shadow-xl" src="https://s3.amazonaws.com/artifacts-0.3/{{$user->profile_pic}}">

        @endif

        {{ $user->fullName}}</div>

         {{-- Class Option --}}

            <div class="flex ">
                  
                   {{--    <a class=""href="{{action('SectionController@edit', $activeSection)}}">
                        <div class="flex justify-end p-1 bg-gray-400 hover:bg-gray-300 rounded-t-lg">
                        
                            <div>@icon('icon-plus-circle', ['class' => 'text-gray-500 hover:text-red-400 fill-current'])</div>

                             <div class="flex pt-1 px-1 text-gray-600">Edit</div>
 
                        </div>

                     </a> --}}  
                
            </div>
        </div>

       @if (is_null($user->profile_pic))

        No Profile Picture

        @else

        {{-- $user->profile_pic --}}

        <img class="w-16 rounded-full hover:shadow-xl" src="https://s3.amazonaws.com/artifacts-0.3/{{$user->profile_pic}}">

        @endif

        </br/></br/>

        Name: {{ $user->fullName}} </br/></br/>

        Email: {{ $user->email }}</br/></br/>

        

        <div class="text-2xl mb-2 ml-4">CLASSES</div/>

        <div class="border-2 p-4 bg-gray-100 rounded-lg leading-snug">

        <table>

        <tr class="border">
            <td class="p-2 ">Title</td>
            <td class="p-2 ">Site</td>
            <td class="p-2 ">Year</td>
            <td class="p-2 text-center">Status</td>
            <td class="p-2 text-center">Enrollment</td>
            <td class="p-2 text-center">Roster</td>
            <td class="p-2 ">Code</td>
        </tr>


        @foreach ($user->activeSections as $section)

        
        <tr class="border">

    {{-- Title --}}

            <td class="border p-2">

                    <a href="{{action('SectionController@show', $section->id)}}">

                        {{ $section->title}}

                    </a>
            </td>

    {{-- Site --}} 
        
            <td class="border p-2">

        {{$section->site->nickname}}

        </td>

    {{-- Site --}} 
        
            <td class="border p-2">

        {{$section->year}}

        </td>

    {{-- Status --}}


            <td class="border text-center p-2">

            @if ( $section->is_active === 1 )

        @icon('icon-check-circle', ['class' => 'text-green-500 w-8 h-8 m-2 fill-current'])

        @else 

        @icon('icon-check-circle', ['class' => 'text-gray-500 w-8 h-8 m-2 fill-current'])

        @endif

        </td>


    {{-- Enrollment --}}

            <td class="border text-center p-2">

            @if ( $section->is_open === 1 )

            @icon('icon-check-circle', ['class' => 'text-green-500 w-8 h-8 m-2 fill-current'])

            @else 

            @icon('icon-check-circle', ['class' => 'text-red-500 w-8 h-8 m-2 fill-current'])

            @endif

        </td>

   {{-- Roster --}} 
        
            <td class="border text-center p-2">

        {{$section->students->count()}}

        </td>


    {{-- Code --}}

            <td class="border p-2">

            {{ $section->registrationCode }}

        </td>

    </tr>

        @endforeach

    </table>

    {{ $sections->links()}}

        </div>


        <h4>Collections</h4>

        @foreach ($user->collections as $collection)

        {{ $collection->title}} | {{ $collection->artifacts->count()}} Artifacts</br/></br/>

             @endforeach


        </div>

        <div>






    <!-- Comments -->
    <!-- End Comments -->

    <!-- Collection -->
    <!-- End Collection -->
    
                    
@endsection