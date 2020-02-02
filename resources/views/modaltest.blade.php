<!-- <style>

  .overlay {

    visibility: hidden;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center; 
    background: rgba(0, 0, 0, .6);

    }

    .overlay:target {

    visibility: visible;
    border-radius: 0px;
    padding: 1em;
    
    }

    .modal {

        position: relative;
        width: 600px;
        max-width: 80%;
        background: white;
        border-radius: 8px;
        padding: 1em 2em;

    }

    .modal .close {

        position: absolute;
        top: 15px;
        right: 15px;
        color: grey;
        text-decoration: none;
    }

    .overlay .cancel {

        position: absolute;
        background: red;
        height: 100%;
        width: 100%;
    }

</style> -->


@extends('layouts.app')

@section('content')
      
    <a href="#zoom-modal" class=
    "inbline-block h-16 m-4 p-2 bg-red-200 rounded-lg">Zoom</a>

        @component('modal', ['name' => 'zoom-modal'])

            <h1 class="block mb-4 p-2 text-gray-600 uppercase">Zoom Image</h1>

            <p class="leading-tight"/>Content of modal should go here. Whatever you need to say should be styled accordingly.
            </p>

        @endcomponent

    <a href="#cancel-modal" class=
    "inbline-block h-16 m-4 p-2 bg-red-200 rounded-lg">Cancel</a>


    @component('modal', ['name' => 'cancel-modal'])

        <h1 class="mb-4 text-gray-600 uppercase">Cancel Artifacts Account</h1>

        <p class="leading-tight"/>Content of modal should go here. Whatever you need to say should be styled accordingly.
        </p>

    @endcomponent



</body>

@endsection

