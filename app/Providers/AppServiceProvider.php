<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('home', function($view){
            $lastTask = [
                'title' => 'Titlu implicit',
                'description' => 'Descriere implicita',
                'created' => now()->toDateString(),
                'updated' => now()->toDateString(),
                'task' => 'Edit/Delete',
                'status' => 'Nu este finalizată',
                'priority' => 'ridicata',
                'assigned' => 'Emilia'
            ];
            $view->with('lastTask', $lastTask);
        });
    }
}
