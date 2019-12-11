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

<body class="antialiased leading-none">


    
    <!-- <div id="app" class="container max-w-5xl m-auto "> -->
    <div id="app" class="bg-gray-300" style="height:90vh;margin:5vh; ">

              
        <nav class="bg-gray-200 shadow mb-0 py-2 border-b-2 border-red-400">
  <!--  <nav class="bg-blue-900 shadow mb-8 py-6"> -->            
 
        <div class="mx-auto px-4">
                
        <div class="flex items-center justify-center pt-0">

        <div class="flex-grow mr-6">
        
        <a href="{{ url('/home') }}" class="tracking-wide font-thin logo text-4xl md:text-5xl text-gray-600 hover:text-gray-500 no-underline">
        
        {{-- AlTERNATE NAMES --}}

        <!-- <span class="font-semibold tracking-tight">ART</span>IFACTS</a>-->

<span class="font-semibold tracking-tight">BSGE</span>ART</a>
 
 <!-- <span class="font-semibold tracking-tight"></span>arT.io</a> -->
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
                        
<!--                         <img class="w-12 h-full rounded-full hover:shadow" src="https://s3.amazonaws.com/artifacts-0.3/{{Auth::User()->profile_pic}}">
 -->
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

        <!-- Flash Messages Here-->

        @include('flash::message')

        @yield('content')
    
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fullscreen@1/fullscreen.js"></script>


</body>
</html>
