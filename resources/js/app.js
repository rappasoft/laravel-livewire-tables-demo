require('./bootstrap');
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import '@nextapps-be/livewire-sortablejs';
window.Alpine = Alpine;
window.Alpine.plugin(focus);
window.Alpine.start();
