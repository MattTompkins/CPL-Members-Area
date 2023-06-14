<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create member account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('members.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mb-6">
                            <div class="sm:col-span-3">
                                <label for="first-name"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">{{ __('First name') }}</label>
                                <div class="mt-2">
                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        value="{{ old('first-name') }}" required="">
                                </div>
                                @error('first-name')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-3">
                                <label for="surname"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">{{ __('Surname') }}</label>
                                <div class="mt-2">
                                    <input type="text" name="surname" id="surname" autocomplete="family-name"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        value="{{ old('surname') }}" required="">
                                </div>
                            </div>
                            @error('surname')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 ">{{ __('Email') }}</label>
                            <input type="email" id="email" name="email"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="name@thelifeguards.org.uk" value="{{ old('email') }}" required="">
                            @error('email')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('Password') }}</label>
                            <input type="password" id="password" minlength="6" name="password"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required="">
                            @error('password')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="repeat-password"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('Repeat password') }}
                            </label>
                            <input type="password" id="repeat-password" minlength="6" name="repeat-password"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required="">
                            @error('repeat-password')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="flex flex-col flex-wrap">
                            <label class="block mb-4 text-sm font-medium text-gray-900">{{ __('User groups') }}
                            </label>

                            @foreach ($roles as $role)
                                <label class="relative inline-flex items-center cursor-pointer mb-5">
                                    <input type="checkbox" name="roles[]" value="{{ $role['id'] }}"
                                        class="sr-only peer">
                                    <div
                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                                    peer-checked:bg-red-700">
                                    </div>
                                    <span
                                        class="ml-3 text-sm font-medium text-gray-700">{{ ucfirst(str_replace('_', ' ', $role['name'])) }}</span>
                                </label>
                            @endforeach
                        </div>


                        <div class="flex items-start mb-6 mt-6">

                            <button type="submit"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                {{ __('Register new user') }}</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
</x-app-layout>
