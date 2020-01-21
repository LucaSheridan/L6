<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>image-div</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <!--   <link rel="stylesheet" href="/path/to/flickity.css" media="screen">
    <link rel="stylesheet" href="https://unpkg.com/flickity-fullscreen@1/fullscreen.css">
  -->

</head>

<body class="antialiased leading-none">
    
    <!-- <div id="app" class="container max-w-5xl m-auto "> -->
    <div id="app" class="h-full bg-red-300">
        <div class="p-4 bg-blue-300">1/5</div>
        
        <div class="flex">
            <div class="h-3/4 items-center justify-center">
            <img class="h-3/4 mx-2 my-2" src="https://s3.amazonaws.com/artifacts-0.3/uploads/1578686357.JPG">
            </div>

             <div class="h-3/4 items-center justify-center">
            <img class="h-3/4 my-2" src="https://s3.amazonaws.com/artifacts-0.3/uploads/1578712310.jpg">
            </div>
        </div>
   

    </div>
    

 <!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://unpkg.com/flickity-fullscreen@1/fullscreen.js"></script>


</body>
</html>
