<?php

namespace Zoop\Facades;

use Illuminate\Support\Facades\Facade;

class ZoopPlans extends Facade{

    /**
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'ZoopPlans';
    }
}