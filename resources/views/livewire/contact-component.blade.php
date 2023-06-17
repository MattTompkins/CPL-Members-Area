<div>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="name">
            Name
        </label>
        <input wire:model="contact.name" type="text" id="name" class="w-full px-3 py-2 border rounded-md">
        @error('contact.name') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="organisation">
            Organisation
        </label>
        <input wire:model="contact.organisation" type="text" id="organisation" class="w-full px-3 py-2 border rounded-md">
        @error('contact.organisation') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="email">
            Email
        </label>
        <input wire:model="contact.email" type="email" id="email" class="w-full px-3 py-2 border rounded-md">
        @error('contact.email') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="phone1">
            Phone 1
        </label>
        <input wire:model="contact.phone1" type="text" id="phone1" class="w-full px-3 py-2 border rounded-md">
        @error('contact.phone1') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="phone2">
            Phone 2
        </label>
        <input wire:model="contact.phone2" type="text" id="phone2" class="w-full px-3 py-2 border rounded-md">
        @error('contact.phone2') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="notes">
            Notes
        </label>
        <textarea wire:model="contact.notes" id="notes" class="w-full px-3 py-2 border rounded-md"></textarea>
        @error('contact.notes') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    
    @if($editing)
        <button wire:click="save" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Save
        </button>
    @else
        <button wire:click="edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Edit
        </button>
    @endif
</div>
