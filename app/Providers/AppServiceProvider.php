<?php

namespace App\Providers;

use App\Models\Article;
use App\Policies\ArticlePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\URL;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    protected $policies = [
        Article::class => ArticlePolicy::class,
    ];

    public function boot(): void
    {
        
        if (config('app.env') === 'production' || config('app.env') === 'staging') { // Or just directly apply it
            URL::forceScheme('https');
        }

        $this->registerPolicies();
    }
}
