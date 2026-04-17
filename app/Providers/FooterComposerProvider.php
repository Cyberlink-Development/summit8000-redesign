<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FooterComposerProvider extends ServiceProvider
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
        $this->composeMenu();
    }

    public function composeMenu(){
          view()->composer('themes.default.common.footer','App\Http\ViewComposers\FooterComposer');
    }
}
