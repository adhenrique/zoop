<?php

namespace Zoop\src\Contracts;

use Zoop\src\Lib\APIResource;

interface ZoopChargesCNP{

    /**
     * API Resource.
     *
     * @param $APIResource $APIResource
    */
    public function __construct(APIResource $APIResource);

    /**
     * Create a transaction payment
     *
     * @param $post array
     */
    public function create($post);

    /**
     * Cancel a pre-authorized transaction payment
     *
     * @param $transactionID string
     * @param $post array
    */
    public function cancel($transactionID, $post);

    /**
     * Capture the payment of a pre-authorized transaction.
     *
     * @param $transactionID string
     * @param $post array
    */
    public function capture($transactionID, $post);

    /**
     * Retrieve the details of a transaction by id
     *
     * @param $transactionID string
     */
    public function get($transactionID);

    /**
     * Returns a JSON object with a list of transactions.
     * @param $get array || null
     */
    public function getAll($get = null);
}