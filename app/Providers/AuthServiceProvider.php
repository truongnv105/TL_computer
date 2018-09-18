<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Product;
use App\Models\Category;
use App\Policies\ProductPolicy;
use App\Policies\CategoryPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Product::class => ProductPolicy::class,
        Category::class => CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('product.delete', 'App\Policies\ProductPolicy@delete');
        Gate::define('categories.create', 'App\Policies\CategoryPolicy@create');
        Gate::define('categories.delete', 'App\Policies\CategoryPolicy@delete');
        Gate::define('categories.before', 'App\Policies\CategoryPolicy@before');
    }
}
