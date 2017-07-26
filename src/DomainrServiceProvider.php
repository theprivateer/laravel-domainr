<?php

namespace Privateer\LaravelDomainr;


use Illuminate\Support\ServiceProvider;
use Privateer\Domainr\Domainr;

class DomainrServiceProvider extends ServiceProvider
{

    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../publish/config/domainr.php' => config_path('domainr.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../publish/config/domainr.php', 'domainr');

        $this->app->bind('domainr', function () {
            return new Domainr(config("domainr.mashape_key"), config("domainr.api_url"));
        });
    }

    public function provides()
    {
        return [Domainr::class];
    }
}