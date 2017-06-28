<?php

namespace Zoop;

class ZoopBase {

    /**
     * Config.
     *
     * @var array
     */
    protected $config;

    /**
     * ZoopBase instance
     *
     * @var ZoopBase
    */
    private static $instance;

    /**
     * ZoopBase constructor.
     *
     * @param array $config
     */
    private function __construct(array $config = []){
        $this->config = $config;
    }

    /**
     * Singleton of self instance
     *
     * @param array $config
     *
     * @return ZoopBase
     */
    public static function getSingleton($config = []){
        if(is_null(self::$instance)){
            self::$instance = new ZoopBase($config);
        }
        return self::$instance;
    }

    /**
     * Get Publishable Key
     *
     * @return string
     */
    public function getPublishableKey(){
        return $this->config['defaults']['publishable_key'];
    }

    /**
     * Get Market Place ID
     *
     * @return string
     */
    public function getMarketplaceId(){
        return $this->config['defaults']['marketplace_id'];
    }

    /**
     * Get endpoint URL
     *
     * @return string
     */
    public function getUrl(){
        return $this->config['defaults']['endpoint'] . '/' . $this->config['defaults']['api_version'] . '/marketplaces/';
    }

    /**
     * Get Curl Headers
     *
     * @return array
     */
    public function getHeaders(){
        return $this->config['headers'];
    }
}