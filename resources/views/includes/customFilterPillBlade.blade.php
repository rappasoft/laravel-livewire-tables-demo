{{-- v3 custom filter pill blade. Included from the package's filter-pills view with
     ['filter' => Filter, 'filterPillData' => FilterPillData]; the parent scope also
     provides $filterKey, $tableName, $isTailwind, $isBootstrap4, $isBootstrap5. --}}
@if($isTailwind)
    <span wire:key="{{ $tableName }}-filter-pill-{{ $filterKey }}"
        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-indigo-100 text-indigo-800 capitalize dark:bg-indigo-200 dark:text-indigo-900"
    >
        CustomPillBlade - {{ $filterPillData->getTitle() }} - ({{ $filterPillData->getSeparatedPillValue() }})

        <button
            wire:click="resetFilter('{{ $filterKey }}')"
            type="button"
            class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-indigo-400 hover:bg-indigo-200 hover:text-indigo-500 focus:outline-none focus:bg-indigo-500 focus:text-white"
        >
            <span class="sr-only">@lang('Remove filter option')</span>
            <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
            </svg>
        </button>
    </span>
@else
<span
    wire:key="{{ $tableName }}-filter-pill-{{ $filterKey }}"
    class="badge badge-pill badge-info d-inline-flex align-items-center"
>
    CustomPillBlade - {{ $filterPillData->getTitle() }}: {{ $filterPillData->getSeparatedPillValue() }}

    <a
        href="#"
        wire:click="resetFilter('{{ $filterKey }}')"
        class="text-white ml-2"
    >
        <span class="sr-only">@lang('Remove filter option')</span>
        <svg style="width:.5em;height:.5em" stroke="currentColor" fill="none" viewBox="0 0 8 8">
            <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
        </svg>
    </a>
</span>
@endif
