<?php

namespace Zoop\Lib;


class ZoopPlans implements \Zoop\Contracts\ZoopPlans {

    /**
     * API Resource
     *
     * @var object
     */
    protected $APIResource;

    /**
     * ZoopPlans constructor.
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
        $api = 'plans';
        return $this->APIResource->createAPI($api, $post);
    }

    /**
     * @param string $planID
     * @param array $post
     * @return mixed
     */
    public function update($planID, $post){
        $api = 'plans/' . $planID;
        return $this->APIResource->updateAPI($api, $post);
    }

    /**
     * @param string $planID
     * @return mixed
     */
    public function delete($planID){
        $api = 'plans/' . $planID;
        return $this->APIResource->deleteAPI($api);
    }

    /**
     * @param string $planID
     * @return mixed
     */
    public function get($planID){
        $api = 'plans/' . $planID;
        return $this->APIResource->searchAPI($api);
    }

    /**
     * @return mixed
     */
    public function getAll(){
        $api = 'plans';
        return $this->APIResource->searchAPI($api);
    }
}