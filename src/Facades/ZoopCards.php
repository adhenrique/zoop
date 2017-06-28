<?php

namespace Zoop\Facades;

use Illuminate\Support\Facades\Facade;

class ZoopCards extends Facade{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'ZoopCards';
    }
}