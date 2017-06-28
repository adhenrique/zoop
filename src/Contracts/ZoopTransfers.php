<?php

namespace Zoop\Contracts;

use Zoop\Lib\APIResource;

interface ZoopTransfers{

    /**
     * API Resource.
     *
     * @param $APIResource $APIResource
    */
    public function __construct(APIResource $APIResource);

    /**
     * Create a Transfer to specific bank account
     *
     * @param $bankAccountID string
     * @param $post array
    */
    public function create($bankAccountID, $post);

    /**
     * Retrieve the details of a Transfer by id
     *
     * @param $bankAccountID string
     */
    public function get($bankAccountID);

    /**
     * Returns a JSON object with a list of Transfers.
     */
    public function getAll();
}