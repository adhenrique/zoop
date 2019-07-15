<?php

namespace Zoop\Lib;

class ZoopTransfers implements \Zoop\Contracts\ZoopTransfers
{

    /**
     * API Resource
     *
     * @var object
     */
    protected $APIResource;

    /**
     * ZoopTransfers constructor.
     * @param APIResource $APIResource
     */
    public function __construct(APIResource $APIResource)
    {
        $this->APIResource = $APIResource;
    }

    /**
     * @param string $bankAccountID
     * @param array $post
     * @return mixed
     */
    public function create($bankAccountID, $post = [])
    {
        $api = 'bankaccounts/' . $bankAccountID . '/transfers';
        return $this->APIResource->createAPI($api, $post);
    }

    /**
     * @param string $bankAccountID
     * @return mixed
     */
    public function get($bankAccountID)
    {
        $api = 'bankaccounts/' . $bankAccountID;
        return $this->APIResource->searchAPI($api);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $api = 'bankaccounts';
        return $this->APIResource->searchAPI($api);
    }

    public function transferP2P($owner, $receiver, $post = [])
    {
        $api = "transfers/$owner/to/$receiver";
        $this->APIResource->createAPI($api, $post);
    }
}
