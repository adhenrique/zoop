<?php

namespace Zoop\Facades;

use Illuminate\Support\Facades\Facade;

class ZoopSubscriptions extends Facade{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'ZoopSubscriptions';
    }
}