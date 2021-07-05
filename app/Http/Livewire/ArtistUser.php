<?php

namespace App\Http\Livewire;

use App\Models\Request_all_use;
//use Illuminate\View\Component;
use Livewire\Component;

class ArtistUser extends Component
{

   // public $statues;
    public function render()
    {
        $messages = Request_all_use::where('artist_id', auth()->guard('artist')->id())->where('deleted_at', '=', NULL)->get();

        return view('livewire.artist-user', compact('messages'));
    }


public function sendStatues ($id){
    $statues =  Request_all_use::findOrFail($id);
    $statues->update(['statues'=> 3]);
    }
}
