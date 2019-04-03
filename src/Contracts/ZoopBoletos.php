<?php

namespace Zoop\Contracts;

use Zoop\Lib\APIResource;

interface ZoopBoletos
{

    /**
     * API Resource.
     *
     * @param $APIResource $APIResource
     */
    public function __construct(APIResource $APIResource);

    /**
     * Send boleto to emails
     *
     * @param $boletoID string
     * @param $post array
     */
    public function emails($boletoID, $post);

    /**
     * Retrieve the details of a Boleto by id
     *
     * @param $boletoID string
     */
    public function get($boletoID);
}
