<div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
    <dt class="text-sm font-medium leading-6 text-gray-900">Attachments</dt>
    <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
        <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
            @foreach($attachments as $index => $attachment)
                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                    <div class="flex w-0 flex-1 items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                        </svg>
                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                            <span class="truncate font-medium">{{ $attachment['name'] }}</span>
                        </div>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                        <a href="{{ $attachment['file_path'] }}" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                        @if ($can_manage_files)
                         <button type="button" class="font-medium text-red-600 hover:text-red-500 ml-1" wire:click.prevent="deleteConfirmation({{$attachment['id']}})">Delete</button>
                        @endif
                    </div>
                </li>
            @endforeach
            @if ($can_manage_files)
                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                    <div class="flex w-0 flex-1 items-center">
                        <div class="flex min-w-0 flex-1 gap-2">
                            <form class="w-full grid gap-4 sm:grid-cols-2" wire:submit.prevent="uploadFile">
                                <input wire:model="file_title" type="text" name="file_title" placeholder="File title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-700 focus:border-red-700" required="">
                                <div class="col-span-2 sm:col-span-1" wire:ignore>
                                    <input id="file_input" type="file" wire:model="file" name="file" class="hidden">
                                    <label for="file_input" class="block w-full px-4 py-2 text-sm text-red-700 font-medium border border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none h-10">
                                        <span id="file_label">{{ __('Browse attachment...') }}</span>
                                    </label>
                                </div>
                                <div class="col-span-3 sm:col-span-2">
                                    <button type="submit" class="w-full px-4 py-2 text-white bg-red-700 rounded-lg hover:bg-red-500" wire:loading.attr="disabled" wire:target="uploadFile">{{ __('Upload') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </li>
            @endif
        </ul>
    </dd>
</div>

@push('scripts')
    <script>
        // JavaScript code to update the selected file name in the label
        const fileInput = document.getElementById('file_input');
        const fileLabel = document.getElementById('file_label');

        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                fileLabel.textContent = file.name;
            } else {
                fileLabel.textContent = '{{ __('Browse attachment...') }}';
            }
        });

        // Livewire hook to update the file input value after Livewire update
        document.addEventListener("livewire:load", function() {
            Livewire.hook('element.updated', (el, component) => {
                if (el.id === 'file_input') {
                    const file = el.files[0];
                    if (file) {
                        fileLabel.textContent = file.name;
                    }
                }
            });
        });
    </script>
@endpush
