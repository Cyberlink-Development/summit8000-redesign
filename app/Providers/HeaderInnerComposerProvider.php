<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HeaderInnerComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->composeHeader();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function composeHeader(){
        view()->composer('themes.default.common.header_inner', 'App\Http\ViewComposers\HeaderInnerComposer');
    }
}
