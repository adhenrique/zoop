<?php

namespace Zoop\Contracts;

use Zoop\Lib\APIResource;

interface ZoopSubscriptions{

    /**
     * API Resource.
     *
     * @param $APIResource $APIResource
    */
    public function __construct(APIResource $APIResource);

    /**
     * Create a new Subscription
     *
     * @param $post array
    */
    public function create($post);

    /**
     * Update a created Subscription
     *
     * @param $subscriptionID string
     * @param $post array
     */
    public function update($subscriptionID, $post);

    /**
     * Delete a Subscription by id
     *
     * @param $subscriptionID string
    */
    public function delete($subscriptionID);

    /**
     * Suspend a Subscription by id
     *
     * @param $subscriptionID string
    */
    public function suspend($subscriptionID);

    /**
     * Reactivate a Subscription by id
     *
     * @param $subscriptionID string
    */
    public function reactivate($subscriptionID);

    /**
     * Retrieve the details of a Subscription by id
     *
     * @param $subscriptionID string
     */
    public function get($subscriptionID);

    /**
     * Returns a JSON object with a list of Subscriptions.
     */
    public function getAll();
}