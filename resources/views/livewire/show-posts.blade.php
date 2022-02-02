<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table> {{-- componente tabla --}}
            <div class="px-6 py-4 flex items-center">
                {{-- <input type="text" wire:model="search"> --}}
                <x-jet-input class="flex-1 mr-4" placeholder="buscar..." type="text" wire:model="search" />
                {{-- //donde ponemos -jet- para que busque dentro de la carpeta de jetstream --}}

                @livewire('create-post')
            </div>
            @if ($posts->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th 
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')" 
                                scope="col">
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
                        @foreach ($posts as $post)
                            <tr>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $post->id }}</div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $post->title }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 ">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $post->content }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium">
                                    @livewire('edit-post', ['post'=>$post], key($post->id))
                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>

            @else
                <div class="px-6 py-4">
                    <h3>Sin registros.</h3>
                </div>
            @endif
        </x-table>

    </div>
    {{-- <h1>hola mundo, {{$name}} </h1> --}}
    {{-- <h1>hola, {{$titulo}}</h1> --}}
</div>
