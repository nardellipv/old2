<?php

namespace App\Providers;

use App\Models\Cash;
use App\Models\Sale;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'admin.parts._menu',
        ], function ($view) {

            $saleSum = Sale::whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->sum('price');

            $exitChasSum = Cash::whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->where('move', 'E')
                ->sum('mount');

            $commissionSum = Sale::whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->sum('commission_pay');

            $view->with([
                'saleSum' => $saleSum,
                'exitChasSum' => $exitChasSum,
                'commissionSum' => $commissionSum,
            ]);
        });
    }
}
