<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upcoming events') }}
        </h2>
    </x-slot>

    <?php $events = [1,2,3]; ?>
    <div class="py-12">

        @foreach($events as $event)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                <a href="#">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex  hover:bg-gray-100 dark:hover:bg-gray-700 ">
                        <img class="hidden sm:block object-cover w-full rounded-t-lg h-96 xl:md:h-auto md:w-80 sm:h-60 md:h-80 md:rounded-none md:rounded-l-lg" src="https://upload.wikimedia.org/wikipedia/commons/f/fe/Colwick_Park_Lake_-_geograph.org.uk_-_82556.jpg" alt="">
                        <div class="flex flex-col p-9 leading-normallex justify-center">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white ">Noteworthy technology acquisitions 2021</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
              
    </div>

    
</x-app-layout>
