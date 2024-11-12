<?php

namespace App\Providers;

use App\Contracts\PaymentProcessor;
use App\Services\Stripe;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
//    /**
//     * Register any application services in bindings prop
//     */
//    public $bindings = [
//        PaymentProcessor::class => Stripe::class
//    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //bind Interface with concrete class in App`s container
        $this->app->bind(PaymentProcessor::class, Stripe::class);
        //or use as Closure
//        $this->app->bind(PaymentProcessor::class, function (){
//            return new Stripe([]);
//        });
        //or with use with App
        $this->app->bind(PaymentProcessor::class, function (Application $app){
            return $app->make(Stripe::class, ['config' => []]) ;
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //set Integer pattern for ids in routes
        Route::pattern('id', '[0-9]+');
    }
}
