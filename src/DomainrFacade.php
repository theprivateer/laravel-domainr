<?php

namespace Privateer\LaravelDomainr;


use Illuminate\Support\Facades\Facade;

class DomainrFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'domainr';
    }

}