/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')



module.exports = {
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/line-clamp')
    ],
    mode: 'jit',
    darkMode: 'class',
    purge: {
        content: [
            './vendor/laravel/jetstream/**/*.blade.php',
            './vendor/rappasoft/laravel-livewire-tables/resources/views/tailwind/**/*.blade.php',
            './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
            './storage/framework/views/*.php',
            './resources/views/**/*.blade.php',
            './app/Http/Livewire/UsersTable.php',
        ],
        safelist: [
            'w-80',
            'md:w-80',
            'row-start-1',
            'row-start-2',
            'row-start-3',
            'row-start-4',
            'sm:col-span-1',
            'sm:col-span-2',
            'md:col-span-1',
            'md:col-span-2',
            'md:col-span-3',
            'lg:col-span-1',
            'lg:col-span-2',
            'lg:col-span-3',
            'lg:col-span-4',
            'col-span-1',
            'col-span-2',
            'col-span-3',
            'col-span-4',

        ],
    },


    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            backgroundColor: ['responsive', 'dark', 'checked', 'disabled', 'hover', 'focus', 'active', 'even', 'odd'],
            textColor: ['disabled'],
            opacity: ['dark'],
            overflow: ['hover'],
        }
    }
};
