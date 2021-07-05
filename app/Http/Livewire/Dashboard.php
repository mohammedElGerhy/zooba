<?php

namespace App\Http\Livewire;

use App\Models\Request_all_use;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $request_alls = Request_all_use::orderBy('id', 'DESC')->get();
        return view('livewire.dashboard', compact('request_alls'));
    }
}
