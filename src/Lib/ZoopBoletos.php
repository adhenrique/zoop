<?php

namespace Zoop\Lib;


class ZoopBoletos implements \Zoop\Contracts\ZoopBoletos
{

    /**
     * API Resource
     *
     * @var object
     */
    protected $APIResource;

    /**
     * ZoopBoletos constructor.
     * @param APIResource $APIResource
     */
    public function __construct(APIResource $APIResource)
    {
        $this->APIResource = $APIResource;
    }

    /**
     * @param string $boletoID
     * @param array $post
     * @return mixed
     */
    public function emails($boletoID, $post = [])
    {
        $api = 'boletos/' . $boletoID . '/emails';
        return $this->APIResource->createAPI($api, $post);
    }

    /**
     * @param string $boletoID
     * @return mixed
     */
    public function get($boletoID)
    {
        $api = 'boletos/' . $boletoID;
        return $this->APIResource->searchAPI($api);
    }
}
