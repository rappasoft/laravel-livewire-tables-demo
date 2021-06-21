<?php

use Illuminate\Support\Str;

function getLiveWireTableTheme(): string
{
    /**
     * need to check if config being checked by request of composer
     * when checked by composer request function doesn't exist
     **/
    $isRequest = collect(debug_backtrace())
        ->map(function ($step) {
            return $step['file'];
        })
        ->contains(function ($filePath) {
            return Str::of($filePath)->contains('/public/index.php');
        });

    if ($isRequest) {
        if (in_array(request()->path(), [
            'tailwind',
            'bootstrap-4',
            'bootstrap-5'
        ])) {
            return request()->path();
        }

        if (Str::of(request()->path())->contains('livewire/message/')) {
            return request()->request->get('fingerprint')['path'];
        }
    }

    return 'bootstrap-4';
}
