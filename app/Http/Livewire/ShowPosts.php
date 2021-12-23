<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    // public $titulo;

    // public function mount($title)
    // {
    //     $this->titulo = $title;
    // }
    // public $name;
    // public function mount($name)
    // {
    //     $this->name = $name;
    // }
        

    public function render()
    {
        $posts = Post::all();
        return view('livewire.show-posts', compact('posts'));
        
    }

}
