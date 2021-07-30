<?php

namespace Zoop\Lib;

class ZoopCards implements \Zoop\Contracts\ZoopCards {

    /**
     * API Resource
     *
     * @var object
     */
    protected $APIResource;

    /**
     * ZoopCards constructor.
     * @param APIResource $APIResource
     */
    public function __construct(APIResource $APIResource) {
        $this->APIResource = $APIResource;
    }

    /**
     * @param array $post
     * @return mixed
     */
    public function associateWithACustomer($post) {
        $api = 'cards';
        return $this->APIResource->createAPI($api, $post);
    }

    /**
     * @param string $creditCardID
     * @param array $post
     * @return mixed
     */
    public function deactivate($creditCardID, $post) {
        $api = 'cards/' . $creditCardID;
        return $this->APIResource->updateAPI($api, $post);
    }

    /**
     * @param string $creditCardID
     * @return mixed
     */
    public function delete($creditCardID) {
        $api = 'cards/' . $creditCardID;
        return $this->APIResource->deleteAPI($api);
    }

    /**
     * @param string $creditCardID
     * @return mixed
     */
    public function get($creditCardID) {
        $api = 'cards/' . $creditCardID;
        return $this->APIResource->searchAPI($api);
    }

    /**
     * @return mixed
     */
    public function getAll() {
        $api = 'cards';
        return $this->APIResource->searchAPI($api);
    }
}