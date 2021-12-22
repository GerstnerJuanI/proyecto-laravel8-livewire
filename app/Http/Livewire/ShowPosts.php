<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPosts extends Component
{
    public $titulo;

    public function mount($title)
    {
        $this->titulo = $title;
    }

    public function render()
    {
        return view('livewire.show-posts');
    }
}
