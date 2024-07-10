<div class="p-1 bg-white rounded-xl">
    <div>
        <div class="flex justify-between items-center w-100">
            <div class="flex relative flex-1" data-headlessui-state="">
                <div class="flex-1 flex items-center focus:outline-none rounded-b-3xl "><button
                        class="relative z-10 flex-1 flex text-left items-center p-3 space-x-3 focus:outline-none" type="button"
                        aria-expanded="false" data-headlessui-state="" id="headlessui-popover-button-:rv:">
                        <div class="text-neutral-300 dark:text-neutral-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                class="w-5 h-5 lg:w-7 lg:h-7">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z">
                                </path>
                            </svg></div>
                        <div class="flex-grow"><span class="block xl:text-md font-semibold">{{ $title }}</span><span
                                class="block mt-1 text-sm text-neutral-400 leading-none font-light">Actif depuis : {{$seniority}} </span></div>
                    </button></div>
            </div>
            <div class="relative">
                <svg class="w-8 h-8" viewBox="0 0 36 36">
                    <path class="text-gray-200" stroke="currentColor" stroke-width="4.0" fill="none" d="M18 2.0845
                    a 15.9155 15.9155 0 0 1 0 31.831
                    a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <path class="text-black" stroke="currentColor" stroke-width="4.0"
                        stroke-dasharray="{{ $note }}, 100" fill="none" d="M18 2.0845
                    a 15.9155 15.9155 0 0 1 0 31.831
                    a 15.9155 15.9155 0 0 1 0 -31.831" />
                </svg>
                <span class="absolute inset-0 flex items-center justify-center w-8 h-8 text-xs font-bold">{{ $rating }}</span>
            </div>
        </div>
    </div>

    
</div>