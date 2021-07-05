<?php

namespace App\Http\Livewire;

use App\Models\Request_all_use;
use Livewire\Component;

class Success extends Component
{
    public function render()
    {
        $success = Request_all_use::select('*')->
        where('user_id', auth()->user()->id)->get()->last();
        //where('statues', 0)->get()->last();
        return view('livewire.success', compact('success')); //->with(['success' => 'بدا الخدمة']);
    }

}
