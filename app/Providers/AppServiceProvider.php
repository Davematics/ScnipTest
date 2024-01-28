<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductSortService;
use App\Services\PriceSorter;
use App\Services\SalesPerViewSorter;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductSortService::class, function ($app) {
            $sortService = new ProductSortService();

            // Add sorters here
            $sortService->addSorter('price', new PriceSorter());
            $sortService->addSorter('sales_per_view', new SalesPerViewSorter());

            return $sortService;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
