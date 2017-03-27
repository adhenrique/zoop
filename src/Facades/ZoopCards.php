<?php

namespace Zoop\src\Facades;

use Illuminate\Support\Facades\Facade;

class ZoopCards extends Facade{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'ZoopCards';
    }
}