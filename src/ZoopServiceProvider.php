<?php

namespace Zoop;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Zoop\Lib\APIResource;
use Zoop\Lib\ZoopBuyers;
use Zoop\Lib\ZoopSellers;
use Zoop\Lib\ZoopBankAccounts;
use Zoop\Lib\ZoopCards;
use Zoop\Lib\ZoopChargesCNP;
use Zoop\Lib\ZoopSplitTransactions;
use Zoop\Lib\ZoopTokens;
use Zoop\Lib\ZoopTransfers;

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

        $this->app->singleton('ZoopSplitTransactions', function () use ($service) {
                return new ZoopSplitTransactions(APIResource::getSingleton($service));
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

    public function mergeConfigFrom( $config, $zoopConfig )
    {
        $origin    = $this->app[ 'config' ]->get( $zoopConfig, [] );
        $newConfig = config( sprintf( 'services.%s', $zoopConfig ) );

        $this->app[ 'config' ]->set( $zoopConfig, array_merge( $newConfig, $origin ) );
    }

}
