<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Account settings') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Change your account settings to customize your experience and privacy options.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.account-settings.update') }}" enctype="multipart/form-data"
        class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label class="relative inline-flex items-center mb-5 cursor-pointer">
                <input type="checkbox" name="show_profile" class="sr-only peer"  @if($accountSettings['show_profile']) checked @endif>
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-700">{{ __('Show profile to all users') }}</span>
            </label>
        </div>

        <div>
            <label class="relative inline-flex items-center mb-5 cursor-pointer">
                <input type="checkbox" name="show_contact_info" class="sr-only peer" @if($accountSettings['show_contact_info']) checked @endif>
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-700">{{ __('Show contact info to all users') }}</span>
            </label>
        </div>

        <div>
            <label class="relative inline-flex items-center mb-5 cursor-pointer">
                <input type="checkbox" name="show_qualifications" class="sr-only peer" @if($accountSettings['show_qualifications']) checked @endif>
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-700">{{ __('Show qualifications on my profile') }}</span>
            </label>
        </div>

        <div>
            <label class="relative inline-flex items-center mb-5 cursor-pointer">
                <input type="checkbox" name="show_my_events" class="sr-only peer" @if($accountSettings['show_my_events']) checked @endif>
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-700">{{ __('Show other users events I am signed up to') }}</span>
            </label>
        </div>

        <div>
            <label class="relative inline-flex items-center mb-5 cursor-pointer">
                <input type="checkbox" name="show_my_training" class="sr-only peer" @if($accountSettings['show_my_training']) checked @endif>
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-700">{{ __('Show other users training I am signed up to') }}</span>
            </label>
        </div>

        <div>
            <label class="relative inline-flex items-center mb-5 cursor-pointer">
                <input type="checkbox" name="receive_emails" class="sr-only peer" @if($accountSettings['receive_emails']) checked @endif>
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-700">{{ __('Receive email alerts') }}</span>
            </label>
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
