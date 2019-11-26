@extends('layouts.app')

@section('content')
<div class="w-container">
    <div class="w-full">
               
            <div class="bg-gray-200">Artifacts Index</div>
            <div class="bg-gray-100">
                
            @foreach ($artifacts as $artifact)

            <img class="w-1/2 border-white border-4 p-4 " src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_thumb}}">
                       

                        </div>
            @endforeach
            
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

