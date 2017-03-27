<?php

namespace Zoop\src\Lib;

class ZoopChargesCNP implements \Zoop\src\Contracts\ZoopChargesCNP {

    /**
     * API Resource
     *
     * @var object
     */
    protected $APIResource;

    /**
     * ZoopChargesCNP constructor.
     * @param APIResource $APIResource
     */
    public function __construct(APIResource $APIResource){
        $this->APIResource = $APIResource;
    }

    /**
     * @param array $post
     * @return mixed
     */
    public function create($post = []){
        $api = 'transactions';
        return $this->APIResource->createAPI($api, $post);
    }

    /**
     * @param string $transactionID
     * @param array $post
     * @return mixed
     */
    public function cancel($transactionID, $post){
        $api = 'transactions/' . $transactionID . '/void';
        return $this->APIResource->createAPI($api, $post);
    }

    /**
     * @param string $transactionID
     * @param array $post
     * @return mixed
     */
    public function capture($transactionID, $post){
        $api = 'transactions/' . $transactionID . '/capture';
        return $this->APIResource->createAPI($api, $post);
    }

    /**
     * @param string $transactionID
     * @return mixed
     */
    public function get($transactionID){
        $api = 'transactions/' . $transactionID;
        return $this->APIResource->searchAPI($api);
    }

    /**
     * @return mixed
     */
    public function getAll(){
        $api = 'transactions';
        return $this->APIResource->searchAPI($api);
    }
}