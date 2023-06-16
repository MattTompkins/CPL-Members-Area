@if (session()->has('toast'))
    <div id="toast-success"
        class="fixed bottom-4 bg-slate-800 right-4 z-50 flex items-center w-full max-w-xs p-4 mb-4 text-white rounded-lg shadow-lg toast"
        role="alert">

        @if (session('toast.type') == 'success')
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
        @elseif (session('toast.type') == 'warning')
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-black bg-yellow-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>

                <span class="sr-only">Exclamation icon</span>
            </div>
        @elseif (session('toast.type') == 'error')
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-900 bg-red-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>                  
                <span class="sr-only">Cross icon</span>
            </div>
        @elseif (session('toast.type') == 'info')
        <div
        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-800 bg-blue-200 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
          </svg>                    
        <span class="sr-only">Info icon</span>
    </div>
        @endif

        <div class="ml-3 text-sm font-normal">{{ session('toast.message') }}</div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all toast elements using a common class
            var toastElements = document.querySelectorAll('.toast');

            // Function to hide a toast
            function hideToast(toast) {
                toast.classList.add('hidden');
            }

            // Delay the hiding of each toast after 5 seconds
            toastElements.forEach(function(toast) {
                setTimeout(function() {
                    hideToast(toast);
                }, 6000);
            });
        });
    </script>
@endif
