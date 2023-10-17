# Laravel Livewire Tables Demo

The repo is using a SQLite database, and has ready examples for Bootstrap 4 & 5, and Tailwind 2 & 3 for the [Laravel Livewire Tables](https://github.com/rappasoft/laravel-livewire-tables) plugin.

Installation:

// Set up your environment
- cp .env.example .env

// Set up a unique key
- php artisan key:generate

// Setup the link for the Avatars to display for the ImageColumn
- php artisan storage:link

// Create the database tables
- php artisan migrate

// Seed the tables with realistic (but fake) data
- php artisan db:seed
