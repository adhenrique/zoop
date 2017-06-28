<?php

namespace Zoop\Contracts;

use Zoop\Lib\APIResource;

interface ZoopCards{

    /**
     * API Resource.
     *
     * @param $APIResource $APIResource
    */
    public function __construct(APIResource $APIResource);

    /**
     * Associate a credit card token with a given customer id.
     *
     * @param $post array
     */
    public function associateWithACustomer($post);

    /**
     * Deactivate card by id.
     *
     * @param $creditCardID string
     * @param $post array
     */
    public function deactivate($creditCardID, $post);

    /**
     * Delete a Credit Card by id
     *
     * @param $buyerID string
    */
    public function delete($buyerID);

    /**
     * Retrieve the details of a Credit Card by id
     *
     * @param $buyerID string
     */
    public function get($buyerID);

    /**
     * Returns a JSON object with a list of Credit Cards.
     */
    public function getAll();
}