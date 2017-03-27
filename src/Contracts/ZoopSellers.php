<?php

namespace Zoop\src\Contracts;

use Zoop\src\Lib\APIResource;

interface ZoopSellers{

    /**
     * API Resource.
     *
     * @param $APIResource $APIResource
    */
    public function __construct(APIResource $APIResource);

    /**
     * Create a new Individual Seller
     *
     * @param $post array
    */
    public function createIndividuals($post);

    /**
     * Create a new Business Seller
     *
     * @param $post array
     */
    public function createBusiness($post);

    /**
     * Delete a Seller by id
     *
     * @param $buyerID string
    */
    public function delete($buyerID);

    /**
     * Retrieve the details of a Seller by id
     *
     * @param $buyerID string
     */
    public function get($buyerID);

    /**
     * Returns a JSON object with a list of Sellers.
     */
    public function getAll();
}