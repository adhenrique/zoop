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
     * Update a created Individual Seller
     *
     * @param $sellerID string
     * @param $post array
     */
    public function updateIndividuals($sellerID, $post);

    /**
     * Create a new Business Seller
     *
     * @param $post array
     */
    public function createBusiness($post);

    /**
     * Update a created Business Seller
     *
     * @param $sellerID string
     * @param $post array
     */
    public function updateBusiness($sellerID, $post);

    /**
     * Delete a Seller by id
     *
     * @param $sellerID string
    */
    public function delete($sellerID);

    /**
     * Retrieve the details of a Seller by id
     *
     * @param $sellerID string
     */
    public function get($sellerID);

    /**
     * Retrieve the details of a Seller by taxpayer_id
     *
     * @param $sellerTaxpayer_id string
     */
    public function getByTaxpayer_id($sellerTaxpayer_id);

    /**
     * Retrieve the details of a Seller by ein
     *
     * @param $sellerEin string
     */
    public function getByEin($sellerEin);

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

    /**
     * Download doc file
     *
     * @param $docID string
     */
    public function downloadDoc($docID);

    /**
     * Returns a JSON object with a list of MCCs.
    */
    public function getAllMccs();

    /**
     * Returns a JSON object with a current balance and total account balance
    */
    public function getBalances();
}