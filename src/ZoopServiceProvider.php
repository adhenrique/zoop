<?php

namespace Zoop\src;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Zoop\src\Lib\APIResource;
use Zoop\src\Lib\ZoopBuyers;
use Zoop\src\Lib\ZoopSellers;
use Zoop\src\Lib\ZoopBankAccounts;
use Zoop\src\Lib\ZoopCards;
use Zoop\src\Lib\ZoopChargesCNP;
use Zoop\src\Lib\ZoopTokens;
use Zoop\src\Lib\ZoopTransfers;

class ZoopServiceProvider extends ServiceProvider {

    /**
     * @return void
     */
    public function boot(){

    }

    /**
     * @return void
     */
    public function register(){

        $configFile = __DIR__.'/resources/config/config.php';

        $this->mergeConfigFrom($configFile, 'zoopconfig');

        $service = ZoopBase::getSingleton($this->app['config']->get('zoopconfig', []));

        $this->app->singleton('ZoopBankAccounts', function () use ($service) {
            return new ZoopBankAccounts(APIResource::getSingleton($service));
        });

        $this->app->singleton('ZoopBuyers', function () use ($service) {
            return new ZoopBuyers(APIResource::getSingleton($service));
        });

        $this->app->singleton('ZoopCards', function () use ($service) {
            return new ZoopCards(APIResource::getSingleton($service));
        });

        $this->app->singleton('ZoopChargesCNP', function () use ($service) {
            return new ZoopChargesCNP(APIResource::getSingleton($service));
        });

        $this->app->singleton('ZoopSellers', function () use ($service) {
                return new ZoopSellers(APIResource::getSingleton($service));
        });

        $this->app->singleton('ZoopTokens', function () use ($service) {
                return new ZoopTokens(APIResource::getSingleton($service));
        });

        $this->app->singleton('ZoopTransfers', function () use ($service) {
                return new ZoopTransfers(APIResource::getSingleton($service));
        });
    }

    /**
     * @return array
     */
    public function provides(){
        return [
            ZoopBankAccounts::class,
            ZoopBuyers::class,
            ZoopCards::class,
            ZoopChargesCNP::class,
            ZoopSellers::class,
            ZoopTokens::class,
            ZoopTransfers::class
        ];
    }

}
