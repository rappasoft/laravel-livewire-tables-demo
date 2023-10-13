


<div class="py-1" role="none">
    <div class="block px-4 py-4 text-sm text-gray-700 space-y-1" role="menuitem" id="users2-filter-email_verified_at-wrapper">
        <div>
            <div>External Filter Label</div>
                <form>
                    <div wire:key="external-filter-blade" class="rounded-md shadow-sm">
                        <div>
                            <label for="filter_test" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter Test</label>
                            <input wire:model.live="testWireable" type="text" id="filter_test" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">       
                            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@error('filterTest') {{ $message }} @enderror</div>
                        </div>
                        <button wire:click="save">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
