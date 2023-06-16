<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Profile Image') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Upload a new profile image.') }}
        </p>
    </header>
    
    <form method="post" action="{{ route('profile.image.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="relative mt-8 flex items-center gap-x-4">
            <img id="preview_image" src="{{ $user->profile_image }}" class="h-20 w-20 rounded-full bg-gray-50">
            <div class="text-sm leading-6">
                <x-input-label for="photo" :value="__('Profile Image')" />
                <input id="file_input" type="file" name="photo" accept="image/*" class="hidden">
                <label for="file_input" class="block w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none h-10">
                    Browse...
                </label>
                <x-input-error :messages="$errors->updateProfileImage->get('photo')" class="mt-2" />
            </div>
        </div>
        @push('scripts')
        <script>
            document.getElementById('file_input').addEventListener('change', function(event) {
                var input = event.target;
                var reader = new FileReader();
        
                reader.onload = function() {
                    var previewImage = document.getElementById('preview_image');
                    previewImage.src = reader.result;
                }
        
                reader.readAsDataURL(input.files[0]);
            });
        </script>
        @endpush


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Upload') }}</x-primary-button>

            @if (session('status') === 'image-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Image uploaded successfully.') }}</p>
            @endif
        </div>
    </form>
</section>
