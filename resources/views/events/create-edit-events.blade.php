<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if(Route::is('events.create') )
                {{ __('Create event') }}
            @else
            {{ __('Edit event') }}
            @endif
        </h2>          
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="p-6 text-gray-900 dark:text-gray-100 p-5">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
           
</x-app-layout>
