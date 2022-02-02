<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $open = true; // ventana abierta o cerrada.
    public $title, $content, $image, $identificador; // info inputs

    public function mount()
    {
        $this->indentificador  =rand();
    }
    protected $rules = [  //reglas de validacion
        'title' => 'required',
        'content' => 'required',
        'image' => 'required|image|max:2048'
    ];

    public function save(){

        $this->validate();

        $image = $this->image->store('posts');

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image
        ]);

        $this->reset(['open','title','content', 'image']); // reiniciamos valores al crear.

        $this->identificador = rand();
        //$this->emit('render'); // evento para renderizar.
        $this->emitTo('show-posts', 'render');//evento para renderizar exclusivamente show-posts.
        $this->emit('alert', 'El post se creó satisfactoriamente.'); // evento de alerta con mensaje
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}
