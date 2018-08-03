<?php

namespace Zoop\Lib;

use Zoop\Exceptions\ZoopAuthenticationException;
use Zoop\Exceptions\ZoopObjectNotFound;

class APIRequest{
    
    /**
     * Zoop Base configuration
     *
     * @var object
    */
    protected $zoopBase;

    /**
     * APIRequest instance
     *
     * @var APIRequest
    */
    protected static $instance;

    /**
     * Self constructor.
     *
     * @param $base object
    */
    public function __construct($base){
        $this->zoopBase = $base;
    }

    /**
     * Singleton of self instance
     *
     * @param $base object
     *
     * @return APIRequest
    */
    public static function getInstance($base){
        if (is_null(self::$instance)) {
            self::$instance = new APIRequest($base);
        }
        return self::$instance;
    }

    /**
     * Handles request data
     *
     * @param $method string
     * @param $url string
     * @param $headers array
     * @param $data array
     *
     * @return mixed
     *
     * @throws ZoopAuthenticationException
     * @throws ZoopObjectNotFound
     */
    public function request($method, $url, $headers, $data = []){
        global $zoop_last_api_response_code;

        if ($this->zoopBase->getMarketplaceId() == null) {
            throw new ZoopAuthenticationException("Marketplace id não configurada. Verifique seu arquivo de configurações em 'resources/config/config.php'");
        }

//        if ($this->zoopBase->getPublishableKey() == null) {
//            throw new ZoopAuthenticationException("Publishable key não configurada. Verifique seu arquivo de configurações em 'resources/config/config.php'");
//        }

        list($response_body, $response_code) = $this->requestWithCURL($method, $url, $headers, $data);

        $response = json_decode($response_body);

        if (json_last_error() != JSON_ERROR_NONE) throw new ZoopObjectNotFound($response_body);
        if ($response_code == 404) throw new ZoopObjectNotFound($response_body);

        if (isset($response->errors)) {

            if ((gettype($response->errors) != "string") && count(get_object_vars($response->errors)) == 0) {
                unset($response->errors);
            }
            else if ((gettype($response->errors) != "string") && count(get_object_vars($response->errors)) > 0) {
                $response->errors = (Array) $response->errors;
            }

            if (isset($response->errors) && (gettype($response->errors) == "string")) {
                $response->errors = $response->errors;
            }
        }

        $zoop_last_api_response_code = $response_code;

        return $response;
    }

    /**
     * Create a request to ZOOP API's
     *
     * @param $method
     * @param $url
     * @param $headers
     * @param array $data
     *
     * @return array
     */
    private function requestWithCURL($method, $url, $headers, $data = Array()){
        $curl = curl_init();
        $opts = Array();

        if(strtolower($method) == 'file'){
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $data;
        }

        if (strtolower($method) == "post") {
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = http_build_query($data);
        }

        if (strtolower($method) == "delete") $opts[CURLOPT_CUSTOMREQUEST] = 'DELETE';

        if (strtolower($method) == "put") {
            $opts[CURLOPT_CUSTOMREQUEST] = 'PUT';
            $opts[CURLOPT_POSTFIELDS] = http_build_query($data);
        }

        $opts[CURLOPT_URL] = $url;
        $opts[CURLOPT_USERPWD] = $this->zoopBase->getPublishableKey();
        $opts[CURLOPT_RETURNTRANSFER] = true;
        $opts[CURLOPT_CONNECTTIMEOUT] = 30;
        $opts[CURLOPT_TIMEOUT] = 80;
        $opts[CURLOPT_HTTPHEADER] = $headers;

        $opts[CURLOPT_SSL_VERIFYHOST] = 2;
        $opts[CURLOPT_SSL_VERIFYPEER] = false;
//        $opts[CURLOPT_CAINFO] = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "data") . DIRECTORY_SEPARATOR . "ca-bundle.crt";

        curl_setopt_array($curl, $opts);

        $response_body = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        return Array($response_body, $response_code);
    }

    /**
     * Encode Parameters of request
     *
     * @param $method
     * @param $url
     * @param array $data
     *
     * @return array
     */
    private function encodeParameters($method, $url, $data = []) {

        $method = strtolower($method);

        switch($method) {
            case "get":
            case "delete":
                $paramsInURL = ZoopUtilities::arrayToParams($data);
                $data = null;
                $url = (strpos($url,"?")) ? $url . "&" . $paramsInURL : $url . "?" . $paramsInURL;
                break;
            case "post":
            case "put":
                $data = ZoopUtilities::arrayToParams($data);
                break;
        }

        return [
            $url,
            $data
        ];
    }
}
