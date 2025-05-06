<?php

namespace App\Providers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Model::preventLazyLoading();
        //Paginator::usebootstrapFive();
        Gate::define('edit-note', function (User $user, Note $note): bool {
            return $note->user->is($user);
        });
    }
}
