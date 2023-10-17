@aware(['component'])
@props(['filter'])
@php
    $theme = $component->getTheme();
@endphp
@if($theme == 'tailwind')
<span
                            wire:key="{{ $component->getTableName() }}-filter-pill-{{ $filter->getKey() }}"
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-indigo-100 text-indigo-800 capitalize dark:bg-indigo-200 dark:text-indigo-900"
                        >
                            CustomPills2: {{ $filter->getFilterPillTitle() }} - ({{ $filter->getFilterPillValue($value) }})

                            <button
                                wire:click="resetFilter('{{ $filter->getKey() }}')"
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
                        wire:key="{{ $component->getTableName() }}-filter-pill-{{ $filter->getKey() }}"
                        class="badge badge-pill badge-info d-inline-flex align-items-center"
                    >
                        CustomPills: {{ $filter->getFilterPillTitle() }}: {{ $filter->getFilterPillValue($value) }}

                        <a
                            href="#"
                            wire:click="resetFilter('{{ $filter->getKey() }}')"
                            class="text-white ml-2"
                        >
                            <span class="sr-only">@lang('Remove filter option')</span>
                            <svg style="width:.5em;height:.5em" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                            </svg>
                        </a>
                    </span>
@endif
