<div class="p-5 my-3 bg-white rounded-xl shadow-lg">
    <div class="">
        <div>
            <div class="flex justify-between items-center ww-100">
                <div class="">
                    <div>
                      
                        <svg class="w-8 h-8 text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-calendar-range">
                            <rect width="18" height="18" x="3" y="4" rx="2" />
                            <path d="M16 2v4" />
                            <path d="M3 10h18" />
                            <path d="M8 2v4" />
                            <path d="M17 14h-6" />
                            <path d="M13 18H7" />
                            <path d="M7 14h.01" />
                            <path d="M17 18h.01" />
                        </svg>

                    </div>
                    <p class="text-base font-medium text-black"> LE TAUX DES  ALERTES  </p>
                </div>

                <div class="relative ">
                    <svg class="w-16 h-16 " viewBox="0 0 36 36">
                        <path class="text-gray-200" stroke="currentColor" stroke-width="4.0" fill="none" d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831" />
                        <path class="text-black" stroke="currentColor" stroke-width="4.0"
                            stroke-dasharray="{{ $progressPercentage }}, 100" fill="none" d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831" />
                    </svg>
                    <span class="absolute inset-0 flex items-center justify-center w-16 h-16 text-base font-semibold">{{
                        $progressPercentage }}%</span>
                </div>

            </div>

            <p class="mt-1 text-3xl font-extrabold text-gray-800">{{ $readyToAssign }} - {{ $assigned }}</p>
            <p class="mt-1 text-sm font-medium text-gray-500">Bills in this week: {{ $totalBills }}</p>
        </div>

    </div>
</div>