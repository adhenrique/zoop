<?php

namespace Zoop\Lib;


class ZoopBuyers implements \Zoop\Contracts\ZoopBuyers {

    /**
     * API Resource
     *
     * @var object
     */
    protected $APIResource;

    /**
     * ZoopBuyers constructor.
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
        $api = 'buyers';
        return $this->APIResource->createAPI($api, $post);
    }

    /**
     * @param string $buyerID
     * @return mixed
     */
    public function delete($buyerID){
        $api = 'buyers/' . $buyerID;
        return $this->APIResource->deleteAPI($api);
    }

    /**
     * @param string $buyerID
     * @return mixed
     */
    public function get($buyerID){
        $api = 'buyers/' . $buyerID;
        return $this->APIResource->searchAPI($api);
    }

    /**
     * @return mixed
     */
    public function getAll(){
        $api = 'buyers';
        return $this->APIResource->searchAPI($api);
    }
}