<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\ProductPolicy;
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
     Product::class => ProductPolicy::class,
     Category::class=>CategoryPolicy::class,
     User::class=>User::class

    ];



    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
    //roll to update a product
    Gate::define('can-delete-product',function(User $user){
        return $user->is_admin == 1;
    });

    Gate::define('can-sell',function(User $user){
        return $user->is_seller == 1;
    });

    }
}
