<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3 mx-auto flex justify-center md:justify-end">
                <div class="inline-flex rounded-md shadow-sm" role="group">
                    <a href="{{ route('contacts.index') }}"
                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-red-700 sm:ml-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                        {{ __('Back to contacts') }}
                    </a>
                </div>
            </div>
        
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                    <form action="{{ route('contacts.create') }}" method="post">
                        @csrf
                        <div class="mb-4 border-b pb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="name">
                                Name *
                            </label>
                            <input name="name" type="text" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required="">
                            @error('contact.name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="mb-4 border-b pb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="organisation">
                                Organisation
                            </label>
                            <input name="organisation" type="text" id="organisation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                            @error('contact.organisation')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="mb-4 border-b pb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="email">
                                Email
                            </label>
                            <input name="email" type="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                            @error('contact.email')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="mb-4 border-b pb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="phone1">
                                Phone 1
                            </label>
                            <input name="phone1" type="text" id="phone1"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                            @error('contact.phone1')
                                <span class="text-red-500">{{ $phone1 }}</span>
                            @enderror
                        </div>
        
                        <div class="mb-4 border-b pb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="phone2">
                                Phone 2
                            </label>
                            <input name="phone2" type="text" id="phone2"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                            @error('contact.phone2')
                                <span class="text-red-500">{{ $phone2 }}</span>
                            @enderror
                        </div>
        
                        <div class="mb-4 border-b pb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="notes">
                                Notes
                            </label>
                            <textarea name="notes" id="notes"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                            </textarea>
                            @error('contact.notes')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <button
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            {{ __('Create') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
