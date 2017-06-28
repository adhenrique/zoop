<?php

namespace Zoop\Lib;

class ZoopSplitTransactions implements \Zoop\Contracts\ZoopSplitTransactions {

    /**
     * API Resource
     *
     * @var object
     */
    protected $APIResource;

    /**
     * ZoopSplitTransactions constructor.
     *
     * @param APIResource $APIResource
     */
    public function __construct(APIResource $APIResource){
        $this->APIResource = ($APIResource);
    }

    /**
     * @param string $transactionID
     * @param array $post
     * @return mixed
     */
    public function create($transactionID, $post){
        $api = 'transactions/' . $transactionID . '/split_rules';
        return $this->APIResource->createAPI($api, $post);
    }

    /**
     * @param string $transactionID
     * @param array $post
     * @return mixed
     */
    public function update($transactionID, $splitRuleID, $post){
        $api = 'transactions/' . $transactionID . '/split_rules/' . $splitRuleID;
        return $this->APIResource->updateAPI($api, $post);
    }

    /**
     * @param string $transactionID
     * @param string $splitRuleID
     * @return mixed
     */
    public function delete($transactionID, $splitRuleID){
        $api = 'transactions/' . $transactionID . '/split_rules/' . $splitRuleID;
        return $this->APIResource->deleteAPI($api);
    }

    /**
     * @param string $transactionID
     * @return mixed
     */
    public function getAllSplitRules($transactionID){
        $api = 'transactions/' . $transactionID . '/split_rules';
        return $this->APIResource->searchAPI($api);
    }

    /**
     * @param string $transactionID
     * @return mixed
     */
    public function getTransactionReceivables($transactionID){
        $api = 'transactions/' . $transactionID . '/receivables';
        return $this->APIResource->searchAPI($api);
    }

}