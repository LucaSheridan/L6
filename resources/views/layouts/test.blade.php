<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Artifacts-L6</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity-fullscreen@1/fullscreen.css">

</head>

<body class="leading-none antialiased ">
    
<!-- CORNFLOWER YELLOW <div id="app" class="bg-yellow-300" style="height:90vh;margin:5vh;"> -->
<!-- Gray 300 -->

<div id="app" class="bg-gray-500" style="height:90vh;margin:5vh;">




        
<nav class="bg-gray-200 shadow mb-0 py-2 border-b-2 border-red-300">
 
        <div class="mx-auto px-4">
                
        <div class="flex items-center justify-center pt-0">

        <div class="flex-grow mr-6">
        
        <a href="{{ url('/home') }}" class="tracking-wide font-thin logo text-4xl md:text-5xl text-gray-600 hover:text-gray-500 no-underline">
        
        {{-- AlTERNATE NAMES --}}

        <span class="font-semibold tracking-tight">ART</span>IFACTS</a>

        <!-- <span class="font-semibold tracking-tight">BSGE</span>ART</a>-->
 
        {{-- <span class="font-semibold tracking-tight"></span>arT.io</a> --}}
        </div>
        
        <div class="flex-shrink items-center p-2 text-md text-right">
                    
                            @guest
                            <a class="no-underline text-gray-600 hover:text-red-300 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="no-underline text-gray-600 hover:text-red-300 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            
                        
                        <div class="flex items-center text-gray-600">
                        
                        <drop-down class="text-left bg-gray-200 pt-2 pb-1">

                        <template v-slot:icon>
                        
                        <div class="flex pl-10 ">

                        {{ Auth::user()->full_name }}
                        
{{--                         <img class="w-12 h-full rounded-full hover:shadow" src="https://s3.amazonaws.com/artifacts-0.3/{{Auth::User()->profile_pic}}">
 --}}
                            @icon('icon-cheveron-down', ['class' => 'w-5 h-5 fill-current'])
                        </div>

                        </template>                       

                        <template v-slot:options>
                        
                        <ul classs="">
                        <li class="hover:text-red-500"><a href="{{action('UserController@show', Auth::User())}}">Profile</a></li>
                        <li class="hover:text-red-500"><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a></li>
                        </ul>

                        </template>

                        </drop-down>
                        </div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>

                        @endguest

                    </div>
                </div>
            </div>
        </nav>

        @yield('content')

    
    <div class="flex flex-col items-center items-stretch bg-white m-10 rounded-lg p-4 shadow-xl">
  
   
    <div class="inline-flex justify-end rounded-lg ">
                
                    <!-- <a href="{{action('CollectionController@slideshow', $collection )}}">
                        <div class="flex justify-end p-2 bg-gray-200 rounded-tl-lg ">
                        
                            <div>@icon('icon-video', ['class' => 'float-right text-gray-600 hover:text-red-400 fill-current'])</div>

                            <div class="flex pt-1 px-1 text-gray-600 hover:text-red-400">Play</div>
                        </div>
                    </a> -->

                    {{-- Edit --}}

                    <a href="{{action('CollectionController@edit', $collection )}}">
                        <div class="flex justify-end p-2 bg-gray-200 rounded-tl-lg ">
                        
                            <div>@icon('icon-edit', ['class' => 'float-right text-gray-600 hover:text-red-400 fill-current'])</div>

                            <div class="flex pt-1 px-1 text-gray-600 hover:text-red-400">Edit</div>
                        </div>
                    </a>

                    {{-- Delete --}}

                    <a href="{{action('CollectionController@delete', $collection )}}">
                        <div class="flex flex-end p-2 bg-gray-200 rounded-tr-lg">
                        
                            <div>@icon('icon-x-circle', ['class' => 'float-right text-gray-600 hover:text-red-400 fill-current'])</div>

                            <div class="flex pt-1 px-1 text-gray-600 hover:text-red-400">Delete</div>
                        </div>
                    </a>

                </div>





    
    <div class="w-full bg-gray-200 p-2 pl-4 mb-2 border">

    <span class="text-red-400 font-sembibold text-2xl uppercase roman ">{{$collection->title}}</span>

     {{-- Options --}}

              

    <p class=" italic mt-2 text-md text-gray-600 leading-normal rounded-lg">{{$collection->description}}</p>

    </div>



    <div class="flex flex-rowbg-red-300 p-4 ">

        @foreach ($collection->artifacts as $artifact) 
            
       <div class="flex items-center text-center relative p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5">
        
          {{-- Begin Individual Artifacts Container--}}

          <div class="relative w-full">

                        <a href="{{action('ArtifactController@show', $artifact->id)}}">
                        <img class="w-full rounded-lg" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_thumb}}">

                        <div>{{$artifact->pivot->position}}</div>

                        </a>
               
         </div>
    </div>

    @endforeach

</div>

       <div class="flex-none p-2 border-2">Curated by: 

       @foreach ($collection->curators as $curator)
       @if ($loop->count > 1 && $loop->last)
       and {{$curator->fullName}}
       @elseif ($loop->count > 1 && !$loop->first)
       , {{$curator->fullName}}
        
        @else {{$curator->fullName}}
        @endif

        @endforeach </div>

    </div>

    </div>
    
    </div>
         
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fullscreen@1/fullscreen.js"></script>


</body>
</html>
