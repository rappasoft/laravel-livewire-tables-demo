<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Global Settings Demo
         * 
         * This demonstrates how to set default configuration for ALL tables
         * in your application using the new configureUsing() method.
         * 
         * Any settings here will be applied to all DataTableComponent instances
         * unless overridden in the individual table's configure() method.
         */
        DataTableComponent::configureUsing(function (DataTableComponent $component) {
            // Set default pagination options for all tables
            $component->setPerPageAccepted([10, 25, 50, 100]);
            
            // Enable loading placeholder by default
            $component->setLoadingPlaceholderEnabled();
            
            // You can add more global defaults here:
            // $component->setDefaultSort('created_at', 'desc');
            // $component->setSearchDebounce(500);
            // $component->setColumnSelectDisabled();
        });
    }
}
