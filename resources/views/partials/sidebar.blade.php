<div class="mt-2">
    <div class="flex m-2 justify-end">
        <div class="shadow-lg w-12 flex items-center p-3 border rounded-lg mb-2">
            <div class="" data-icon="">

                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-minus">
                    <path d="M5 12h14" />
                </svg>

            </div>
        </div>

        <div class="shadow-lg w-12 flex items-center p-3 border rounded-lg mb-2">
            <div class="" data-icon="">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-plus">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>


            </div>
        </div>

        <div class="shadow-lg w-12 flex items-center p-3 border rounded-lg mb-2">
            <div class="" data-icon="">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-scan">
                    <path d="M3 7V5a2 2 0 0 1 2-2h2" />
                    <path d="M17 3h2a2 2 0 0 1 2 2v2" />
                    <path d="M21 17v2a2 2 0 0 1-2 2h-2" />
                    <path d="M7 21H5a2 2 0 0 1-2-2v-2" />
                </svg>
            </div>
        </div>

    </div>
    <div class="shadow-lg w-72  items-center  border rounded-lg">
        <nav class="relative z-0 flex  overflow-hidden dark:border-neutral-700" aria-label="Tabs" role="tablist">
            <button type="button"
                class="hs-tab-active:border-b-black hs-tab-active:text-gray-900 dark:hs-tab-active:text-white relative dark:hs-tab-active:border-b-blue-600 min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-3 px-0 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-l-neutral-700 dark:border-b-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-400 active"
                id="bar-with-underline-item-1" data-hs-tab="#bar-with-underline-1" aria-controls="bar-with-underline-1"
                role="tab">
                Les prestataires
            </button>
            <button type="button"
                class="hs-tab-active:border-b-black hs-tab-active:text-gray-900 dark:hs-tab-active:text-white relative dark:hs-tab-active:border-b-blue-600 min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-3 px-0 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-l-neutral-700 dark:border-b-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-400"
                id="bar-with-underline-item-2" data-hs-tab="#bar-with-underline-2" aria-controls="bar-with-underline-2"
                role="tab">
                Les groupes
            </button>
        </nav>
        <div class="mt-3">
            <div id="bar-with-underline-1" role="tabpanel" aria-labelledby="bar-with-underline-item-1">
                <p class="text-gray-500 dark:text-neutral-400">
                    <div class="p-3 h-[800px] overflow-y-auto no-scrollbar">
                        @forelse($providers as $item)
                            @livewire('provider-widget', [
                                'title' => $item->name,
                                'rating' => 4.6,
                                'note' => 70,
                                'seniority' => $item->created_at->diffForHumans(),
                            ])
                        @empty
                            <p class="text-center block mt-1 text-sm text-neutral-400 leading-none font-light">Aucun fournisseur trouvé.</p>
                        @endforelse
                    </div>
                </p>
            </div>
            <div id="bar-with-underline-2" class="hidden " role="tabpanel" aria-labelledby="bar-with-underline-item-2">
                <p class="text-gray-500 dark:text-neutral-400">
               
                <div class="p-3 h-[800px] overflow-y-auto no-scrollbar">
                    @forelse($groupes as $item)
                        @livewire('provider-widget', [
                            'title' => $item->name,
                            'rating' => 4.6,
                            'note' => 70,
                            'seniority' => $item->created_at->diffForHumans(),
                        ])
                    @empty
                        <p class="text-center block mt-1 text-sm text-neutral-400 leading-none font-light">Aucun groupe trouvé.</p>
                    @endforelse
                </div>
                </p>
            </div>
        </div>
    </div>
</div>