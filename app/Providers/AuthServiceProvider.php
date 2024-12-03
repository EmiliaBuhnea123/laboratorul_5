<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Task;
use App\Policies\TaskPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Task::class => TaskPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('view-all-profiles', function ($user) {
            return $user->hasRole('admin'); 
        });

        Gate::define('view-profile', function ($user, $profile) {
            return $user->id === $profile->user_id;
        });
        
    }
}
