<?php

namespace Zoop\Contracts;

use Zoop\Lib\APIResource;

interface ZoopWebhooks{

    /**
     * API Resource.
     *
     * @param $APIResource $APIResource
    */
    public function __construct(APIResource $APIResource);

    /**
     * Create a new Webhook
     *
     * @param $post array
    */
    public function create($post);

    /**
     * Delete a Webhook by id
     *
     * @param $webhookID string
    */
    public function delete($webhookID);

    /**
     * Retrieve the details of a Webhook by id
     *
     * @param $webhookID string
     */
    public function get($webhookID);

    /**
     * Returns a JSON object with a list of plans.
     */
    public function getAll();
}