<?php

namespace Zoop\Facades;

use Illuminate\Support\Facades\Facade;

class ZoopTransfers extends Facade{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'ZoopTransfers';
    }
}