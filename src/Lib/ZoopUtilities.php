<?php

namespace Zoop\Lib;

class ZoopUtilities{

    /**
     * Encode UTF8
     *
     * @param $value
     *
     * @return string
     */
    public static function utf8($value){
        return (is_string($value) && mb_detect_encoding($value, "UTF-8", true) != "UTF-8")?utf8_encode($value):$value;
    }

    /**
     * Convert Date from ISO
     *
     * @param $datetime
     *
     * @return false|int
     */
    public static function convertDateFromISO($datetime ){
        return strtotime($datetime);
    }

    /**
     * Convert Epoch to ISO
     *
     * @param $epoch
     *
     * @return false|string
     */
    public static function convertEpochToISO($epoch ){
        return date("c", $epoch);
    }

    /**
     * Pass array to Params
     *
     * @param $array
     * @param null $prefix
     *
     * @return string
     */
    public static function arrayToParams($array, $prefix = null){
        if (!is_array($array)) return $array;

        $params = Array();

        foreach ($array as $k => $v) {
            if (is_null($v)) continue;

            if ($prefix && $k && !is_int($k))
                $k = $prefix."[".$k."]";
            else if ($prefix)
                $k = $prefix."[]";

            if (is_array($v)) {
                $params[] = self::arrayToParams($v, $k);
            } else {
                $params[] = $k."=".urlencode($v);
            }
        }

        return implode("&", $params);
    }
}