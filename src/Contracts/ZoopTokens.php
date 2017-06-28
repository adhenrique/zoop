<?php

namespace Zoop\Contracts;

use Zoop\Lib\APIResource;

interface ZoopTokens{

    /**
     * API Resource.
     *
     * @param $APIResource $APIResource
     */
    public function __construct(APIResource $APIResource);

    /**
     * Creates a one-shot credit card token.
     *
     * @param $post array
    */
    public function tokenizeCard($post);

    /**
     * Creates a one-shot bank account token
     *
     * @param $post array
    */
    public function tokenizeBankAccount($post);

    /**
     * Retrieve the details of a specific token
     *
     * @param $token string
     */
    public function get($token);
}