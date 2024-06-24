<?php

namespace App\Providers; // Define the namespace for the provider

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider; // Import the base EventServiceProvider class

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \App\Events\ExampleEvent::class => [
            \App\Listeners\ExampleListener::class,
        ],
    ];
    
    public function shouldDiscoverEvents()
    {
        return false; // Disable automatic event discovery
    }
}
