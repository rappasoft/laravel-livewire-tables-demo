import './bootstrap';

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import Clipboard from '@ryangjchandler/alpine-clipboard'
import focus from '@alpinejs/focus';
import flatpickr from "flatpickr";

//import '../../vendor/rappasoft/laravel-livewire-tables-v3/resources/js/test'
Alpine.plugin(Clipboard)
Alpine.plugin(focus)
Livewire.start()
