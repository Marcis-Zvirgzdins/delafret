<?php

namespace App\Providers;

use App\Models\Article;
use App\Policies\ArticlePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


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
        $this->registerPolicies();
    }
}
