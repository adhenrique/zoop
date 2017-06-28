<?php

namespace Zoop\Lib;

class ZoopBankAccounts implements \Zoop\Contracts\ZoopBankAccounts {

    /**
     * API Resource
     *
     * @var object
    */
    protected $APIResource;

    /**
     * ZoopBankAccounts constructor.
     * @param APIResource $APIResource
     */
    public function __construct(APIResource $APIResource){
        $this->APIResource = $APIResource;
    }

    /**
     * @param array $post
     * @return mixed
     */
    public function associateWithACustomer($post){
        $api = 'bank_accounts';
        return $this->APIResource->createAPI($api, $post);
    }

    /**
     * @param string $bankAccountID
     * @param array $post
     * @return mixed
     */
    public function deactivate($bankAccountID, $post){
        $api = 'bank_accounts/' . $bankAccountID;
        return $this->APIResource->updateAPI($api, $post);
    }

    /**
     * @param string $bankAccountID
     * @return mixed
     */
    public function delete($bankAccountID){
        $api = 'bank_accounts/' . $bankAccountID;
        return $this->APIResource->deleteAPI($api);
    }

    /**
     * @param string $bankAccountID
     * @return mixed
     */
    public function get($bankAccountID){
        $api = 'bank_accounts/' . $bankAccountID;
        return $this->APIResource->searchAPI($api);
    }

    /**
     * @return mixed
     */
    public function getAll(){
        $api = 'bank_accounts';
        return $this->APIResource->searchAPI($api);
    }
}