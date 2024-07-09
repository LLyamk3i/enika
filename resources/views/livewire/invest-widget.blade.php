<div class="p-5 bg-white rounded-xl shadow-xl ">
    <div class="flex">
        <div class="block py-3">
            <svg class="h-4 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-grip-vertical">
                <circle cx="9" cy="12" r="1" />
                <circle cx="9" cy="5" r="1" />
                <circle cx="9" cy="19" r="1" />
                <circle cx="15" cy="12" r="1" />
                <circle cx="15" cy="5" r="1" />
                <circle cx="15" cy="19" r="1" />
            </svg>
        </div>
        <div>
            <div class="flex items-center justify-between">
                <div>

                    <div class="text-base font-medium text-gray-800 flex items-center ">

                        <div class="ml-1 text-wrap">{{$title}}</div>
                    </div>
                    <p class="mt-2  text-3xl font-extrabold text-gray-800">{{ $amount }}</p>
                </div>
                <div>
                    <img src="{{ $progressImageUrl }}" alt="Progress" class="h-20 w-[150px] ml-3">
                </div>

            </div>
            <div class="flex items-center pt-1">
                <p class="mt-1 text-sm font-semibold text-black ">{{ $percentageChange }}%</p>
                <p class="text-sm font-medium text-gray-500 ml-1">volumn: {{ $volume }} </p>
            </div>
        </div>
    </div>
</div>