<div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
    <div class="flex items-center justify-between p-4">
        <div>
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 hidden md:inline-flex">
                <span class="sr-only">Action button</span>
                Role
                <svg class="w-3 h-3 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownActionButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Reward</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Promote</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Activate account</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete User</a>
                </div>
            </div>
        </div>
        <label for="table-search" class="sr-only">Search</label>
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
                placeholder="Search for users">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase border-b-2">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('Name') }}
                </th>
                <th scope="col" class="hidden md:table-cell px-6 py-3">
                    {{ __('Roles') }}
                </th>
                <th scope="col" class="hidden md:table-cell px-6 py-3">
                    {{ __('Membership') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Action') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                        <img class="w-10 h-10 rounded-full" src="{{ $user['profile_image'] }}" alt="{{ $user['name'] }}">
                        <div class="pl-3">
                            <div class="text-base font-semibold">{{ $user['name'] }}</div>
                            <div class="font-normal text-gray-500">{{ $user['email'] }}</div>
                        </div>
                    </th>
                    <td class="hidden md:table-cell px-6 py-4">
                        {{ $user['name'] }}
                    </td>
                    <td class="hidden md:table-cell px-6 py-4">
                        <div class="flex items-center">
                            @if ($user['in_membership'])
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> {{ __('Active') }}
                            @else
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> {{ __('Expired') }}
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <button id="userDropdown{{ $user['id'] }}" data-dropdown-toggle="dropdown{{ $user['id'] }}"
                            class="text-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 p-1 border-b-2 border-red-700 font-bold text-sm text-center inline-flex items-center"
                            type="button">{{ __('Actions') }}
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown{{ $user['id'] }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="userDropdown{{ $user['id'] }}">
                                <li>
                                    <a href="{{ route('member.profile', ['id' => $user['id']]) }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-200">{{ __('User profile') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('members.edit', ['id' => $user['id']]) }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-200">{{ __('Edit user') }}</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    

    <div class="px-4 py-3">
        {{ $users->links() }}
    </div>
</div>
