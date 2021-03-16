<?php

namespace Zoop\Facades;

use Illuminate\Support\Facades\Facade;

class Zoop extends Facade{

    /**
     * @return string
     */
    protected static function getFacadeAccessor(){
        return 'zoop';
    }
}
