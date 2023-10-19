<?php

namespace EomPlus\NovaSignature;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

use Outl1ne\NovaTranslationsLoader\LoadsNovaTranslations;

class FieldServiceProvider extends ServiceProvider
{
    use LoadsNovaTranslations;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslations(__DIR__.'/../lang', 'nova-signature', true);

        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-signature', __DIR__.'/../dist/js/field.js');
            Nova::style('nova-signature', __DIR__.'/../dist/css/field.css');
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
