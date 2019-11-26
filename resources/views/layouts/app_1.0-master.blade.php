<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            ARTIFACTS-1.0
        </title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    </head>

<body class="bg-gray-100 h-screen antialiased leading-none">
    
    <div id="app">
      
        <nav class="bg-gray-200 shadow mb-1 py-2 border-b border-gray-400">
            
            <div class="mx-auto px-4">
                
                <div class="flex items-center justify-center pt-2">
                        
                        <a href="{{ url('/home') }}" class="tracking-wider font-thin logo text-4xl md:text-5xl text-gray-600 hover:text-gray-500 no-underline">
                           ARTIFACTS
                        </a>
                    
                    <div class="flex-1 text-right">
                        @guest
                            <a class="no-underline text-gray-100 hover:text-red-700 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="no-underline text-gray-100 hover:text-red-700 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            
                                <span class="text-gray-600 text-sm pr-4">{{ Auth::user()->full_name }}</span>

                            <a href="{{ route('logout') }}"
                               class="no-underline text-gray-600 hover:text-red-700 text-sm p-3"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>

                        @endguest
                    </div>
                </div>
            </div>
        </nav>

     <!-- Flash Messages -->

        <div id="alert" class=w-full>
            @include('flash::message')
        </div>

<!-- @if (session()->has('flash_notification.message'))

    <div id="alert" class="container">
        <div class="alert alert-{{ session('flash_notification.level') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

    {!! session('flash_notification.message') !!}
 -->
        </div>
    </div>

    @endif

    <!-- Content -->

    <div class="border-0 border-blue-500">    
        @yield('content')
    </div>

    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">
    setTimeout(function(){
    document.getElementById('alert').className = 'faded';
    }, 2500);    
    </script>
</body>
</html>
