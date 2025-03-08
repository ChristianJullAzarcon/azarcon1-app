<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductService;

class productServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductService::class,function($app){
            $products = [
                [
                    'id' => 1,
                    'name' => 'Apple',
                    'category' => 'fruit'
                ],
                [
                    'id' => 2,
                    'name' => 'Brocolli',
                    'category' => 'Vegetables',
                    
                ],
                [
                    'id' => 3,
                    'name' => 'Sardines',
                    'category' => 'fish'
                    ]
                ];
                return new ProductService($products);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->share('productKey','abc123');
    }
}
