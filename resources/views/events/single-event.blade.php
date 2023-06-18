<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('events.index') }}">Events </a> &raquo; {{ $event['event_title'] }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <img class="max-h-80 w-full object-cover rounded-t-lg" src="{{ $event['banner_image'] }}"
                alt="{{ $event['title'] }}">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-6 text-gray-900">
                    <h1 class="text-4xl font-extrabold my-3">{{ $event['event_title'] }}</h1>

                    <div class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                        </svg>
                        {{ formatDate($event['start_date']) }} @if ($event['end_date'])
                            - {{ formatDate($event['end_date']) }}
                        @endif
                    </div>
                    <div>
                        <div class="mt-6 border-t border-gray-100">
                            <dl class="divide-y divide-gray-100">
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Location') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        {{ $event['location'] }}</dd>
                                </div>
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Description') }}</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        {!! $event['description'] !!}</dd>
                                </div>
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Managed by') }}</dt>
                                    <dd
                                        class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 flex items-center">
                                        <img class="h-11 w-11 flex-none rounded-full bg-gray-50"
                                            src="{{ $event['managed_by_profile_image'] }}" alt="Profile Image">
                                        <span class="ml-3 text-baseline">{{ $event['managed_by'] }}</span>
                                    </dd>
                                </div>


                                <?php  $can_manage_files = Auth::user()->hasPermissionTo('edit event'); ?>
                                <livewire:file-attachment :can_manage_files="$can_manage_files" :attached_to_type="'event'" :attached_to_id="18" />
                            </dl>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
