<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Artifacts-L6B</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">




</head>

<body class="antialiased leading-none">
    
<!-- HEADER -->
<div>

<nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-gray-200">
   
   <div  @click="open = !open" class="p-2 text-center text-5xl font-thin tracking-tight text-gray-600">
  
    <div class="relative text-gray-600 pt-2">ARTIFACTS</div>

          <div class="absolute md:z-10 block right-0 top-0">
          
          <div class="m-4 flex items-center">
          
          <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
              <div>
                <button @click="open = !open" class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid">
                  <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                </button>
              </div>
             
              <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                <div class="py-1 rounded-md bg-white shadow-xs">
<!--                   <a href="#" class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Your Profile</a>
 --><!--                   <a href="#" class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Settings</a>
 -->                  <a href="#" class="block px-4 py-2 text-base text-gray-700 hover:bg-gray-100">Sign out</a>
                </div>
              </div>
            </div> 
         </div>


  </div>

 <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 bg-gray-200 ">
      
      <div class="flex items-center justify-center h-16">
        
        <div class="flex items-center md:items-center">
          
          <div class="">
                  <div class="block">

          <div class="flex items-baseline">
              
              <a href="{{action('SectionController@showUserSections', Auth::User()->id)}}"
                 class="{{active_check('sections/user/*')}}
                 ml-2 px-3 py-2 rounded-md border-2 hover:border-gray-500 text-lg font-medium bg-gray-200 text-gray-600 hover:text-gray-900 hover:bg-gray-400 focus:outline-none focus:text-white focus:bg-teal-400">CLASSES</a>
     
              <a href="{{action('CollectionController@showUserCollections', Auth::User()->id)}}"
                 class="{{active_check('collections/user/*')}}
                 ml-2 px-3 py-2 rounded-md  border-2 text-lg font-medium bg-gray-200 text-gray-600 hover:text-gray-900 hover:bg-gray-400 focus:outline-none focus:text-white focus:bg-teal-400">COLLECTIONS</a>

              <a href="{{action('ArtifactController@showUserArtifacts', Auth::User()->id)}}"
                 class="{{active_check('artifacts/user/*')}}
                 ml-2 px-3 py-2 rounded-md  border-2 text-lg font-medium bg-gray-200 text-gray-600 hover:text-gray-900 hover:bg-gray-400 focus:outline-none focus:text-white focus:bg-teal-400">ARTIFACTS</a>
     
            </div>
          </div>
        </div>
       
       
       <!--  <div class="-mr-2 flex justify-center md:hidden">
          <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-center text-gray-400 hover:text-white hover:bg-gray-600 focus:outline-none focus:bg-gray-700 focus:text-white">
          MENU   <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden">
    
      <div class="px-2 pt-2 pb-3 ">

        <a href="{{action('SectionController@showUserSections', Auth::User()->id)}}" class="text-center mt-1 block px-3 py-2 rounded-md border-2 text-lg font-medium bg-gray-200 text-gray-600 hover:text-gray-900 hover:bg-gray-400 focus:outline-none focus:text-white focus:bg-teal-400">CLASSES</a>

          <a href="{{action('CollectionController@showUserCollections', Auth::User()->id)}}" class="text-center mt-1 block px-3 py-2 rounded-md border-2 text-lg font-medium bg-gray-200 text-gray-600 hover:text-gray-900 hover:bg-gray-400 focus:outline-none focus:text-white focus:bg-teal-400">COLLECTIONS</a>

          <a href="{{action('ArtifactController@showUserArtifacts', Auth::User()->id)}}" class="text-center mt-1 block px-3 py-2 rounded-md border-2 text-lg font-medium bg-gray-200 text-gray-600 hover:text-gray-900 hover:bg-gray-400 focus:outline-none focus:text-white focus:bg-teal-400">ARTIFACTS</a>
             
    </div>




    <!--   <div class="pt-4 pb-3 border-t border-gray-700">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
          </div>
          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white">Tom Cook</div>
            <div class="mt-1 text-sm font-medium leading-none text-gray-400">tom@example.com</div>
          </div>
        </div>
        <div class="mt-3 px-2">
          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Your Profile</a>
          <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Settings</a>
          <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Sign out</a>
        </div>
      </div>
    </div> -->
  </nav>
  
  <main class="bg-white">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

      @yield('content')

    </div>
  </main>
  

</div>
</div>

 
<!-- Scripts -->

<script src="{{ mix('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>

<script type="text/javascript">
// close flash message div after 4 seconds
window.setTimeout("hideMessage();", 4000);

    function hideMessage(){
    document.getElementById("message").style.display="none";
    }
    </script>


<script type="text/javascript">
    // show selected file when selected for file upload
    document.getElementById('file').onchange = uploadOnChange;

    function uploadOnChange() {
      var filename = this.value;
      var lastIndex = filename.lastIndexOf("\\");
      if (lastIndex >= 0) {
        filename = filename.substring(lastIndex + 1);
      }
      document.getElementById('filename').innerHTML = filename;
    }

</script>

</body>
</html>
