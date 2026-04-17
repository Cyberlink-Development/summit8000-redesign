<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FrontpageComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeFrontpage();
    }

    public function composeFrontpage(){
          view()->composer('themes.default.frontpage','App\Http\ViewComposers\FrontpageComposer');
    }
}
