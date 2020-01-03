@extends('layouts.app')

@section('content')

<div class="flex flex-col items-center p-8">
    <h1 class="text-2xl mb-8 font-bold">Content Menu</h1>

    <div>
    	<div class="bg-gray-400 w-64 h-64 flex items-center justify-center">
		
		<dropdown>
      	
	      	<template v-slot:trigger>
	      		<button>...</button>
	      	</template>

	      	<div>
		      	<li><a href="#">Edit</li>
		      	<li><a href="#">Delete</li>
		      	<li><a href="#">Create</li>
	      	</div>

      	</dropdown>

  		</div>
    </div>

</div>


@endsection
