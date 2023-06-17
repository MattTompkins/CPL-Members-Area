<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3 mx-auto flex justify-center md:justify-end">
        <div class="inline-flex rounded-md shadow-sm" role="group">
            <a href="{{ route('contacts.index') }}"
                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-red-700 sm:ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                {{ __('Back to contacts') }}
            </a>
            @if (auth()->user()->can('edit contacts'))
                <button wire:click="toggleEditMode"
                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-red-700 sm:ml-auto">
                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                    @if ($editing)
                    {{ __('Stop editing') }}
                    @else  
                    {{ __('Edit contact') }}
                    @endif
                  
                </button>
            @endif
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
            <div>
                <div class="mb-4 border-b pb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="name">
                        Name
                    </label>
                    @if ($editing)
                        <input wire:model="contact.name" type="text" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                    @else
                        <p>{{ $contact->name }}</p>
                    @endif
                    @error('contact.name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 border-b pb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="organisation">
                        Organisation
                    </label>
                    @if ($editing)
                        <input wire:model="contact.organisation" type="text" id="organisation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                    @else
                        <p>{{ $contact->organisation }}</p>
                    @endif
                    @error('contact.organisation')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 border-b pb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="email">
                        Email
                    </label>
                    @if ($editing)
                        <input wire:model="contact.email" type="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                    @else
                        <p>{{ $contact->email }}</p>
                    @endif
                    @error('contact.email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 border-b pb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="phone1">
                        Phone 1
                    </label>
                    @if ($editing)
                        <input wire:model="contact.phone1" type="text" id="phone1"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                    @else
                        <p>{{ $contact->phone1 }}</p>
                    @endif
                    @error('contact.phone1')
                        <span class="text-red-500">{{ $phone1 }}</span>
                    @enderror
                </div>

                <div class="mb-4 border-b pb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="phone2">
                        Phone 2
                    </label>
                    @if ($editing)
                        <input wire:model="contact.phone2" type="text" id="phone2"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                    @else
                        <p>{{ $contact->phone2 }}</p>
                    @endif
                    @error('contact.phone2')
                        <span class="text-red-500">{{ $phone2 }}</span>
                    @enderror
                </div>

                <div class="mb-4 border-b pb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="notes">
                        Notes
                    </label>
                    @if ($editing)
                        <textarea wire:model="contact.notes" id="notes"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                    </textarea>
                    @else
                        <p>{{ $contact->notes }}</p>
                    @endif
                    @error('contact.notes')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                @if ($editing)
                    <button wire:click="save"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                         {{ __('Save') }}
                    </button>
               @endif
            </div>
        </div>
    </div>
</div>
