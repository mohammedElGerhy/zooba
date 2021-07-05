<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use App\Models\Citie;
use App\Models\Comment;
use App\Models\Presence;
use App\Models\Request_all_use;
//use Illuminate\View\Component;
use App\Models\Service;
use Illuminate\Http\Request;
use Livewire\Component;

class NotifComment extends Component
{

    public function render()
    {
        $showdates = Request_all_use::onlyTrashed()->
        where('user_id', auth()->user()->id)->
        where('artist_id', auth()->guard('artist')->id())->
        get()->last();
        return view('livewire.notif-comment', compact('showdates'));
    }

}
