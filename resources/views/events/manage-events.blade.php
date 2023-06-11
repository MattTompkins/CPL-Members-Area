<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage events') }}
        </h2>
    </x-slot>

    <?php $events = [1,2,3]; ?>
    <div class="py-12">
        <livewire:events-manage-table>
    </div>
           
</x-app-layout>
