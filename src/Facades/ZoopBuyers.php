<?php

namespace Zoop\Facades;

use Illuminate\Support\Facades\Facade;

class ZoopBuyers extends Facade{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'ZoopBuyers';
    }
}