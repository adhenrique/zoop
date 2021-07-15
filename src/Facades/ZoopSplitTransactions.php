<?php

namespace Zoop\Facades;

use Illuminate\Support\Facades\Facade;

class ZoopSplitTransactions extends Facade{

    /**
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'ZoopSplitTransactions';
    }
}