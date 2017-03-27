<?php

namespace Zoop\src\Lib;

use Zoop\src\Exceptions\ZoopException;
use Zoop\src\ZoopBase;

class APIResource{

    /**
     * APIResource instance
     *
     * @var APIResource
    */
    protected static $instance;

    /**
     * ZoopBase instance
     *
     * @var ZoopBase
    */
    protected $zoopBase;

    /**
     * APIRequest instance
     *
     * @var APIRequest
    */
    protected $APIRequest;

    /**
     * Self constructor.
     *
     * @param ZoopBase $zoopBase
     */
    protected function __construct(ZoopBase $zoopBase){
        $this->zoopBase = $zoopBase;
        $this->APIRequest = APIRequest::getInstance($zoopBase);
    }

    /**
     * Singleton of self instance
     *
     * @param ZoopBase $zoopBase
     *
     * @return APIResource
     */
    public static function getSingleton(ZoopBase $zoopBase){
        if (is_null(self::$instance)) {
            self::$instance = new APIResource($zoopBase);
        }
        return self::$instance;
    }

    /**
     * Create resource
     *
     * @param $api
     * @param array $attributes
     *
     * @return mixed
     *
     * @throws ZoopException
     */
    public function createAPI($api, $attributes = []) {
        $url = $this->zoopBase->getUrl() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        try {
            return $this->APIRequest->request('POST', $url, $this->zoopBase->getHeaders(), $attributes);

        } catch (ZoopException $e) {
            throw new ZoopException($e->getMessage());
        }
    }

    /**
     * Search resource
     *
     * @param $api
     *
     * @return mixed
     *
     * @throws ZoopException
     */
    public function searchAPI($api){
        $url = $this->zoopBase->getUrl() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        try {
            return $this->APIRequest->request('GET', $url, $this->zoopBase->getHeaders());

        } catch (ZoopException $e) {
            throw new ZoopException($e->getMessage());
        }
    }

    /**
     * Delete resource
     *
     * @param $api
     *
     * @return mixed
     *
     * @throws ZoopException
     */
    public function deleteAPI($api) {
        $url = $this->zoopBase->getUrl() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        try {
            return $this->APIRequest->request('DELETE', $url, $this->zoopBase->getHeaders());

        } catch (ZoopException $e) {
            throw new ZoopException($e->getMessage());
        }
    }

    /**
     * Update resource
     *
     * @param $api
     * @param array $attributes
     *
     * @return mixed
     *
     * @throws ZoopException
     */
    public function updateAPI($api, $attributes = []){
        $url = $this->zoopBase->getUrl() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        try {
            return $this->APIRequest->request('PUT', $url, $this->zoopBase->getHeaders(), $attributes);

        } catch (ZoopException $e) {
            throw new ZoopException($e->getMessage());
        }
    }
}