<div wire:poll>
    @if(!empty($success))
        @if($success->statues == 0)

        <div class="alert alert-success text-center" role="alert">
        {{$success->user->name}}    بدات الخدمة
    </div>
        @endif

    @if($success->statues == 2)
        <div class="alert alert-danger text-center" role="alert">
            {{$success->user->name}}    انتهاء الخدمة
        </div>
        @endif
    @endif
</div>
