<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }} &raquo; {{ $contact['name'] }}
        </h2>
    </x-slot>

    <div class="py-12">
      <livewire:contact-component :contact="$contact" />
    </div>

</x-app-layout>
