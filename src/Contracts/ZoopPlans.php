<?php

namespace Zoop\Contracts;

use Zoop\Lib\APIResource;

interface ZoopPlans{

    /**
     * API Resource.
     *
     * @param $APIResource $APIResource
    */
    public function __construct(APIResource $APIResource);

    /**
     * Create a new Plan
     *
     * @param $post array
    */
    public function create($post);

        /**
     * Update a created plan
     *
     * @param $planID string
     * @param $post array
     */
    public function update($planID, $post);

    /**
     * Delete a Plan by id
     *
     * @param $planID string
    */
    public function delete($planID);

    /**
     * Retrieve the details of a Plan by id
     *
     * @param $planID string
     */
    public function get($planID);

    /**
     * Returns a JSON object with a list of plans.
     */
    public function getAll();
}