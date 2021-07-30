<?php

namespace Zoop\Contracts;

use Zoop\Lib\APIResource;

interface ZoopBankAccounts{

    /**
     * API Resource.
     *
     * @param $APIResource $APIResource
    */
    public function __construct(APIResource $APIResource);

    /**
     * Create a new bank account token
     *
     * @param $post array
    */
    public function create($post);

    /**
     * Associate a bank account from a given token.
     *
     * @param $post array
     */
    public function associateWithACustomer($post);

    /**
     * Deactivate bank account by id.
     *
     * @param $bankAccountID string
     * @param $post array
     */
    public function deactivate($bankAccountID, $post);

    /**
     * Deletes the specified bank account by id
     *
     * @param $bankAccountID string
     */
    public function delete($bankAccountID);

    /**
     * Returns the bank account resource by id
     *
     * @param $bankAccountID string
     */
    public function get($bankAccountID);

    /**
     * Returns a JSON object with a list of bank accounts.
     */
    public function getAll();

    /**
     * Returns a JSON object with a list of bank accounts by seller.
     * 
     * @param $sellerID string
     */
    public function getAllBySeller($sellerID);
}