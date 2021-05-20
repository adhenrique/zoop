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
     * Set Api Version By Resource
     *
     * @return void
     */
    public function setApiVersionByResource($resource){
        if (!empty($this->config['custom'][$resource])) {
            $this->config['defaults']['api_version'] = $this->config['custom'][$resource]['api_version'];
        }
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
     * Get endpoint URL beta
     *
     * @return string
     */
    public function getUrlBeta(){
        return $this->config['defaults']['endpoint_beta'] . '/' . $this->config['defaults']['api_version'] . '/marketplaces/';
    }

    /**
     * Get Curl Headers
     *
     * @return array
     */
    public function getHeaders(){
        return $this->config['headers'];
    }

    /**
     * Get Curl Headers to upload files
     *
     * @return array
     */
    public function getHeadersFile(){
        $headers = $this->getHeaders();

        $contentTypeDefault = 'Content-Type: application/json';
        $contentTypeFile = 'Content-Type: multipart/form-data';

        if ($key = array_search($contentTypeDefault, $headers)) {
            $headers[$key] = $contentTypeFile;
        } else if (!$key = array_search($contentTypeFile, $headers)) {
            $headers[] = $contentTypeFile;
        }

        return $headers;
    }

    /**
     * return bool api is beta
     *
     * @return bool
     */
    public function endpointIsBeta($endpoint) {
        $pattern = implode('|', $this->config['defaults']['apis_use_beta']);
        preg_match("($pattern)", $endpoint, $match);
        if (count($match) > 0) {
            return true;
        }
        return false;
    }
}