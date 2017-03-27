<?php

namespace Zoop\src\Facades;

use Illuminate\Support\Facades\Facade;

class ZoopBankAccounts extends Facade{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'ZoopBankAccounts';
    }
}