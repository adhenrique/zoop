<?php

namespace Zoop\Lib;


class ZoopInvoices implements \Zoop\Contracts\ZoopInvoices {

    /**
     * API Resource
     *
     * @var object
     */
    protected $APIResource;

    /**
     * ZoopInvoices constructor.
     * @param APIResource $APIResource
     */
    public function __construct(APIResource $APIResource){
        $this->APIResource = $APIResource;
    }

    /**
     * @param array $post
     * @return mixed
     */
    public function create($post = []){
        $api = 'invoices';
        return $this->APIResource->createAPI($api, $post);
    }

    /**
     * @param string $InvoiceID
     * @param array $post
     * @return mixed
     */
    public function update($InvoiceID, $post){
        $api = 'invoices/' . $InvoiceID;
        return $this->APIResource->updateAPI($api, $post);
    }

    /**
     * @param string $InvoiceID
     * @param array $post
     * @return mixed
     */
    public function approve($InvoiceID){
        $api = 'invoices/' . $InvoiceID . '/approve';
        return $this->APIResource->createAPI($api);
    }

    /**
     * @param string $InvoiceID
     * @param array $post
     * @return mixed
     */
    public function void($InvoiceID){
        $api = 'invoices/' . $InvoiceID . '/void';
        return $this->APIResource->createAPI($api);
    }

    /**
     * @param string $InvoiceID
     * @return mixed
     */
    public function delete($InvoiceID){
        $api = 'invoices/' . $InvoiceID;
        return $this->APIResource->deleteAPI($api);
    }

    /**
     * @param string $InvoiceID
     * @return mixed
     */
    public function get($InvoiceID){
        $api = 'invoices/' . $InvoiceID;
        return $this->APIResource->searchAPI($api);
    }

    /**
     * @return mixed
     */
    public function getAll(){
        $api = 'invoices';
        return $this->APIResource->searchAPI($api);
    }

    /**
     * @return mixed
     */
    public function getAllBySeller($customerID){
        $api = 'sellers/' . $customerID . '/invoices';
        return $this->APIResource->searchAPI($api);
    }
}