<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    public $open = false; // ventana abierta o cerrada.
    public $title, $content; // info inputs

    protected $rules = [  //reglas de validacion
        'titles' => 'required|max:100',
        'content' => 'required|max:100',
    ];

    public function save()
    {

        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->reset(['open','title','content']); // reiniciamos valores al crear.

        //$this->emit('render'); // evento para renderizar.
        $this->emitTo('show-posts', 'render');//evento para renderizar exclusivamente show-posts.
        $this->emit('alert', 'El post se creó satisfactoriamente.'); // evento de alerta con mensaje
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}
