<div wire:poll>
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Sorry!</strong> invalid input.<br><br>
                <ul style="list-style-type:none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div>
                    <div class="form-group">
                        <div class="mb-3 col-sm-6">
                            <input type="text" wire:model="name" class="form-control input-lg m-bot15" placeholder="الاسم">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 col-sm-6">
                            <textarea class="form-control" rows="3" wire:model="comment" placeholder="التقيم"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">

                    <button wire:click="store()" class="btn btn-primary form-control input-lg m-bot15">Submit</button>
                    </div>
                </div>

            </div>
            <div class="col">
                @foreach($data as $row)
                    <p class="alert alert-light" role="alert">
                      <span>{{$row->name}}</span><br>
                        <span> {{$row->comment}} </span><br>
                    <span> {{date('Y:m:d', strtotime($row->time))}}  {{date('h:i A', strtotime($row->time))}}</span>

                    </p>
                @endforeach
            </div>
        </div>
    </div>

</div>
