<?php

namespace App\Http\Livewire;

use App\Models\Presence;
use Livewire\Component;

class Notifications extends Component
{
    public function render()
    {
        $presences = Presence::orderBy('id', 'DESC')->get();
        $comments = \App\Models\Comment::orderBy('id', 'DESC')->get();
        return view('livewire.notifications', compact('comments', 'presences'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function delete($id)
    {
        \App\Models\Comment::find($id)->delete();
    }
}
