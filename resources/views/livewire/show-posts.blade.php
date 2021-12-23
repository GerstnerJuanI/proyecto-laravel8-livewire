<div>
    
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            {{$posts}}
        </div>
    {{-- <h1>hola mundo, {{$name}} </h1> --}}
    {{-- <h1>hola, {{$titulo}}</h1> --}}
</div>
