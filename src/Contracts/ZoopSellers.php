<?php

namespace Zoop\Contracts;

use Zoop\Lib\APIResource;

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

    /**
     * Send docs files
     *
     * @param $sellerID string
     * @param $files array
     */
    public function sendDocs($sellerID, $files);

    /**
     * Get doc details
     *
     * @param $docID string
    */
    public function getDoc($docID);

    /**
     * Get all docs from a given Seller
     *
     * @param $sellerID string
    */
    public function getAllDocs($sellerID);
}