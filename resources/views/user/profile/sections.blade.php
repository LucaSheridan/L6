@extends('layouts.app2')

@section('content')

<p class="my-2">CLASSES</p>

<ul class="decoration-none">

@foreach ($sections as $section)

<li class="p-2">{{$section->title}}</li>

@endforeach

</ul>

@endsection