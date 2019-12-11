@extends('layouts.app')

@section('content')
  
<div class="flex items-center p-4 bg-gray-500">
    


            <div>Site Index</div>
           
            <table>
            <thead>
            <tr>
            <td>
            Name
            </td>
            <td>
            Teachers 
            </td>
             <td>
            Students
            </td>
             <td>
            Classes
            </td>
            <td>Delete
            </td>
            <td>Edit
            </td>
            </tr>
            </thead>
            
            @foreach ($sites as $site)
            <tr>
            <td>
           {{ $site->name}}
            </td>
            <td>
          

                @php ($i = 0)
               
                @foreach ($site->users as $user)

                    @if ( $user->hasRole('teacher')) 

                        @php ( $i++ )

                    @endif

                @endforeach

                {{ $i }}
                @php ($i = 0)

        </td>
            <td>
              
                @php ($i = 0)
               
                @foreach ($site->users as $user)

                    @if ( $user->hasRole('student')) 
                    @php ($i++)
                    @endif

                @endforeach

                {{ $i }}
                @php ($i = 0)

            </td>    
            <td>

                {{ count($site->sections)}}

             </td>
             <td>

            </table>
          
            
            </div>            


  
    
@endsection
