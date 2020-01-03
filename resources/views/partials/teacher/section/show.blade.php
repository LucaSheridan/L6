@extends('layouts.app')

@section('content')
      

{{-- Begin Content Container --}}     

<div class="flex items-center p-4 bg-gray-500">


    <div class="w-full m-0 p-0">

    {{-- Begin Class Header --}} 
            
    <div class="flex border-0">

        {{-- Class Title --}}
        
        <div class="flex-grow px-2 text-left text-2xl rounded-br-lg text-gray-300 mb-2">CLASS</div>

         {{-- Class Option --}}

            <div class="flex ">
                    
                    <a class=""href="{{action('SectionController@edit', $activeSection)}}">
                        <div class="flex justify-end p-1 bg-gray-400 hover:bg-gray-300 rounded-t-lg">
                        
                            <div>@icon('edit', ['class' => 'text-gray-500 hover:text-red-400 w-6 h-6'])</div>

                             <div class="flex pt-1 px-1 text-gray-600">Edit</div>
 
                        </div>

                     </a>
            </div>

            <div class="flex ">
                    
                    <form action="{{action('SectionController@destroy', $activeSection)}}" method="POST">

                    {{ csrf_field() }}

                    <input type="hidden" name="_method" value="DELETE">

                        <div class="flex justify-end p-1 bg-gray-400 hover:bg-gray-300 rounded-t-lg">
                        
                            <div>@icon('x-circle', ['class' => 'text-gray-500 hover:text-red-400 w-6 h-6'])</div>

                             <div class="flex pt-1 px-1 text-gray-600">
                              <button>Delete</button></div>


 
                        </div>

                     </form>
            </div>
    
      {{-- End Class Option --}}
                
    </div>

        {{-- Class Navigation --}}

            @include('partials.teacher.section.nav')


    <div class="flex flex-wrap w-full mt-4">
         
{{-- START STUDENTS ------------------------------------------------------------------------------------------------}}

 <div class="w-full sm:w-1/2 mb-4 sm:mb-0 sm:border-r-8 border-gray-500">
             
           {{--  Begin Student Header  --}}

            <div class="flex w-full">

                {{-- Students Title --}}
           
                <div class="flex-grow px-2 pt-1 text-left text-2xl rounded-br-lg text-gray-300">STUDENTS
                </div>
            
                {{-- Students Menu --}}

                    <div class="flex">
                    
                    <a class=""href="{{action('SectionController@edit', $activeSection)}}">
                        
                        <div class="flex justify-end p-1 bg-gray-400 hover:bg-gray-300 border-b border-gray-400 rounded-t-lg text-gray-600">
                        
                            <div>@icon('search', ['class' => 'w-4 h-4 float-right ml-1 w-6 h-6'])</div>
                            <div class="flex pt-1 px-1">Search</div>
 
                        </div>
                     </a>

                    </div>
    
                {{-- End Students Menu --}}

           </div>

           {{-- End Students Header --}}

            @if ($activeSection->students->count() > 0)

                                <div class="bg-gray-100 rounded-l-lg rounded-br-lg p-2 text-sm">
                                    <ul class="leading-snug text-sm no-underline text-gray-700">
                                    
                                    @foreach ($activeSection->students as $student)
                                    
                                    <a href="{{action('SectionController@studentProgress', ['section'=> $activeSection, 'user' => $student])}}">
                                               
                                    <li class="pl-2 rounded-sm text-gray-600 text-sm bg-gray-100 hover:bg-gray-200 hover:text-red-500">
                                    {{ $student->fullName}}</li>

                                    </a>
                                    

                                @endforeach
                            </ul>

                                </div>

                            @else
           
                                <div class="text-gray-600 rounded-l-lg rounded-br-lg bg-gray-100 p-3 no-underline text-sm">

                                No students are currently enrolled in this class.
                                </div>            
                            
                            @endif


            </div>

              {{-- START ASSIGNMENT -----------------------------------------------------------------------------------}}

         <div class="w-full sm:w-1/2 border-gray-500 mb-4">
             
           {{--  Begin Assignment Header  --}}

            <div class="flex w-full">

                {{-- Assignments Title --}}
           
                <div class="flex-grow px-2 pt-1 text-left text-2xl rounded-br-lg text-gray-300">ASSIGNMENTS
                </div>
            
                {{-- Assignment Option --}}

                    <div class="flex ">
                    
                    <a class=""href="{{action('AssignmentController@create', $activeSection)}}">
                        
                        <div class="flex justify-end p-1 bg-gray-300 bg-gray-400 hover:bg-gray-300 border-b rounded-t-lg text-gray-600">
                        
                            <div>@icon('plus-circle', ['class' => 'w-6 h-6 text-gray-500 hover:text-red-400 w-6 h-6'])</div>
                            <div class="flex pt-1 px-1">Create</div>
 
                        </div>
                     </a>

                    </div>
    
                {{-- End Assignment Menu --}}

           </div>

           {{-- End Assignment Header --}}

           <div class="bg-gray-100 p-1 rounded-l-lg rounded-br-lg mb-2 sm:mb-2">

            {{-- Begin Assignment Content for Mobile --}}

                <div class="flex bg-gray-100 sm:hidden w-full border-0">

                    <div class="inline-block relative w-full text-center">

                    <select class="w-full px-2 py-1 pr-8 m-0 bg-gray-300 font-semibold text-sm text-gray-600 form-select" onchange="location = this.value;">
      
                            @foreach ( $sectionAssignments as $assignment)                         
                                       
                                <option value="{{action('AssignmentController@show', ['assignment' => $assignment->id , 'section' => $activeSection->id])}}" >{{ $assignment->title}}</option>
                        
                            @endforeach

                             @if ($sectionAssignments->count() < 1) 
                             No Assignments
                             @else
                             @endif
                    </select>
               
                    </div>
                </div>

        {{-- End Assignment Content for Mobile --}}

        {{-- Start Assignment Content for Desktop --}}

        <div id="accordion" class="hidden sm:block border-0 p-0"> 

                @if ($sectionAssignments->count() > 0)

                    @foreach ($sectionAssignments as $assignment)

                        <accordion class="block bg-gray-100 m-0 p-2 hover:bg-gray-300 rounded-lg">
            
                        <div slot="header">
                    
                        <a href="{{action('AssignmentController@show', ['assignment' => $assignment->id , 'section' => $activeSection->id])}}" class="text-gray-600 no-underline text-sm hover:text-red-500"><b>{{$assignment->title}}</b></a>

                        {{-- Add Due Date to Header if a Single Component Assignment --}}

                            @if ($assignment->components->count() < 2 )
                                <span class="float-right text-sm text-gray-600">
                                
                                @foreach ( $assignment->components as $component )
                                
                                    @if (is_null($component->date_due))
                                    N/A
                                    @else
                                    {{ Carbon\Carbon::parse($component->date_due)->format('m/j/y') }}
                                    @endif
                                
                                @endforeach
                                
                                </span>
                            @else
                                {{-- No due date next to the assignment title --}}
                            @endif
                
                        @if ($assignment->components->count() < 2)

                        </accordion>

                        @else

                            <div class="block body text-gray-600 text-sm mt-2">
                                                                                          
                                @foreach ( $assignment->components as $component )
                
                                    <div class="pl-2 mt-1 bg-red-50">
                            
                                        <a href="{{action('ComponentController@gallery', ['section' => $assignment->section_id , 'assignment' => $component->assignment_id , 'component' => $component->id ])}}" class="p-0 m-0 hover:text-red-400 hover:rounded no-underline text-sm">
                                        {{ $component->title}}</a>

                                        <span class="float-right">
                                        <a href="{{action('ComponentController@edit', ['section' => $assignment->section_id , 'assignment' => $component->assignment_id , 'component' => $component->id ]) }}" class="p-0 m-0 hover:text-red-400 no-underline text-sm">
                                        {{ Carbon\Carbon::parse($component->date_due)->format('m/j/y') }}</a>
                                        </span>
                                    
                                    </div>
                    
                            @endforeach

                            </div>                                           

                        @endif
        
                    </div>                                            
                     </accordion>

                            @endforeach

                            @else
           
                                <div class="text-gray-600 bg-gray-100 p-2 no-underline text-sm">No assignments
                                </div>            
                            
                            @endif

                    </div>

                    {{-- End Assignment Wrapper --}}

        </div>
            
</div>
        


        
           <!--  <drop-down class="text-right bg-gray-700 pt-2 pb-1">

                                    <template v-slot:icon>
                                    
                                        <div class="pl-2">

                                        @icon('cog', ['class' => 'w-5 h-5 mr-2 text-gray-500 hover:text-red-500 w-6 h-6 overflow-visible'])
                                        
                                        </div>

                                    </template>                       

                                    <template v-slot:options class="text-center">
                                    
                                        <ul class="text-left text-sm">
                                        <li class="hover:text-red-500"><a href="#">View Course Code</a></li>
                                        <li class="hover:text-red-500"><a href="#">Print Roster</a></li>
                                        </ul>

                                    </template>

                                </drop-down>


                        {{-- Begin Student List--}}

                        <div class="p-0 border-l-2 border-b-2 border-r-2 border-gray-400">
                                    
                        <div id="accordion" class="border-0 p-0"> 

                            @if ($activeSection->students->count() > 0)

                                @foreach ($activeSection->students as $student)

                                    <div class="p-2 text-gray-600 text-sm bg-gray-100 hover:bg-gray-200">
                                                <a href="{{action('SectionController@studentProgress', ['section'=> $activeSection, 'user' => $student])}}" class="text-gray-700 no-underline text-sm hover:text-red-500">
                                                {{ $student->fullName}}</a>
                                    </div> 

                                @endforeach

                            @else
           
                                <div class="text-gray-600 bg-gray-100 p-2 no-underline text-sm">
                                No students are currently enrolled in this class.
                                </div>            
                            
                            @endif

                        </div>

                        {{-- End Student Loop --}}

                        </div>

                    </div>
                </div>

        {{-- End Class Content Wrapper--}}

           </div> -->
        
     
<!-- <script>
  Vue.component('accordion', {
  
  props: ['theme'],
  
  template: `<div class="accordion">
    
    <div class="header" v-on:click="toggle">
      <slot name="header"></slot>
    </div>
    
    <transition name="accordion"
      v-on:before-enter="beforeEnter" v-on:enter="enter"
      v-on:before-leave="beforeLeave" v-on:leave="leave">
      
      <div class="body" v-show="show">
        <div class="body-inner">
          <slot></slot>
        </div>
      </div>
    </transition>
  </div>`,

  data() {
    return {
      show: 
    };
  },
  
  methods: {
    toggle: function() {
      this.show = !this.show;
    },
  
    beforeEnter: function(el) {
      el.style.height = '0';
    },
    enter: function(el) {
      el.style.height = el.scrollHeight + 'px';
    },
    beforeLeave: function(el) {
      el.style.height = el.scrollHeight + 'px';
    },
    leave: function(el) {
      el.style.height = '0';
    }
  }
});

const vm = new Vue({
  el: '#accordion'
});
  </script> -->

</body>

@endsection

