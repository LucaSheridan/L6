@foreach (session('flash_notification', collect())->toArray() as $message)
    
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
   
        @if ( $message['level'] == 'success')

        <div id="message" class="p-2 border-0 border-t-0 ml-0 my-0
        bg-green-300 text-green-800 border-green-500 shadow "
        role="alert"
        >

        @else

        <div class="p-2 border-2 ml-4 mt-4 mr-4
        bg-gray-500 {{ $message['level'] }}
        {{ $message['important'] ? 'alert-important' : '' }}"
        role="alert"
        >
    @endif


            @if ($message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            {!! $message['message'] !!}
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
