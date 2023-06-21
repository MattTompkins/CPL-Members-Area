<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-3">
        <div class="flex items-center justify-between pb-4">
            <div class="p-3">
                <!-- Dropdown button code -->
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <!-- Search input code -->
            </div>
        </div>

        <table class="w-full text-sm text-left text-gray-500">
            <tbody>
                @foreach ($events as $event)
                    <tr class="bg-white border-t hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-large text-gray-900 whitespace-nowrap">
                            <a href="{{ route('events.show', $event->id) }}" class="flex gap-x-1">
                                {{ $event['event_title'] }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                            </a>
                            <div class="mt-1 flex items-center gap-x-1.5">
                                <div class="flex-none rounded-full bg-emerald-500/20 p-1">
                                    <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
                                </div>
                                <p class="text-xs leading-5 text-gray-500">
                                    {{ formatDate($event['start_date']) }}
                                    @if ($event['end_date'])
                                        - {{ formatDate($event['end_date']) }}
                                    @endif
                                </p>
                            </div>
                        </th>

                        <td class="hidden md:table-cell px-6 py-4 sm:flex-col sm:items-end">
                            <p class="leading-6 text-gray-900">7 signups</p>
                            <p class="text-xs leading-5 text-gray-500">8 outstanding tasks</p>
                        </td>
                        <td class="px-6 py-4">
                            <button id="userDropdown{{ $event['id'] }}"
                                data-dropdown-toggle="dropdown{{ $event['id'] }}"
                                class="text-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 p-1 border-b-2 border-red-700 font-bold text-sm text-center inline-flex items-center"
                                type="button">{{ __('Actions') }}
                                <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdown{{ $event['id'] }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="userDropdown{{ $event['id'] }}">
                                    <li>
                                        <a href="{{ route('events.show', ['id' => $event['id']]) }}"
                                            class="block px-4 py-2 text-gray-800 hover:bg-gray-200">{{ __('View event') }}</a>
                                    </li>
                                    @if (auth()->user()->can('delete event'))
                                        <li>
                                            <a href="javascript:void(0)"
                                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200"
                                                wire:click.prevent='deleteConfirmation({{ $event['id'] }})'>{{ __('Delete event') }}</a>
                                        </li>
                                    @endif
                                    @if (auth()->user()->can('edit event'))
                                        <li>
                                            <a href="{{ route('events.edit', ['id' => $event['id']]) }}"
                                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200">{{ __('Edit event') }}</a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-2 mx-3">
            {{ $events->links() }}
        </div>
    </div>
</div>
