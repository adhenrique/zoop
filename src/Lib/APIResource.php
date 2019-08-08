<?php

namespace Zoop\Lib;

use Zoop\Exceptions\ZoopException;
use Zoop\Helpers\ZoopHelpers;
use Zoop\ZoopBase;

class APIResource{

    /**
     * ZoopHelpers
    */
    use ZoopHelpers;

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

    protected static $CURLFile;

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
     * File resource
     *
     * @param $api string
     * @param $files array
     *
     * @return mixed
     *
     * @throws ZoopException
    */
    public function fileAPI($api, $files){
        if ($this->zoopBase->endpointIsBeta($api)) {
            $url = $this->zoopBase->getUrlBeta() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        } else {
            $url = $this->zoopBase->getUrl() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        }
        $mimeTypes = [
            'application/pdf',
            'image/jpeg',
            'image/png'
        ];
        try {
//
            if(is_array($files)){
                throw new ZoopException('You can only upload one file per request! Array given...');
            }else{
                if(filesize($files) > 250000) throw new ZoopException('You can only send files with 250 kbytes of size.');

                if(!is_file($files)) throw new ZoopException('Looks like this is not a file...');

                if(!in_array(mime_content_type($files), $mimeTypes)) throw new ZoopException('You can only send files of types "jpg, png, pdf"!');

                return $this->APIRequest->request('FILE', $url, $this->zoopBase->getHeaders(), [
                    'file' => new \CURLFile($files ,'' , uniqid()),
                    'category' => 'identification'
                ]);
            }

        } catch (ZoopException $e) {
            throw new ZoopException($e->getMessage());
        }
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
        if ($this->zoopBase->endpointIsBeta($api)) {
            $url = $this->zoopBase->getUrlBeta() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        } else {
            $url = $this->zoopBase->getUrl() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        }
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
        if ($this->zoopBase->endpointIsBeta($api)) {
            $url = $this->zoopBase->getUrlBeta() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        } else {
            $url = $this->zoopBase->getUrl() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        }
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
        if ($this->zoopBase->endpointIsBeta($api)) {
            $url = $this->zoopBase->getUrlBeta() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        } else {
            $url = $this->zoopBase->getUrl() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        }
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
        if ($this->zoopBase->endpointIsBeta($api)) {
            $url = $this->zoopBase->getUrlBeta() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        } else {
            $url = $this->zoopBase->getUrl() . $this->zoopBase->getMarketplaceId() . '/' . $api;
        }
        try {
            return $this->APIRequest->request('PUT', $url, $this->zoopBase->getHeaders(), $attributes);

        } catch (ZoopException $e) {
            throw new ZoopException($e->getMessage());
        }
    }
}