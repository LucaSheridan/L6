@section('content')
  
<div class="flex items-center p-4 bg-gray-500">
    
{{-- Begin Container --}}     

    <div class="w-full">
            
{{--  Classes Section: Title --}}

        <div class="flex items-center mb-1">
           
            <div class="flex-grow px-2 text-left text-2xl rounded-br-lg text-gray-200">
            {{ Auth::User()->sections()->count() > 1 ? 'CLASSES' : 'CLASS'}}
            </div>

{{--  Classes Section: Menu --}}

            <div class="flex relative text-left">
                <dropdown>
    
                    <template v-slot:trigger>
                    @icon('menu', ['class' => ' w-5 h-5 text-gray-200'])
                    </template>

                    <div class="z-10 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-400 rounded py-1 list-none text-left leading-normal whitespace-no-wrap">

                        <li class="hover:text-gray-300 px-3">
                        <a class="" href="{{action('SectionController@create')}}"> 
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('plus-circle', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Create New Class</div>
                        </div>
                        </a>
                        </li>
               
                    </div>

                </dropdown>
            </div>
    
{{-- End Classes Header --}}

    </div>
     
        {{-- Begin Class Selection --}}

                    <div class="hidden sm:block pr-1 sm:flex sm:flex-wrap bg-white rounded-tl-lg rounded-bl-lg rounded-br-lg">
                        
                        @if ($activeSections->count() > 0)

                            @foreach ( $activeSections as $section)   

                             <div class="flex">
                                   
                                    <a class="p-2 no-underline text-lg aliased my-1 ml-1 text-gray-500 rounded-lg bg-gray-200 hover:bg-gray-300 hover:text-gray-700
                                
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

                            <option><span class="bg-red-300">Choose a Class</span>
                                      </option>
      
                                @foreach ( $activeSections as $section)                         
                                           
                                      <option value="{{action('SectionController@show', $section->id) }}">{{ $section->title}}
                                      </option>
                            
                                @endforeach

                           </select>

            </div>

            </div>

        {{--  End Class Section on Mobile --}}


        {{--  Classes Section: Menu --}}

       
            <div class="flex items-center mt-6 mb-1">
           
                <div class="flex-grow mb-0 px-2 text-left text-2xl rounded-br-lg text-gray-200">
                ARTIFACTS                    
                </div>

        {{-- Artifacts Title --}}
            
                <div class="flex relative text-left">
                <dropdown>
    
                    <template v-slot:trigger>
                    @icon('menu', ['class' => ' w-5 h-5 text-gray-200'])              

                    </template>

                    <div class="z-10 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-400 rounded py-1 list-none text-left leading-normal whitespace-no-wrap">

                        <li class="hover:text-gray-300 px-3">
                        <a class="" href="{{action('ArtifactController@create')}}"> 
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('plus-circle', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Create New Artifact</div>
                        </div>
                        </a>
                        </li>
               
                    </div>

                </dropdown>
            </div>
            </div>
        
        {{-- Artifacts List --}}
   
            <div class="flex flex-wrap h-1/4 w-lg overflow-x-scroll items-center items-stretch bg-white p-3 rounded-tl-lg rounded-bl-lg rounded-br-lg mb-4">
<!--             <div class="w-xl bg-white p-2 h-1/2 overflow-x-scroll p-2 rounded-tl-lg rounded-bl-lg rounded-br-lg mb-4">
 -->
        @if ($artifacts->count() >0) 

        @foreach ($artifacts as $artifact) 
            
            <div class="inline-block p-2 w-1/3 sm:w-1/3 md:w-1/4 lg:w-1/6 opacity-100 hover:opacity-75">
<!--             <div class="float-left p-2 opacity-100 hover:opacity-75">
 -->        
                <a href="{{action('ArtifactController@show', $artifact->id)}}">
                    <img class="rounded-lg" src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_thumb}}">
                </a>      
            </div>


        @endforeach

        @else

        <div class="p-2 text-gray-600 leading-normal">Artifacts can be images of any stage of your creative work. Research, sketches, detailed plans, final artworks. Why not start by uploading something you've created?</div>

        @endif

   </div>

{{-- COLLECTIONS --}}

{{--  Classes Section: Title --}}

        <div class="flex items-center mb-1">
           
            <div class="flex-grow px-2 text-left text-2xl rounded-br-lg text-gray-200">
            COLLECTIONS
            </div>

{{--  Classes Section: Menu --}}

            <div class="flex relative text-left">
                <dropdown>
    
                    <template v-slot:trigger>
                    @icon('menu', ['class' => ' w-5 h-5 text-gray-200'])
                    </template>

                    <div class="z-10 absolute top-0 right-0 shadow-2xl bg-gray-700 text-gray-400 rounded py-1 list-none text-left leading-normal whitespace-no-wrap">

                        <li class="hover:text-gray-300 px-3">
                        <a class="" href="{{action('CollectionController@create')}}"> 
                        <div class="flex items-center">
                        <div class="pr-2 text-gray-500">
                        @icon('plus-circle', ['class' => 'w-5 h-5 hover:text-gray-200'])</div>
                         <div>Make New Collection</div>
                        </div>
                        </a>
                        </li>
               
                    </div>

                </dropdown>
            </div>
    
{{-- End Classes Header --}}

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
                            <a href="{{action('CollectionController@show', $collection )}}">
                                <img class="w-full rounded-t-lg opacity-75 hover:opacity-100 " src="https://s3.amazonaws.com/artifacts-0.3/{{$artifact->artifact_thumb}}">

                            </a>
                       </div>
                     @else
                     @endif

                @endforeach

            @else 

            {{-- Empty Collection Placeholder--}}

            <div class="relative w-full">
                            <a href="{{action('CollectionController@show', ['section' => $section , 'collection' => $collection ])}}">
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
