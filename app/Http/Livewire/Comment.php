<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comment extends Component
{

    public $data, $name, $comment;

    public function render()
    {
        $this->data = \App\Models\Comment::orderBy('id', 'DESC')->get();
        return view('livewire.comment');
    }
    private function resetInput()
    {
        $this->name = null;
        $this->comment = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'comment' => 'required'
        ]);
        \App\Models\Comment::create([
            'name' => $this->name,
            'comment' => $this->comment
        ]);
        $this->resetInput();
    }
}
