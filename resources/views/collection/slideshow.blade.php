@extends('layouts.app')

@section('content')
        
    


    <div class="w-full bg-gray-300 p-4">
    
    {{-- Collection Title --}}

    <div class="flex border-0 border-yellow-600">
           
            <div class="flex-grow px-2 pt-2 text-left text-2xl rounded-br-lg text-gray-600">{{strtoupper($collection->title)}}</div>
            
            <div class="flex border-b ">
                    
                    {{-- Option 1: Solo Icon Tab Link ( can be stacked ) --}}

                    <a href="{{action('CollectionController@slideshow', $collection )}}">
                        <div class="flex justify-end p-2 bg-gray-200 rounded-tl-lg ">
                        
                            <div>@icon('icon-video', ['class' => 'float-right text-gray-600 hover:text-red-400 fill-current'])</div>

                            <div class="flex pt-1 px-1 text-gray-600 hover:text-red-400">Play</div>
                        </div>
                    </a>

                    <a href="{{action('CollectionController@edit', $collection )}}">
                        <div class="flex justify-end p-2 bg-gray-200 rounded-tl-lg ">
                        
                            <div>@icon('icon-edit', ['class' => 'float-right text-gray-600 hover:text-red-400 fill-current'])</div>

                            <div class="flex pt-1 px-1 text-gray-600 hover:text-red-400">Edit</div>
                        </div>
                    </a>

                    <a href="{{action('CollectionController@delete', $collection )}}">
                        <div class="flex justify-end p-2 bg-gray-200 rounded-tr-lg">
                        
                            <div>@icon('icon-x-circle', ['class' => 'float-right text-gray-600 hover:text-red-400 fill-current'])</div>

                            <div class="flex pt-1 px-1 text-gray-600 hover:text-red-400">Delete</div>
                        </div>
                    </a>

                    {{-- Option 1: End--}}

                    {{-- Option 2: DropMenu Vue Component --}}


                      <!-- <div id="dropmenu" class="border-red-500 border-0 flex-grow justify-start items-center bg-gray-200 rounded-tl-lg"></div>
  -->
                        
                       <!--  <drop-menu>

                            <template v-slot:menuicon>

                            @icon('icon-plus-circle', ['class' => 'float-right text-gray-500 hover:text-red-400 fill-current'])

                            </template>

                            <template v-slot:menulabel>

                            

                            </template>

                            <template v-slot:menuitems>
                                    
                            <ul>

                            @icon('icon-plus-circle', ['class' => 'ml-3 float-left text-gray-500 hover:text-red-400 fill-current clearfix'])

                            <li class="clearfix text-gray-600">Create a new artifact</li>

                            @icon('icon-view', ['class' => 'ml-3 float-left text-gray-500 hover:text-red-400 fill-current '])

                            <li class="clearfix text-gray-600">View all artifacts</li>

                            </ul>

                            </template>

                        </drop-menu> -->

                        </div>

                        {{-- Option 2: End --}}

            </div>


    <div class="bg-white p-2">

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

       <div class="main-carousel object-contain" data-flickity='{ "cellAlign": "center", "contain": true, "autoPlay": true, "lazyload": true, "wrapAround": true, "fullscreen": true}' >
          
            @foreach ($collection->artifacts as $artifact) 
                            
            <div class="carousel-cell bg-green-300 w-1/2 min-w-sm h-full max-w-lg"> 

            <img src=""
            </div>

        <!-- <img data-flickity-lazyload="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}"
                            class="object-contain h-64 rounded-lg carousel-cell" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}"/>
          -->                  

            @endforeach

        </div>

    {{-- End Carousel --}}

    </div>







    </div>
    </div>

</div>


@endsection
