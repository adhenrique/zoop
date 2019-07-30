<?php

namespace Zoop\Contracts;

use Zoop\Lib\APIResource;

interface ZoopInvoices{

    /**
     * API Resource.
     *
     * @param $APIResource $APIResource
    */
    public function __construct(APIResource $APIResource);

    /**
     * Create a new Invoice
     *
     * @param $post array
    */
    public function create($post);

        /**
     * Update a created Invoice
     *
     * @param $invoiceID string
     * @param $post array
     */
    public function update($invoiceID, $post);

    /**
     * Delete a Invoice by id
     *
     * @param $invoiceID string
    */
    public function delete($invoiceID);

    /**
     * Approve a Invoice by id
     *
     * @param $invoiceID string
    */
    public function approve($invoiceID);

    /**
     * Void a Invoice by id
     *
     * @param $invoiceID string
    */
    public function void($invoiceID);

    /**
     * Retrieve the details of a Invoice by id
     *
     * @param $invoiceID string
     */
    public function get($invoiceID);

    /**
     * Returns a JSON object with a list of Invoices.
     */
    public function getAll();

    /**
     * Returns a JSON object with a list of Invoices of seller.
     */
    public function getAllBySeller($customerID);
}