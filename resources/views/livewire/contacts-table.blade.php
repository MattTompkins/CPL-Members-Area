<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
    <div class="flex items-center justify-between p-4">
        <label for="table-search" class="sr-only">{{ __('Search') }}</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" wire:model.debounce.300ms="search"
                class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                placeholder="{{ __('Search contacts') }}">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase border-b-2">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('Name') }}
                </th>
                <th scope="col" class="hidden md:table-cell px-6 py-3">
                    {{ __('Details') }}
                </th>
                <th scope="col" class="hidden md:table-cell px-6 py-3">
                    {{ __('Actions') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="flex flex-col px-6 py-4 text-gray-900 whitespace-nowrap">
                        <div class="text-base font-semibold">{{ $contact['name'] }}</div>
                        <div class="font-normal text-gray-500">{{ $contact['organisation'] }}</div>
                    </th>
                    <td class="hidden md:table-cell">
                        <div class="text-base font-semibold"><a
                                href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a></div>
                        <div class="font-normal text-gray-500"><a
                                href="callto:{{ $contact['phone1'] }}">{{ $contact['phone1'] }}</a></div>
                        <div class="font-normal text-gray-500"><a
                                href="callto:{{ $contact['phone2'] }}">{{ $contact['phone2'] }}</a></div>
                    </td>
                    <td class="px-6 py-4">

                        <button id="userDropdown{{ $contact['id'] }}"
                            data-dropdown-toggle="dropdown{{ $contact['id'] }}"
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
                        <div id="dropdown{{ $contact['id'] }}"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="userDropdown{{ $contact['id'] }}">
                                <li>
                                    <a href="{{ route('member.profile', ['id' => $contact['id']]) }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-200">{{ __('Edit contact') }}</a>
                                </li>
                                @if (auth()->user()->can('delete contacts'))
                                    <li>
                                        <a href="javascript:void(0)"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-200"
                                        wire:click.prevent="deleteConfirmation({{ $contact['id'] }})">{{ __('Delete contact') }}</a>
                                    </li>
                                @endif
                                @if (auth()->user()->can('edit contacts'))
                                    <li>
                                        <a href="{{ route('members.edit', ['id' => $contact['id']]) }}"
                                            class="block px-4 py-2 text-gray-800 hover:bg-gray-200">{{ __('More details') }}</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>



    <div class="px-4 py-3">
        {{ $contacts->links() }}
    </div>
</div>
