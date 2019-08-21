<?php

namespace Zoop\Facades;

use Illuminate\Support\Facades\Facade;

class ZoopWebhooks extends Facade{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'ZoopWebhooks';
    }
}