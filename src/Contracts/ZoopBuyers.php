<?php

namespace Zoop\src\Contracts;

use Zoop\src\Lib\APIResource;

interface ZoopBuyers{

    /**
     * API Resource.
     *
     * @param $APIResource $APIResource
    */
    public function __construct(APIResource $APIResource);

    /**
     * Create a new Buyer
     *
     * @param $post array
    */
    public function create($post);

    /**
     * Delete a Buyer by id
     *
     * @param $buyerID string
    */
    public function delete($buyerID);

    /**
     * Retrieve the details of a Buyer by id
     *
     * @param $buyerID string
     */
    public function get($buyerID);

    /**
     * Returns a JSON object with a list of buyers accounts.
     */
    public function getAll();
}