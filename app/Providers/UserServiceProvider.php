<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Services\UserServices;
class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(UserServices::class, function($app){

            $users = [ 
                [
                    'id' => 1,
                    'name' => 'John Doe',
                    'gender' => 'Male'
                ]   
                ,
                [
                    'id' => 2,
                    'name' => 'Jane Doe',
                   'gender' => 'Female' 
                ]
            ];
            
            return new UserServices($users);
        });
    }
    

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
