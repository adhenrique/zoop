<?php

namespace Zoop\src\Contracts;

use Zoop\src\Lib\APIResource;

interface ZoopSplitTransactions{

    /**
     * API Resource.
     *
     * @param $APIResource $APIResource
     */
    public function __construct(APIResource $APIResource);

    /**
     * Create a new split_rule object
     *
     * @param $transactionID string
     * @param $post array
     */
    public function create($transactionID, $post);

    /**
     * Update a created split_rule
     *
     * @param $transactionID string
     * @param $splitRuleID string
     * @param $post array
     */
    public function update($transactionID, $splitRuleID, $post);

    /**
     * Delete a created split_rule
     *
     * @param $transactionID string
     * @param $splitRuleID string
     */
    public function delete($transactionID, $splitRuleID);

    /**
     * List all split_rules object from a given transaction
     *
     * @param $transactionID string
    */
    public function getAllSplitRules($transactionID);

    /**
     * List transaction receivables to see if the split_rule was effective applied and the splitted receivable is ok.
     *
     * @param $transactionID string
    */
    public function getTransactionReceivables($transactionID);
}