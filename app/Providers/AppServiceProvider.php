<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('stock', function ($amount) {
            return "<?php echo(number_format($amount, 9, ',', '.') .'€'); ?>";
        });

        Blade::directive('money', function ($amount) {
            return "<?php echo(number_format($amount, 2, ',', '.') .'€'); ?>";
        });

        Blade::directive('shares', function ($percentaje) {
            return "<?php echo(number_format($percentaje, 0, ',', '.') .'%'); ?>";
        });

        Blade::directive('profitability', function ($percentaje) {
            return "<?php echo($percentaje==0?'-':(number_format($percentaje*100-100, 1, ',', '.') .'% (x'.number_format($percentaje, 0, ',', '.').')')); ?>";
        });

        Blade::directive('percentage', function ($percentaje) {
            return "<?php echo(number_format($percentaje, 0, ',', '.') .'%'); ?>";
        });

        Blade::directive('fee', function ($percentaje) {
            return "<?php echo(number_format($percentaje*100, 0, ',', '.') .'%'); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
