@extends('layouts.app')

@section('content')
        
<div class="w-full bg-gray-300 p-4">
    
    {{-- Collection Title --}}

    <div class="flex">
           
            <div class="flex-grow px-2 mb-2 pt-2 text-left text-2xl rounded-br-lg text-gray-600">{{strtoupper($collection->title)}}</div>
            
                    

                        {{-- Option 2: End --}}

            </div>

    <!-- <div class="w-full p-2 my-2 text-sm">Curated by: 

       @foreach ($collection->curators as $curator)
       @if ($loop->count > 1 && $loop->last)
       and {{$curator->fullName}}
       @elseif ($loop->count > 1 && !$loop->first)
       , {{$curator->fullName}}
        
        @else {{$curator->fullName}}
        @endif

        @endforeach

        <p class="mt-2 leading-relaxed">{{$collection->description}}</p>

    </div> -->

    {{-- Begin Carousel --}}
        <div class="main-carousel overflow-hidden" data-flickity='{ "cellAlign": "center", "contain": true, "autoplay": true}'>

          
            @foreach ($collection->artifacts as $artifact) 
                            
    

        <div class="carousel-cell">
        <div class="bg-red-300 w-full">
        <img class="mx-auto" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}"/>
        </div>
    </div>
                       

            @endforeach

        </div>

    {{-- End Carousel --}}

    </div>







    </div>
    </div>

</div>


@endsection
