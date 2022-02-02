<div>
    {{-- se creo un metodo magico ya que el problema no amerita mayor estructura --}}
    <x-jet-danger-button wire:click="$set('open', true )">
        crear nuevo post
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo post
        </x-slot>
        <x-slot name="content">

            <div  wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Cargando imagen...</strong>
                <span class="block sm:inline">Espere por favor.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>

            @if ($image)
                <img class="mb-4" src="{{$image->temporaryUrl()}}">
            @endif


            <div class="mb-4">
                <x-jet-label value="Titulo del post">
                </x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="title"></x-jet-input>
                <!-- mensaje de error -->
                <x-jet-input-error for="title"></x-jet-input-error>


            </div>
            <div class="mb-4">
                <x-jet-label value="contenido del post">
                </x-jet-label>
                <textarea class="w-full form-control" rows="6" wire:model.defer="content"></textarea>
                <!-- mensaje de error  -->
                <x-jet-input-error for="content"></x-jet-input-error>
            </div>

            <div>
                <input type="file" wire:model="image" id="{{$identificador}}">
                <x-jet-input-error for="image"></x-jet-input-error>
                
            </div>


        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">
                cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-50" >
                crear post
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
