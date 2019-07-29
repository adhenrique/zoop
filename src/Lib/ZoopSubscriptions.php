<?php

namespace Zoop\Lib;


class ZoopSubscriptions implements \Zoop\Contracts\ZoopSubscriptions {

    /**
     * API Resource
     *
     * @var object
     */
    protected $APIResource;

    /**
     * ZoopSubscriptions constructor.
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
        $api = 'subscriptions';
        return $this->APIResource->createAPI($api, $post);
    }

    /**
     * @param string $subscriptionID
     * @param array $post
     * @return mixed
     */
    public function update($subscriptionID, $post){
        $api = 'subscriptions/' . $subscriptionID;
        return $this->APIResource->updateAPI($api, $post);
    }

    /**
     * @param string $subscriptionID
     * @param array $post
     * @return mixed
     */
    public function suspend($subscriptionID){
        $api = 'subscriptions/' . $subscriptionID . '/suspend';
        return $this->APIResource->createAPI($api);
    }

    /**
     * @param string $subscriptionID
     * @param array $post
     * @return mixed
     */
    public function reactivate($subscriptionID){
        $api = 'subscriptions/' . $subscriptionID . '/reactivate';
        return $this->APIResource->createAPI($api);
    }

    /**
     * @param string $subscriptionID
     * @return mixed
     */
    public function delete($subscriptionID){
        $api = 'subscriptions/' . $subscriptionID;
        return $this->APIResource->deleteAPI($api);
    }

    /**
     * @param string $subscriptionID
     * @return mixed
     */
    public function get($subscriptionID){
        $api = 'subscriptions/' . $subscriptionID;
        return $this->APIResource->searchAPI($api);
    }

    /**
     * @return mixed
     */
    public function getAll(){
        $api = 'subscriptions';
        return $this->APIResource->searchAPI($api);
    }
}