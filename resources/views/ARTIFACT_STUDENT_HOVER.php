 <!--  {{-- Begin Artifact Overlay --}}

                        <div class="opacity-0 hover:opacity-50 absolute w-full bg-black bottom-0 p-1 left-0 text-white">
                
                            {{-- Begin Delete Artifact Form--}}

                                <span class="float-right">
                                    
                                    <form action="{{ action('ArtifactController@destroy', $artifact->id) }}" role="form" method="POST">

                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">

                                    <button class="" type="submit">
                                    @icon('icon-x-circle', ['class' => 'float-right text-gray-500 border-0 hover:text-red-400 w-8 h-8 fill-current'])
                                    </button>

                                    </form>
                                </span>

                            {{-- Begin Comment on Artifact Form--}}

                                <span class="float-right">
                                    
                                    <form action="{{ action('ArtifactController@addComment', $artifact->id) }}" role="form" method="POST">

                                    {!! csrf_field() !!}

                                    <button class="" type="submit">
                                    @icon('icon-comment', ['class' => 'text-gray-500 border-0 hover:text-gray-100 w-8 h-8 fill-current'])
                                    </button>

                                    </form>
                                </span>

                            {{-- Begin Attach to Form--}}

                            <span class="float-right">

                                <form>

                                {!! csrf_field() !!}

                                <button class="" type="submit">
                                @icon('icon-clip', ['class' => 'text-gray-500 border-0 hover:text-gray-100 w-8 h-8 fill-current'])
                                </button>

                            </form></span>

                            {{-- Begin Share Form--}}

                            <span class="float-right">

                                <form>

                                {!! csrf_field() !!}

                                <a href="{{action('ArtifactController@show', $artifact->id) }}">
                                @icon('icon-view', ['class' => 'text-gray-500 border-0 hover:text-gray-100 w-8 h-8 fill-current'])
                                </button>

                            </form></span>
                
                        </div> -->