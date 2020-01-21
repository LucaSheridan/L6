@extends('layouts.app')

@section('content')

<!-- <div class="main-carousel" data-flickity='{ "cellAlign": "center", "contain": true }'>
 -->
       <div class="main-carousel" data-flickity='{ "prevNextButtons": true, "cellAlign": "center", "contain": true, "autoPlay": true, "wrapAround": true, "fullscreen": true}' >
  
	@foreach ($collection->artifacts as $artifact)


  		<div class="carousel-cell" style="background-image: url()">
		<img src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_path}}">
  		</div>

	@endforeach
</div>


@endsection
