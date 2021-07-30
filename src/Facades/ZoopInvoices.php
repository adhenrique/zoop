<?php

namespace Zoop\Facades;

use Illuminate\Support\Facades\Facade;

class ZoopInvoices extends Facade{

    /**
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'ZoopInvoices';
    }
}