<?php
/**
 * Created by PhpStorm.
 * User: Ad
 * Date: 10/04/2017
 * Time: 17:10
 */

namespace Zoop\src\Helpers;


trait ZoopHelpers{

    /**
     * Rearrange multiple files uploaded
     *
     * @param $file array
     *
     * @return array
    */
    public function reArrayFiles(&$file){
//        dd($file);
        $file_ary = array();
        $file_count = count($file['name']);
        $file_keys = array_keys($file);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file[$key][$i];
            }
        }
        return $file_ary;
    }
}