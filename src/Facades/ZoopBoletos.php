<?php

namespace Zoop\Facades;

use Illuminate\Support\Facades\Facade;

class ZoopBoletos extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ZoopBoletos';
    }
}
