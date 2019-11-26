<!-- @extends('layouts.app')

@section('content') -->
    
        @if ( Auth::User()->hasRole('master'))

                    @include('partials.master.home')
                
        @elseif ( Auth::User()->hasRole('admin'))

                    @include('partials.admin.home')
                
        @elseif ( Auth::User()->hasRole('teacher'))

                    @include('partials.teacher.home')     
        @else
                    @include('partials.student.home')
                
        @endif
            
<!-- @endsection -->
