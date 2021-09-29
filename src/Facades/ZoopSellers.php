<?php

namespace Zoop\Facades;

use Illuminate\Support\Facades\Facade;

class ZoopSellers extends Facade{

    /**
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'ZoopSellers';
    }
}