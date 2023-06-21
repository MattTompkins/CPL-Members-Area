<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit event') }} &raquo; {{ $event['event_title'] }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">

                <form method="post" enctype="multipart/form-data"
                    action="{{ route('events.update', ['id' => $event['id']]) }}">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <h2 class="text-base font-semibold leading-7 text-gray-900">{{ __('Edit event') }} -
                                {{ $event['event_title'] }}
                            </h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">
                                {{ __('Fill out the form to edit this event. Some information may be made public to external users.') }}
                            </p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    <label for="event-title"
                                        class="block text-baseline font-medium leading-6 text-gray-900">{{ __('Event                                                                                                                                                                                                                                           title *') }}</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-red-600 sm:max-w-md">
                                            <input value="{{ $event['event_title'] }}" type="text" name="event-title"
                                                id="event-title" required=""
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('event-title')
                                            <p class="mt-2 text-sm text-red-600 font-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-span-full mt-6">
                                    <label for="editor"
                                        class="block text-baseline font-medium leading-6 text-gray-900">Event
                                        description *</label>
                                    <div class="mt-2">
                                        <textarea id="editor" name="description"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-600 sm:text-sm sm:leading-6"></textarea>
                                    </div>
                                    @error('description')
                                        <p class="mt-2 text-sm text-red-600 font-bold">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about the
                                        event, previous years, what to bring, and what to expect at the event.</p>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="cover-photo"
                                        class="block text-baseline font-medium leading-6 text-gray-900 mb-2">{{ __('Event location *') }}</label>
                                    <textarea name="event-location" id="message" rows="4" required=""
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500"
                                        placeholder="Write your thoughts here...">{{ $event['location'] }}</textarea>
                                    @error('event-location')
                                        <p class="mt-2 text-sm text-red-600 font-bold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="start-date"
                                        class="block text-sm font-medium leading-6 text-gray-900">{{ __('Start date *') }}</label>
                                    <div class="mt-2">
                                        <input value="{{ $event['start_date'] }}" type="date" name="start-date"
                                            id="start-date" required=""
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="end-date"
                                        class="block text-sm font-medium leading-6 text-gray-900">{{ __('End date') }}</label>
                                    <div class="mt-2">
                                        <input value="{{ $event['end_date'] }}" type="date" name="end-date"
                                            id="end-date"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-red-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-full mt-6">
                                <label for="cover-photo"
                                    class="block text-baseline font-medium leading-6 text-gray-900">Cover
                                    photo</label>
                                <p class="mt-1 mb-2 text-sm leading-6 text-gray-600">Add a banner cover photo to use
                                    in the listing of this event in the members area and website.</p>
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">

                                        </svg>
                                        <div
                                            class="mt-4 flex items-center justify-center text-sm leading-6 text-gray-600">
                                            <label for="file-upload"
                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-red-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-red-600 focus-within:ring-offset-2 hover:text-red-500">
                                                <span>Upload a file</span>
                                                <input value="{{ $event['banner_image'] }}" id="file-upload"
                                                    name="file-upload" type="file" class="sr-only"
                                                    onchange="previewImage(event)">
                                            </label>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                    <div id="preview-container">
                                        @if ($event['banner_image'])
                                            <img id="preview-image" class="max-h-60 mt-4 mx-auto w-full"
                                                src="{{ $event['banner_image'] }}" alt="Preview">
                                        @else
                                            <img id="preview-image" class="max-h-60 mt-4 mx-auto w-full" src="#"
                                                alt="Preview">
                                        @endif
                                    </div>
                                  
                                </div> @error('file-upload')
                                <p class="mt-2 text-sm text-red-600 font-bold">{{ $message }}</p>
                            @enderror
                            </div>
                        </div>

                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">{{ __('Event settings') }}</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">
                                {{ __('Modify the visibility of the event so that you only recieve signups from the right people.') }}
                            </p>

                            <div class="mt-5 space-y-10">
                                <fieldset>
                                    <div class="space-y-10">
                                        <div class="relative flex gap-x-3">
                                            <div class="flex h-6 items-center">
                                                <label class="flex items-center cursor-pointer">
                                                    <input type="checkbox" name="publish_on_website" value="1"
                                                        class="sr-only peer"
                                                        @if ($event['show_on_website']) checked @endif>
                                                    <div
                                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600">
                                                    </div>
                                                    <div class="flex flex-col">
                                                        <span
                                                            class="ml-3 text-sm font-medium text-gray-900">{{ __('Publish on the website') }}</span>
                                                        <span
                                                            class="ml-3 text-sm text-gray-500">{{ __('Make this event public on the website.') }}</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="relative flex gap-x-3">
                                            <div class="flex h-6 items-center">
                                                <label class="flex items-center cursor-pointer">
                                                    <input type="checkbox" name="members_only" value="1"
                                                        class="sr-only peer"
                                                        @if ($event['members_only']) checked @endif>
                                                    <div
                                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600">
                                                    </div>
                                                    <div class="flex flex-col">
                                                        <span
                                                            class="ml-3 text-sm font-medium text-gray-900">{{ __('Members only') }}</span>
                                                        <span
                                                            class="ml-3 text-sm text-gray-500">{{ __('Only members can sign up for this event. Ideal for internal events.') }}</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                            </div>
                            <div class="mt-6 border-t">
                                <label for="cover-photo"
                                    class="block text-baseline font-medium leading-6 text-gray-900 mt-4">{{ __('Select an event manager') }}</label>
                                <p class="mt-1 mb-2 text-sm leading-6 text-gray-600">
                                    {{ __('Likely the event duty officer, this user will take charge of managing the event. Must be a member of exec role group.') }}
                                </p>

                                <select name="event_manager" id="search-DO"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                                    @foreach ($users as $user)
                                        @if ($user->hasRole('Exec'))
                                            <option value="{{ $user->id }}"
                                                {{ $user->id === $event['managed_by'] ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('events.show', ['id' => $event['id']])}}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit"
                            class="rounded-md bg-red-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote',
                        'mediaEmbed'
                    ],
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            },
                            {
                                model: 'heading3',
                                view: 'h3',
                                title: 'Heading 3',
                                class: 'ck-heading_heading3'
                            },
                            {
                                model: 'heading4',
                                view: 'h4',
                                title: 'Heading 4',
                                class: 'ck-heading_heading4'
                            }
                        ]
                    }
                })
                .then(editor => {
                    editor.setData(`{!! $event->description !!}`);
                    document.querySelector('form').addEventListener('submit', () => {
                        editor.updateSourceElement();
                        editor.destroy();
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
        <script>
            function previewImage(event) {
                const fileInput = event.target;
                const previewImage = document.getElementById('preview-image');
                const previewContainer = document.getElementById('preview-container');

                if (fileInput.files && fileInput.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                    };

                    reader.readAsDataURL(fileInput.files[0]);
                } else if (fileInput.files.length === 0 && '{{ $event->banner_image }}') {

                    previewImage.src = '{{ $event->banner_image }}';
                    previewContainer.classList.remove('hidden');
                } else {
                    previewContainer.classList.add('hidden');
                }
            }
        </script>
    @endpush
</x-app-layout>
