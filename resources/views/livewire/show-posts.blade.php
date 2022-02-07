<div wire:init='loadPosts'>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table> {{-- componente tabla --}}
            <div class="px-6 py-4 flex items-center">

                <div class="flex items-center">
                    <span>Mostrar:</span>
                    <select wire:model="cant" class="mr-2 form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>entradas</span>
                </div>

                {{-- <input type="text" wire:model="search"> --}}
                <x-jet-input class="flex-1 ml-4 mr-4" placeholder="buscar..." type="text" wire:model="search" />
                {{-- //donde ponemos -jet- para que busque dentro de la carpeta de jetstream --}}

                @livewire('create-post')
            </div>
            @if (count($posts))

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            wire:click="order('id')" scope="col">
                            ID
                            {{-- Sort --}}
                            @if ($sort == 'id')

                            @if ($direction == 'asc')
                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>

                            @else
                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>

                            @endif

                            @else
                            <i class="fas fa-sort float-right mt-1"></i>

                            @endif
                        </th>
                        <th wire:click="order('title')" scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                            {{-- Sort --}}
                            @if ($sort == 'title')

                            @if ($direction == 'asc')
                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>

                            @else
                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>

                            @endif

                            @else
                            <i class="fas fa-sort float-right mt-1"></i>

                            @endif
                        </th>
                        <th wire:click="order('content')" scope="col"
                            class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Content
                            {{-- Sort --}}
                            @if ($sort == 'content')

                            @if ($direction == 'asc')
                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>

                            @else
                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>

                            @endif

                            @else
                            <i class="fas fa-sort float-right mt-1"></i>

                            @endif
                        </th>

                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $item)
                    <tr>
                        <td class="px-6 py-4 ">
                            <div class="text-sm text-gray-900">
                                {{ $item->id }}</div>
                        </td>
                        <td class="px-6 py-4 ">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $item->title }}
                            </span>
                        </td>
                        <td class="px-6 py-4 ">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $item->content }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium flex">
                            {{-- @livewire('edit-post', ['post'=>$post], key($post->id)) // solo fue para explicar los
                            componentes de alineamiento --}}
                            <a class="btn btn-green" wire:click="edit({{$item}})">
                                <i class="fas fa-edit "></i>
                            </a>

                            <a class="btn btn-red ml-2" wire:click="$emit('deletePost',{{$item->id}})">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    <!-- More people... -->
                </tbody>
            </table>
            @if ($posts->hasPages())
            <div class="px-6 py-3">
                {{$posts->links()}}
            </div>
            @endif

            @else

            <div class=" px-6 py-3 relative flex justify-center items-center">
                <div class="bg-gray-500  animate-spin ease rounded duration-300 w-12 h-12 border-1 border-gray">
                    <img src="http://127.0.0.1:8000/storage/posts/doge.webp" alt="">
                </div>
            </div>
            <div class="px-6 py-3 relative flex justify-center items-center">
                <div class="px-6 py-3 rounded border-2 border-white">Sin Registros.</div>
            </div>


            @endif


        </x-table>

    </div>

    <x-jet-dialog-modal wire:model="open_edit">

        <x-slot name='title'>
            Editar el post
        </x-slot>

        <x-slot name='content'>


            <div wire:loading wire:target="image"
                class="w-full mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                role="alert">
                <strong class="font-bold">Cargando imagen...</strong>
                <span class="block sm:inline">Espere por favor. :)</span>
            </div>

            @if ($image)
            <img class="mb-4" src="{{$image->temporaryUrl()}}">
            @else
            <img src="{{ asset('storage/'.$post->image.'') }}" alt="">
            {{-- <img src="{{Storage::url($post->image)}}" alt=""> --}}

            @endif



            <div class="mb-4">
                <x-jet-label value="Titulo del post"></x-jet-label>
                <x-jet-input wire:model="post.title" type="text" class="w-full"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Contenido del post"></x-jet-label>
                <textarea wire:model='post.content' rows="10" class="form-control w-full"></textarea>
            </div>
            <div>
                <input type="file" wire:model="image" id="{{$identificador}}">
                <x-jet-input-error for="image"></x-jet-input-error>
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>


    </x-jet-dialog-modal>

    @push('js')
    <script src="sweetalert2.all.min.js"></script>
    <script>
        livewire.on('deletePost', postId =>{
            
        Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {

    if (result.isConfirmed) {

        livewire.emitTo('show-posts', 'delete', postId);


        Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
    }
    })
        })
    </script>

    @endpush

    {{-- <h1>hola mundo, {{$name}} </h1> --}}
    {{-- <h1>hola, {{$titulo}}</h1> --}}
</div>