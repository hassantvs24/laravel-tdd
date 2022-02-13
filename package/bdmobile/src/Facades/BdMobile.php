<?php


namespace Naztech\BdMobile\Facades;


use Illuminate\Support\Facades\Facade;

class BdMobile extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'bd-mobile';
    }

}
