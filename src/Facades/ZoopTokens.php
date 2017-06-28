<?php

namespace Zoop\Facades;

use Illuminate\Support\Facades\Facade;

class ZoopTokens extends Facade{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'ZoopTokens';
    }
}