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
    <link rel="stylesheet" href="/path/to/flickity.css" media="screen">
    <link rel="stylesheet" href="https://unpkg.com/flickity-fullscreen@1/fullscreen.css">
 

</head>

<body class="antialiased leading-none">
    
    <div id="app" class="container max-w-5xl mx-auto ">
    <!-- <div id="app" class="" 
    style="height:100vh; margin-left:5vh; margin-right:5vh;"
    > -->
    <!-- style="height:100vh; margin-left:5vh; margin-right:5vh;"> -->

              
        <nav class="bg-gray-200 shadow py-1 border-b-2 text-center border-red-400">
  <!--  <nav class="bg-blue-900 shadow mb-8 py-6"> -->            
 
        <div class="mx-auto px-4">
                
        <div class="flex items-center justify-center pt-0">

        <div class="flex-grow">
        
        <a href="{{ url('/home') }}" class="tracking-wide font-thin logo text-4xl md:text-5xl text-gray-600 hover:text-gray-500 no-underline" tabIndex="-1">
        
        {{-- AlTERNATE NAMES --}}

        <span class="font-semibold tracking-tight text-gray-600">ART</span><span class="text-gray-500">IFACTS</span></a>

<!-- <span class="font-semibold tracking-tight">BSGE</span>ART</a>
 --> 
 <!-- <span class="font-semibold tracking-tight"></span>arT.io</a> -->
        </div>
        
        <div class="flex-shrink items-center p-2 text-md text-right">
                    
                @guest
                <a class="no-underline text-gray-600 hover:text-red-300 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a class="no-underline text-gray-600 hover:text-red-300 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
                @else
                    
               <div class="relative flex items-center text-gray-600">
                    
               <dropdown>
        
                    <template v-slot:trigger>
                    
                        <div class="p-2 bg-red-400 rounded-full">
                        {{ Auth::User()->initials }}
                        </div>

                    </template>

                    <div class="z-10 absolute right-0 shadow-2xl mt-1 bg-gray-700 text-gray-400 rounded py-1 list-none text-left leading-normal whitespace-no-wrap">

                    <li class="hover:text-gray-200 px-2"><a href="{{action('UserController@show', Auth::User())}}">Profile</li>
                    <li class="hover:text-gray-200 px-2"><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a></li>
                    </div>

                </dropdown>
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

        <div class="">
            @include('flash::message')
        </div>

        @yield('content')

    </div>
    

    <!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fullscreen@1/fullscreen.js"></script>

    <script type="text/javascript">
    // close the div in 5 secs
    window.setTimeout("hideMessage();", 3000);

    function hideMessage(){
    document.getElementById("message").style.display="none";
    }
    </script>




</body>
</html>
