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
            <div class="mb-4">
                <x-jet-label value="Titulo del post">
                </x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="title"></x-jet-input>
                
            </div>
            <div class="mb-4">
                <x-jet-label value="contenido del post">
                </x-jet-label>
                <textarea class="w-full form-control" rows="6" wire:model.defer="content"></textarea>
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">
                cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save">
                crear post
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
