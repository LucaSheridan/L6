@extends('layouts.app')

@section('content')
  
<div class="flex items-center p-4 bg-gray-500">
    
        {{-- Begin Container --}}     

        <div class="w-full m-0 p-0">

        {{-- Begin Class Section --}} 

             {{-- Class Title --}}

            <div class="flex">
           
                <div class="flex-grow px-2 text-left text-2xl rounded-br-lg text-gray-300">
                                
                {{ Auth::User()->sections()->count() > 1 ? 'CLASSES' : 'CLASS'}}

            </div>
            
        {{-- Class Option --}}

            <div class="flex ">
                    
                    <a class=""href="{{action('SectionController@create')}}">
                        <div class="flex justify-end p-1 bg-gray-400 hover:bg-gray-300 rounded-t-lg">
                        
                            <div>@icon('icon-plus-circle', ['class' => 'text-gray-500 hover:text-red-400 fill-current'])</div>

                             <div class="flex pt-1 px-1 text-gray-600">Create</div>
 
                        </div>

                     </a>
            </div>
    
      {{-- End Class Option --}}

           </div>
     
      {{-- Begin Class Selection --}}

                    <div class="hidden sm:block pr-1 sm:flex sm:flex-wrap bg-white rounded-tl-lg rounded-bl-lg rounded-br-lg">
                        
                        @if ($activeSections->count() > 0)

                            @foreach ( $activeSections as $section)   

                             <div class="flex">
                                   
                                    <a class="p-2 no-underline text-sm aliased my-1 ml-1 text-gray-500 rounded-lg bg-gray-200 hover:bg-gray-300 hover:text-gray-700
                                
                                    {{active_check('teacher/section/'.$section->id)}}"
                                    
                                    href="{{action('SectionController@show', $section->id)}}">
                                    {{ $section->title}}</a>

                                </div>
                        
                            @endforeach

                        @else

                        <div class="p-2">    

                        <p>You are currently have no assigned classes.</p>

                        </div>

                        @endif

                    </div>
        
        {{-- End Class Selection --}}

        
        {{-- Begin Class Selection for Mobile --}}

                    
            <div class="sm:hidden bg-gray-100 sm:hidden p-1 flex flex-wrap w-full rounded-tl-lg rounded-bl-lg rounded-br-lg">

            <div class="w-full flex flex-wrap rounded-lg">
                        
                            <select class="px-2 py-1 pr-8 bg-gray-300 form-select w-full text-xl text-red-500

                            " onchange="location = this.value;">>
      
                                @foreach ( $activeSections as $section)                         
                                           
                                      <option value="{{action('SectionController@show', $section->id) }}">{{ $section->title}}
                                      </option>
                            
                                @endforeach

                           </select>

<!--                         </div> 
 -->

            </div>

            </div>

        {{--  End Class Section on Mobile --}}

<div class="flex mt-4">
           
        {{-- Artifacts Title --}}

            <div class="flex-grow px-2 text-left text-2xl rounded-br-lg text-gray-300">ARTIFACTS</div>
            
            <div class="flex">
                    
                {{-- Options Tab Begin--}}

                    <a class="" href="{{action('ArtifactController@create')}}">
                        
                        <div class="flex justify-end p-1 bg-gray-400 hover:bg-gray-300 rounded-t-lg">
                        
                            <div>@icon('icon-plus-circle', ['class' => 'float-right text-gray-500 hover:text-red-400 fill-current'])</div>

                            <div class="flex pt-1 px-1 text-gray-600">Create</div>

                        </div>
                     </a>

                {{-- Option Tab End--}}

            </div>
            </div>
        
        {{-- Artifacts List --}}
   
            <div class="flex flex-wrap items-center items-stretch bg-white p-2 rounded-tl-lg rounded-bl-lg rounded-br-lg mb-4">

        @if (Auth::User()->artifacts->count() >0) 

        @foreach (Auth::User()->artifacts as $artifact) 
            
            <div class="flex items-center text-center relative p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5">
        
          {{-- Begin Individual Artifacts Container--}}

          <div class="relative w-full">
                   
                <a href="{{action('ArtifactController@show', $artifact->id)}}">
                    <img class="w-full rounded-lg shadow-lg hover:shadow-xl" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_thumb}}">
                </a>      
         
          </div>
        
        </div>


        @endforeach

        @else

        <div class="p-2 text-gray-600">No artifacts. Why not upload one one?</div>

        @endif

   </div>

{{-- COLLECTIONS --}}

 {{-- Collections Title --}}

        <div class="flex border-0 border-yellow-600">
           
            <div class="flex-grow px-2 text-left text-2xl rounded-br-lg text-gray-300">COLLECTIONS</div>
            
            <div class="flex">
                    
                    {{-- Option 1: Solo Icon Tab Link --}}

                    <a class="" href="{{action('CollectionController@create')}}">
                        <div class="flex justify-end p-1 bg-gray-400 hover:bg-gray-300 rounded-t-lg">
                        
                            <div>@icon('icon-plus-circle', ['class' => 'text-gray-500 hover:text-red-400 fill-current'])</div>

                             <div class="flex pt-1 px-1 text-gray-600">Create</div>
 
                        </div>
                     </a>

                     {{-- Option 1: End--}}

                       
            </div>
            </div>
     
    {{-- Collections List --}}
   
    <div class="flex flex-wrap items-center items-stretch bg-white p-2 rounded-tl-lg rounded-bl-lg rounded-br-lg mb-4">            
    @if (Auth::User()->collections->count() > 0)

    @foreach (Auth::User()->collections as $collection) 
            
       <div class=" items-center text-center relative p-2 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5">
        
          {{-- Begin Individual Collection Container--}}

          {{-- Generate Collection Thumbnail --}}

            @if ($collection->artifacts->count() != 0)

                @foreach ($collection->artifacts as $artifact)

                    @if ( $loop->first )
                            <div class="relative w-full">
                            <a href="{{action('CollectionController@showStudent', ['section' => $section , 'collection' => $collection ])}}">
                                <img class="w-full rounded-t-lg opacity-75 hover:opacity-100 " src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_thumb}}">

                            </a>
                       </div>
                     @else
                     @endif

                @endforeach

            @else 

            {{-- Empty Collection Placeholder--}}

            <div class="relative w-full">
                            <a href="{{action('CollectionController@showStudent', ['section' => $section , 'collection' => $collection ])}}">
                                <img class="w-full rounded-t-lg opacity-75 hover:opacity-100 " src="{{asset('storage/upload.png')}}">

                            </a>
            </div>

            @endif

        <div class="bg-gray-300 text-gray-700 p-2 rounded-b-lg hover:shadow-xl shadow-lg sm:text-sm">{{strtoupper($collection->title)}}</div>

        </div>

    @endforeach

    @else
    <div class="p-2 text-gray-600">No Collections. Why not create one one?</div>
    @endif
    </div>

  
    
@endsection
