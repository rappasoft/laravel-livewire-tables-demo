@aware(['component'])
@props(['filter','theme'])
@php
    $theme = $component->getTheme();
@endphp
<label for="{{ $component->getTableName() }}-filter-{{ $filter->getKey() }}" 
    @class([
        'block text-sm font-large leading-5 text-red-700 dark:text-red-700' => $theme === 'tailwind',
        'd-block' => $theme === 'bootstrap-4' && $component->isFilterLayoutSlideDown(),
        'mb-2' => $theme === 'bootstrap-4' && $component->isFilterLayoutPopover(),
        'd-block display-4' => $theme === 'bootstrap-5' && $component->isFilterLayoutSlideDown(),
        'mb-2 display-4' => $theme === 'bootstrap-5' && $component->isFilterLayoutPopover(),
    ])
>
    {{ $filter->getName() }}
</label>
