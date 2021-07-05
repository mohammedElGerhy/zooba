<div wire:poll>
    @foreach($messages as $message)
        @if(!empty($message))
            @if($message->statues == 1 || $message->statues == 0 || $message->statues == 2)
            <div class="row-cols-4" id="hidden">
                <div class="alert alert-primary" role="alert">
                    {{ $message->created_at->format('Y:m:d') }}
                    {{date('h:i A', strtotime($message->created_at))}}
                    <hr>
                    <a href="{{route('artist.show', $message->artist -> id)}}" class="alert-link btn btn-primary">قبول</a>
                    <a href="{{route('artist.destroy', $message -> id)}}" class="alert-link btn btn-danger">رفض</a>
                    @if($message->statues == 2)
                    <button wire:click="sendStatues({{$message->id}})" class="btn btn-secondary ">اخفاء
                        @endif
                </div>
            </div>
                @endif
        @endif
        @endforeach
    <!--
                    <a href="#" style="float: right" id="click">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                        </svg>
                    </a>
                    -->
</div>
