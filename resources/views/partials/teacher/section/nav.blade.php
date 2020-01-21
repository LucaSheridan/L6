
                    <div class="hidden sm:block pr-1 sm:flex sm:flex-wrap bg-white rounded-l-lg rounded-br-lg">
                        
                        @if (Auth::User()->activeSections()->count() > 0)

                            @foreach ( Auth::User()->activeSections as $section)  

                             <div class="flex">
                                   
                                    <a class="p-2 no-underline text-sm aliased my-1 ml-1 text-gray-500 rounded-lg bg-gray-200 hover:bg-gray-300 hover:text-gray-700 text-lg
                                
                                    {{active_check(['teacher/section/'.$section->id.'/student/*',
                                                    'teacher/section/'.$section->id.'/assignment/*',
                                                    'teacher/section/'.$section->id

                                    ])}}"
                                    
                                    href="{{action('SectionController@show', $section)}}">

                                    {{ $section->title}}</a>

                                </div>
                        
                            @endforeach

                        @else

                        <div class="p-2">    

                        <p>You are currently have no assigned classes.</p>

                        </div>

                        @endif

                    </div>
        
            {{-- End Class Content --}}

            
            {{-- Begin Class Content for Mobile --}}

            <div class="sm:hidden">
                        
                <div class="bg-gray-100 sm:hidden p-1 flex flex-wrap w-full rounded-lg">

                <div class="sm:hidden w-full">
                        
                <div class="bg-gray-100 sm:hidden py-0 flex flex-wrap w-full border-0">

                {{-- Begin Class Dropdown on small displays --}}

                    <div class="sm:hidden w-full">
                        
                        <div class="sm:hidden px-0 py-0 flex flex-wrap w-full mr-4">
                    
                            <select class="px-2 py-1 pr-8 m-0 bg-gray-300 form-select w-full text-lg text-red-500

                            " onchange="location = this.value;">
      
                                 <option class="" value="{{action('SectionController@show', $section->id) }}">{{$activeSection->title}}</option>
                
                                    @foreach ( Auth::User()->activeSections as $section)                         
                                                   
                                        @if ( $section->id == $activeSection->id ) 
                                        @else
                                            <option value="{{action('SectionController@show', $section->id) }}">{{ $section->title}}</option>
                                        @endif
                                    
                                    @endforeach

                            </select>

                        </div> 

                    </div>

                {{-- Begin Class Dropdown on small displays --}}


            </div>

        </div>

        {{--  End Class Section on Small Screens --}}

    </div>

   {{-- End Class Row --}}

   </div> 