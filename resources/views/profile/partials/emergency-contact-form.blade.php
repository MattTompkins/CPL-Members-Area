<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Emergency Contact') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Provide us with an emergency contact so that we can get in touch if needed.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.emergency-contact.update') }}" enctype="multipart/form-data"
        class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label class="block font-medium text-sm text-gray-700" for="contact_name">
                Contact Name
            </label>
            <input
                class="border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm mt-1 block w-full"
                id="contact_name" name="contact_name" type="text" value="{{ $emergencyContact['name'] ?? '' }}" required="required"
                autofocus="autofocus" required>
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700" for="relation">
                Relation
            </label>
            <input
                class="border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm mt-1 block w-full"
                id="relation" name="relation" type="text" value="{{ $emergencyContact['relation'] ?? '' }}" required="required"
                autofocus="autofocus" required>
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700" for="phone">
                Phone number
            </label>
            <input
                class="border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm mt-1 block w-full"
                id="phone" name="phone" type="text" value="{{ $emergencyContact['phone'] ?? '' }}" required="required"
                autofocus="autofocus" required>
        </div>




        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
