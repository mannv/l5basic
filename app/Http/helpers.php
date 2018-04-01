<?php
/**
 * Created by PhpStorm.
 * User: man.nv
 * Date: 3/12/18
 * Time: 10:47 AM
 */

if (!function_exists('mannvGetENV')) {
    function mannvGetENV()
    {
        return config('app.env');
    }
}

if (!function_exists('validate_shutterstock_url')) {
    function validate_shutterstock_url($url)
    {
        $options = parse_url($url);
        if (!str_contains($options['host'], 'shutterstock.com')) {
            return 0;
        }
        $arr = explode('-', $options['path']);
        return array_pop($arr);
    }
}

if (!function_exists('shutterstock_thumbnail')) {
    function shutterstock_thumbnail($shutterstockId)
    {
        return 'https://thumb7.shutterstock.com/display_pic_with_logo/683398/390443464/thumbnail-' . $shutterstockId . '.jpg';
    }
}