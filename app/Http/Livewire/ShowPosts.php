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
        
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    
    protected $listeners = ['render' => 'render'];//se puede ['render'] // variable que escucha el evento de CreatePost.


    public function render()
    {
        $posts = Post::where('title','like','%' . $this->search . '%')
            ->orWhere('content','like','%' . $this->search . '%')
            ->orderBy($this->sort,$this->direction)
            ->get();
        //$posts = Post::all();

        return view('livewire.show-posts', compact('posts'));
        
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            }
            else {
                $this->direction ='desc';
            }
        }else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

}
