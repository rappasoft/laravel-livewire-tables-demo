<div>
    Search Method
    <select wire:model.live="searchMethodOption">
        @foreach ($searchMethodOptions as $searchMethodVal => $searchMethodName)
            <option value='{{ $searchMethodVal }}'>{{ $searchMethodName }}</option>
        @endforeach
    </select>
</div>
